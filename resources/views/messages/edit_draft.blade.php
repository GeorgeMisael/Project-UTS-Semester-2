<!-- resources/views/messages/edit_draft.blade.php -->
<x-app-layout title="Edit Draft">

    <x-slot:heading>
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Edit Draft Message</h3>
        </div>
    </x-slot:heading>

    <form action="{{ route('messages.update_draft', $message->message_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="to">To</label>
            <input type="email" id="to" name="to" class="form-control" value="{{ old('to', $message->recipients->first()->to) }}" required>
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject', $message->subject) }}" required>
        </div>

        <div class="form-group">
            <label for="message_text">Message</label>
            <textarea id="message_text" name="message_text" class="form-control" rows="5" required>{{ old('message_text', $message->message_text) }}</textarea>
        </div>

        <div class="form-group">
            <label for="document">Attachment (optional)</label>
            <input type="file" id="document" name="document" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Draft</button>
        <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>

    </form>

</x-app-layout>
