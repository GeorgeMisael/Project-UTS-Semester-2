<x-app-layout title="Users">

<x-slot name="heading">All User's</x-slot name="heading">

<div class="card-body">
  <a href="{{ route('user.tambah') }}"><x-button>Tambah User </x-button></a>
  <x-table>
    <x-table.thead>
      <x-table.tr>
        <x-table.th> No </x-table.th>
        <x-table.th> Username </x-table.th>
        <x-table.th> Nama </x-table.th>
        <x-table.th> Role ID </x-table.th>
        <x-table.th> Terbaru </x-table.th>
        <x-table.th> Aksi </x-table.th>
      </x-table.tr>
    </x-table.thead>
    <x-table.tbody>
      @foreach ( $users as  $user )
      <x-table.tr>
        <x-table.td> {{ $loop->iteration }} </x-table.td>
        <x-table.td> {{ $user->username }} </x-table.td>
        <x-table.td> {{ $user->name }} </x-table.td>
        <x-table.td> {{ $user->id_jenis_user }} </x-table.td>
        <x-table.td> {{ $user->created_at->diffforhumans() }} </x-table.td>
        <x-table.td> 
          <form action="{{ route('users.edit', $user->id) }}" method="post" style="display:inline">
            @csrf
            <button type="submit" class="btn btn-outline-secondary btn-icon-text"> Edit <i class="ti-file btn-icon-append"></i>
            </button> 
          </form>

          <form action="{{ route('users.reset', $user->id) }}" method="post" style="display:inline">
            @csrf
            <button type="button" class="btn btn-outline-warning btn-icon-text">
              <i class="ti-reload btn-icon-prepend"></i> Reset 
            </button>
          </form>

          <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger btn-icon-text"><i class="mdi mdi-delete-forever"></i>Delete</button> 
          </form>
        </x-table.td>
      </x-table.tr>              
      @endforeach 
    </x-table.tbody>
  </x-table>
</div>

</x-app-layout>