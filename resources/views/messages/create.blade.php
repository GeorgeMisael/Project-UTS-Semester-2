<x-app-layout title="Send New Message">

    <x-slot:heading>
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Send New Message</h3>
        </div>
    </x-slot:heading>

    <div class="container mt-5">
        <form action="{{ route('messages.send') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="form-group">
                        <label for="to">To <span class="text-danger">*</span></label>
                        <input type="email" id="to" name="to" class="form-control" value="{{ old('to') }}" placeholder="Recipient's email" required>
                        @error('to')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject <span class="text-danger">*</span></label>
                        <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}" placeholder="Subject" required>
                        @error('subject')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_mk">Kategori <span class="text-danger">*</span></label>
                        <input type="text" id="no_mk" name="no_mk" class="form-control" placeholder="Kategori" required>
                        @error('no_mk')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message_text">Message <span class="text-danger">*</span></label>
                        <textarea id="message_text" name="message_text" class="form-control" rows="5" placeholder="Write your message here" required>{{ old('message_text') }}</textarea>
                        @error('message_text')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="document">Attach Document (optional)</label>
                        <input type="file" id="document" name="document" class="form-control">
                        @error('document')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" name="action" value="send" class="btn btn-primary">Send Message</button>
                        <button type="submit" name="action" value="draft" class="btn btn-secondary">Save as Draft</button>
                        <a href="{{ route('messages.index') }}" class="btn btn-light">Cancel</a>
                    </div>

                </div>
            </div>

        </form>
    </div>

</x-app-layout>
