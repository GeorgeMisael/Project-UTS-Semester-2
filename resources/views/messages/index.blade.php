<x-app-layout title="Inbox">

    <x-slot:heading>

    </x-slot:heading>

    <div class="container mt-5">
        <h2 class="mb-4">Inbox</h2>
        <div class="row">
            <!-- Inbox Messages -->
            <div class="col-md-12">

                @if($inboxMessages->isEmpty())
                    <div class="alert alert-info" role="alert">No inbox messages.</div>
                @else
                    <ul class="list-group">
                        @foreach($inboxMessages as $message)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $message->subject }}</strong><br>
                                    <small class="text-muted">From: {{ $message->sender }}</small>
                                </div>
                                <a href="{{ route('messages.show', $message->message_id) }}" class="btn btn-info btn-sm">View</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
