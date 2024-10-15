<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageTo;
use App\Models\MessageDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the currently logged-in user

        $inboxMessages = Message::with('recipients')
            ->whereHas('recipients', function ($query) use ($user) {
                $query->where('to', $user->email); // Reference 'to' from the recipients
            })
            ->where('message_status', '!=', 'draft') // Exclude drafted messages
            ->paginate(10);

        $sentMessages = Message::with('recipients')
            ->where('sender', $user->email)
            ->paginate(10);

        $draftMessages = Message::where('sender', $user->email)
            ->where('message_status', 'draft')
            ->paginate(10);

        return view('messages.index', compact('inboxMessages', 'sentMessages', 'draftMessages'));
    }

    public function publish($message_id)
    {
        $message = Message::findOrFail($message_id);

        if ($message->sender !== Auth::user()->email) {
            abort(403, 'You do not have permission to publish this message.');
        }

        $message->update([
            'message_status' => 'sent',
        ]);

        return redirect()->route('messages.index')->with('status', 'Message published successfully!');
    }

    public function indexDraft()
    {
        $user = Auth::user(); // Get the currently logged-in user
        $draftMessages = Message::where('sender', $user->email)
            ->where('message_status', 'draft')
            ->get();

        return view('messages.draftindex', compact('user', 'draftMessages'));
    }

    public function editDraft($message_id)
    {
        $message = Message::findOrFail($message_id);
        return view('messages.edit_draft', compact('message'));
    }

    public function updateDraft(Request $request, $message_id)
    {
        $message = Message::findOrFail($message_id);

        if ($message->sender !== Auth::user()->email) {
            abort(403, 'You do not have permission to update this message.');
        }

        $validator = Validator::make($request->all(), [
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message_text' => 'required|string',
            'document' => 'nullable|mimes:pdf,docx,doc,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $message->recipients->first()->to = $request->input('to');
        $message->subject = $request->input('subject');
        $message->message_text = $request->input('message_text');

        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $document->storeAs('public/documents', $document->getClientOriginalName());
            $message->document = $document->getClientOriginalName();
        }

        $message->save();

        return redirect()->route('messages.index')->with('success', 'Draft message updated successfully.');
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message_text' => 'required|string',
            'document' => 'nullable|mimes:pdf,docx,doc,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $messageStatus = $request->input('action') === 'send' ? 'sent' : 'draft';

        $message = Message::create([
            'sender' => Auth::user()->email, // Assuming sender is the authenticated user's email
            'message_reference' => Auth::user()->email,
            'subject' => $request->subject,
            'message_text' => $request->message_text,
            'message_status' => $messageStatus,
            'create_by' => Auth::user()->id,
            'no_mk' => $request->no_mk, // Ensure no_mk has a value
            'update_by' => Auth::user()->id,
        ]);

        MessageTo::create([
            'message_id' => $message->message_id,
            'to' => $request->to,
            'create_by' => Auth::user()->email,
            'cc' => $request->to,
            'update_by' => Auth::user()->email,
        ]);

        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $documentName = time() . '.' . $document->getClientOriginalExtension();
            $document->move(public_path('documents'), $documentName);

            MessageDokumen::create([
                'no_mdok' => Str::uuid()->toString(),
                'file' => $documentName,
                'description' => 'Document attached to message',
                'message_id' => $message->message_id,
                'create_by' => Auth::user()->id,
                'delete_mark' => false,
                'update_by' => Auth::user()->id,
            ]);
        }

        return redirect()->route('messages.index')->with('status', $messageStatus === 'sent' ? 'Message sent successfully!' : 'Message saved as draft!');
    }

    public function sent()
    {
        $sentMessages = Message::where('sender', Auth::user()->email)
            ->paginate(10); // Adjust pagination as needed

        return view('messages.sent', compact('sentMessages'));
    }

    public function show($message)
    {
        $message = Message::with(['recipients', 'category', 'documents'])->findOrFail($message);
        return view('messages.show', compact('message'));
    }

    public function destroy($message_id)
    {
        $message = Message::findOrFail($message_id);

        if ($message->sender !== Auth::user()->email) {
            abort(403, 'You do not have permission to delete this message.');
        }

        // If necessary, delete related data such as recipients or documents here

        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }

    public function downloadDocument($file)
    {
        $path = public_path('documents/' . $file);
        return response()->download($path, $file, [
            'Content-Type' => 'application/octet-stream',
        ]);
    }
}
