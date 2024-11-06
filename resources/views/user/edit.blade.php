<x-app-layout title="Edit User">

  <x-slot name="heading">Edit User</x-slot>

  <div class="card-body">
    <h4 class="card-title">Edit Users</h4>
    <!-- Pastikan action mengarah ke route yang benar dan metode adalah PATCH -->
    <form action="{{ route('users.update', $users->id) }}" method="post" class="forms-sample">
      @csrf
      @method('PATCH') <!-- Gunakan PATCH atau PUT untuk mengupdate -->

      <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
        <div class="col-sm-9">
          <input type="text" name="name" class="form-control" id="name" placeholder="Nama lengkap" value="{{ $users->name }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="username" class="col-sm-3 col-form-label">Username</label>
        <div class="col-sm-9">
          <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{ $users->username }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $users->email }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="id_jenis_user" class="col-sm-3 col-form-label">Jenis User</label>
        <div class="col-sm-9">
          <select name="id_jenis_user" class="form-select" id="id_jenis_user">
            @foreach ($roles as $role)
              <option value="{{ $role->id }}" {{ $role->id == $users->id_jenis_user ? 'selected' : '' }}>
                {{ $role->jenis_user }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <x-button type="submit">Submit</x-button>
      <a href="/users" class="btn btn-light">Cancel</a>
    </form>
  </div>

</x-app-layout>
