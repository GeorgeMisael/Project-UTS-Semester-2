<x-app-layout title="Tambah Book">

  <x-slot name="heading">Tambah Book</x-slot name="heading">
  <x-slot name="description">Masukkan Book</x-slot name="description">
  
<div class="card-body">

  <form action="{{ route('book.store') }}" method="post" class="forms-sample">
    @csrf
    <div class="form-group row">
      <label for="code" name="code" class="col-sm-3 col-form-label">Book Code</label>
      <div class="col-sm-9">
        <input type="text" name="code" class="form-control" id="code" placeholder="Book Code">
      </div>
    </div>

    <div class="form-group row">
      <label for="title" name="title" class="col-sm-3 col-form-label">Book Title</label>
      <div class="col-sm-9">
        <input type="text" name="title" class="form-control" id="title" placeholder="Book Title">
      </div>
    </div>

    <div class="form-group row">
      <label for="author" name="author" class="col-sm-3 col-form-label">Author</label>
      <div class="col-sm-9">
        <input type="text" name="author" class="form-control" id="author" placeholder="Author">
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
    <a href="/book" class="btn btn-light ">Cancel</a>
  </form>
</div>


</x-app-layout>