<x-app-layout title="Edit User">

  <x-slot name="heading">Edit User</x-slot>

  <div class="card-body">
    <h4 class="card-title">Edit Users</h4>

    <!-- Pastikan action mengarah ke route yang benar dan metode adalah PATCH -->
    <form action="{{ route('roles.update', $roles->id) }}" method="post" class="forms-sample">
      @csrf
      @method('PATCH') <!-- Gunakan PATCH atau PUT untuk mengupdate -->

      <div class="form-group row">
        <label for="jenis_user" class="col-sm-3 col-form-label">Jenis User</label>
        <div class="col-sm-9">
          <input type="text" name="jenis_user" class="form-control" id="jenis_user" placeholder="Jenis User" value="{{ $roles->jenis_user }}">
        </div>
      </div>

      <x-button type="submit">Submit</x-button>
      <a href="/create_role" class="btn btn-light">Cancel</a>
    </form>
  </div>

</x-app-layout>
