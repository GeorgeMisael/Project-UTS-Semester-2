<!-- resources/views/messages/show.blade.php -->
<x-app-layout title="Message Detail">

    <x-slot:heading>
        @if (Auth::check())
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Message Detail</h3>
            </div>
        @endif
    </x-slot:heading>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">{{ $message->subject }}</h4>
            </div>
            <div class="card-body">
                <p><strong>From:</strong> {{ $message->sender }}</p>
                <p><strong>To:</strong> {{ $message->recipients->pluck('to')->join(', ') }}</p>
                <p><strong>Date:</strong> {{ $message->created_at->format('d M Y, H:i') }}</p>
                <hr>
                <p><strong>Message:</strong></p>
                <p class="text-muted">{{ $message->message_text }}</p>

                @if ($message->documents->isNotEmpty())
                    <h5>Attachments:</h5>
                    <ul class="list-group">
                        @foreach ($message->documents as $document)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('download.document', $document->file) }}" class="link-primary">{{ $document->file }}</a>
                                <span class="badge bg-secondary ms-2">{{ $document->created_at->diffForHumans() }}</span>
                            </div>
                            <a href="{{ route('download.document', $document->file) }}" class="btn btn-outline-primary btn-sm">Download</a>
                        </li>

                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="mt-4">
            <a href="javascript:history.back()" class="btn btn-secondary">Back to messages</a>

            <a href="{{ route('messages.edit_draft', $message->message_id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('messages.destroy', $message->message_id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
            </form>
        </div>
    </div>

</x-app-layout>
