<x-app-layout title="Tambah User">

  <x-slot name="heading">Tambah User</x-slot name="heading">
  <x-slot name="description">Masukkan User</x-slot name="description">
  
<div class="card-body">

  <form action="{{ route('user.simpan') }}" method="post" class="forms-sample">
    @csrf
    <div class="form-group row">
      <label for="name" name="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
      <div class="col-sm-9">
        <input type="text" name="name" class="form-control" id="name" placeholder="Nama lengkap">
      </div>
    </div>

    <div class="form-group row">
      <label for="username" class="col-sm-3 col-form-label">Username</label>
      <div class="col-sm-9">
        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
      </div>
    </div>

    <div class="form-group row">
      <label for="email" class="col-sm-3 col-form-label">Email</label>
      <div class="col-sm-9">
        <input type="text" name="email" class="form-control" id="email" placeholder="Email">
      </div>
    </div>

    <div class="form-group row">
      <label for="password" class="col-sm-3 col-form-label">Password</label>
      <div class="col-sm-9">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      </div>
    </div>

    
    <div class="form-group row">
      <label for="id_jenis_user" class="col-sm-3 col-form-label">Jenis User</label>
      <div class="col-sm-9">

        <select name="id_jenis_user" class="form-select" id="id_jenis_user">

          @foreach ($roles as $role)
          <option value="{{ $role->id }}">{{ $role->jenis_user }}</option>
          @endforeach

        </select>
      </div>
    </div>
    <x-button type="submit">Submit</x-button>
    <a href="/user" class="btn btn-light ">Cancel</a>
  </form>
</div>


</x-app-layout>