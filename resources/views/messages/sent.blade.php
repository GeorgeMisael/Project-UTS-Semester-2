<x-app-layout title="Sent Messages">



    <div class="container mt-5">
        <h2 class="mb-4">Sent Messages</h2>
        @if($sentMessages->isEmpty())
            <div class="alert alert-info text-center" role="alert">
                <strong>No sent messages.</strong>
            </div>
        @else
            <div class="card shadow-sm">
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($sentMessages as $message)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $message->subject }}</strong><br>
                                    <small class="text-muted">To: {{ $message->recipients->first()->to }}</small>
                                </div>
                                <a href="{{ route('messages.show', $message->message_id) }}" class="btn btn-info btn-sm">View</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Pagination -->
        <div class="mt-4">
            {{ $sentMessages->links() }}
        </div>
    </div>

</x-app-layout>
