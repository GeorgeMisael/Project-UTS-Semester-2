<x-app-layout title="Draft Messages">

    <div class="container mt-5">
        <h2 class="mb-4">Your Draft Messages</h2>

        @if($draftMessages->count() == 0)
            <div class="alert alert-info text-center" role="alert">
                <strong>No draft messages available.</strong>
            </div>
        @else
            <div class="card shadow-sm">
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($draftMessages as $message)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $message->subject }}</strong>
                                <div class="text-muted">{{ \Carbon\Carbon::parse($message->created_at)->format('d M Y H:i') }}</div>
                            </div>
                            <div class="btn-group" role="group" aria-label="Message Actions">
                                <div class="">
                                    <a href="{{ route('messages.show', $message->message_id) }}" class="btn btn-outline-info btn-sm">View</a>
                                </div>
                                <div>
                                    <a href="{{ route('messages.edit_draft', $message->message_id) }}" class="ml-1 btn btn-outline-warning btn-sm">Edit</a>
                                </div>
                                <form action="{{ route('messages.publish', $message->message_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success btn-sm">Publish</button>
                                </form>
                                <form action="{{ route('messages.destroy', $message->message_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this draft?')">Delete</button>
                                </form>
                            </div>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

</x-app-layout>
