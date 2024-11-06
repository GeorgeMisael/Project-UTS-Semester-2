<x-app-layout title="Edit Books">

  <x-slot name="heading">Edit Book</x-slot>

  <div class="card-body">
    <h4 class="card-title">Edit Book</h4>

    <!-- Pastikan action mengarah ke route yang benar dan metode adalah PATCH -->
    <form action="{{ route('book.update', $book->id) }}" method="post" class="forms-sample">
      @csrf
      @method('PATCH') <!-- Gunakan PATCH atau PUT untuk mengupdate -->

      <div class="form-group row">
        <label for="code" name="code" class="col-sm-3 col-form-label">Code</label>
        <div class="col-sm-9">
          <input type="text" name="code" class="form-control" id="code" placeholder="Book Code" value="{{ $book->code }}">
        </div>
      </div>
      
      <div class="form-group row">
        <label for="title" class="col-sm-3 col-form-label">Title</label>
        <div class="col-sm-9">
          <input type="text" name="title" class="form-control" id="title" placeholder="Book Title" value="{{ $book->title }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="author" class="col-sm-3 col-form-label">Author</label>
        <div class="col-sm-9">
          <input type="text" name="author" class="form-control" id="author" placeholder="Book author" value="{{ $book->author }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="idkategori" class="col-sm-3 col-form-label">Book Category</label>
        <div class="col-sm-9">
          <select class="form-select" id="idkategori" name="idkategori">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name  }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <x-button type="submit">Submit</x-button>
      <a href="/book" class="btn btn-light">Cancel</a>
    </form>
  </div>

</x-app-layout>
