<x-app-layout title="Tambah Menu">

  <x-slot name="heading">Tambah Menu</x-slot name="heading">
  <x-slot name="description">Masukkan Menu</x-slot name="description">
  
<div class="card-body">

  <form action="{{ route('menu.simpan') }}" method="post" class="forms-sample">
    @csrf

    <div class="form-group row">
      <label for="judul" class="col-sm-3 col-form-label">Judul</label>
      <div class="col-sm-9">
        <input type="text" name="judul" class="form-control" id="judul" placeholder="judul">
      </div>
    </div>

    <div class="form-group row">
      <label for="link" class="col-sm-3 col-form-label">Link</label>
      <div class="col-sm-9">
        <input type="text" name="link" class="form-control" id="link" placeholder="link">
      </div>
    </div>

    <div class="form-group row">
      <label for="create_by" class="col-sm-3 col-form-label">Pembuat</label>
      <div class="col-sm-9">
        <input type="text" name="create_by" class="form-control" id="create_by" placeholder="create_by">
      </div>
    </div>
    

    <x-button type="submit">Submit</x-button>
    <a href="/menu" class="btn btn-light ">Cancel</a>
  </form>
</div>


</x-app-layout>