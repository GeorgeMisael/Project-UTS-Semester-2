<x-app-layout title="Tambah Category">

  <x-slot name="heading">Tambah Category</x-slot name="heading">
  <x-slot name="description">Masukkan Category</x-slot name="description">
  
<div class="card-body">

  <form action="{{ route('category.store') }}" method="post" class="forms-sample">
    @csrf
    <div class="form-group row">
      <label for="name" name="name" class="col-sm-3 col-form-label">Category Name</label>
      <div class="col-sm-9">
        <input type="text" name="name" class="form-control" id="name" placeholder="Category Name">
      </div>
    </div>

    <x-button type="submit">Submit</x-button>
    <a href="/category" class="btn btn-light ">Cancel</a>
  </form>
</div>


</x-app-layout>