<x-app-layout title="Edit Category">

  <x-slot name="heading">Edit Category</x-slot>

  <div class="card-body">
    <h4 class="card-title">Edit Categorys</h4>

    <!-- Pastikan action mengarah ke route yang benar dan metode adalah PATCH -->
    <form action="{{ route('category.update', $category->id) }}" method="post" class="forms-sample">
      @csrf
      @method('PATCH') <!-- Gunakan PATCH atau PUT untuk mengupdate -->

      <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label">Category Name</label>
        <div class="col-sm-9">
          <input type="text" name="name" class="form-control" id="name" placeholder="Category Name" value="{{ $category->name }}">
        </div>
      </div>

      <x-button type="submit">Submit</x-button>
      <a href="/category" class="btn btn-light">Cancel</a>
    </form>
  </div>

</x-app-layout>
