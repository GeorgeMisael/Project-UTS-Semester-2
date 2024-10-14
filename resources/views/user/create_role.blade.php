<x-app-layout title="Tambah Role">

  <x-slot name="heading">Tambah Role</x-slot name="heading">
  <x-slot name="description">Masukkan role</x-slot name="description">
  
  <div class="card-body">
    <form action="{{ route('roles.store') }}" method="post" class="forms-sample">
      @csrf
      <div class="form-group row">
        <div class="col-sm-9">
          <input type="hidden" name="id_jenis_user" class="form-control" id="id_jenis_user">
        </div>
      </div>
      <div class="form-group row">
        <label for="jenis_user" name="jenis_user" class="col-sm-3 col-form-label">Jenis Role</label>
        <div class="col-sm-9">
          <input type="text" name="jenis_user" class="form-control" id="jenis_user">
        </div>
      </div>
      <x-button type="submit">Submit</x-button>
    </form>

    <div class="col-lg-12 grid-margin stretch-card">
      <x-table>
        <x-table.thead>
          <x-table.tr>
            <x-table.th> No </x-table.th>
            <x-table.th> Role ID </x-table.th>
            <x-table.th> Jenis User </x-table.th>
            <x-table.th> Aksi </x-table.th>
          </x-table.tr>
        </x-table.thead>
        <x-table.tbody>
          @foreach ( $roles as  $role )
          <x-table.tr>
            <x-table.td> {{ $loop->iteration }} </x-table.td>
            <x-table.td> {{ $role->id }} </x-table.td>
            <x-table.td> {{ $role->jenis_user }} </x-table.td>
            <x-table.td> 
              <form action="{{ route('roles.edit', $role->id) }}" method="get" style="display:inline">
                @csrf
                <button type="submit" class="btn btn-outline-secondary btn-icon-text"> Edit <i class="ti-file btn-icon-append"></i>
                </button>
              </form>

              <form action="{{ route('roles.destroy', $role->id) }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-icon-text"><i class="mdimdi-delete-forever"><i>Delete</button>
              </form>
              
            </x-table.td>
          </x-table.tr>
          @endforeach
        </x-table.tbody>
      </x-table>
    </div>
  </div>
</x-app-layout>