<x-app-layout title="Menu">

  <x-slot name="heading">Menu</x-slot name="heading">
  
  <div class="card-body">
    <a href="{{ route('menu.tambah') }}"><x-button>Tambah Menu </x-button></a>
    <x-table>
      <x-table.thead>
        <x-table.tr>
          <x-table.th> No </x-table.th>
          <x-table.th> Judul </x-table.th>
          <x-table.th> Link </x-table.th>
          <x-table.th> Aksi </x-table.th>
        </x-table.tr>
      </x-table.thead>
      <x-table.tbody>
        @foreach ($menus as $menu)
        <x-table.tr>
          <x-table.td>{{ $loop->iteration }}</x-table.td>
          <x-table.td>{{ $menu->judul }}</x-table.td>
          <x-table.td>{{ $menu->link }}</x-table.td>
          <x-table.td> 

            <a href="{{ route('menu.edit', $menu->id) }}">
              <button class="btn btn-outline-secondary btn-icon-text"> 
                Edit <i class="ti-file btn-icon-append"></i>
              </button>
            </a>

            <form action="{{ route('menu.destroy', $menu->id) }}" method="post" style="display:inline">
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

{{-- <x-app-layout title="Menu">

  <x-slot name="heading">Menu</x-slot name="heading">
  
  
  <a href="/create_user"><button type="button" class="btn btn-success">Tambah User</button></a>
  
  <br><br>
  <div class="col-lg-12 grid-margin stretch-card">
    <x-table>
      <x-table.thead>
        <x-table.tr>
          <x-table.th> No Icon </x-table.th>
          <x-table.th> Judul </x-table.th>
          <x-table.th> Link </x-table.th>
          <x-table.th> Parent </x-table.th>
          <x-table.th> Tipe </x-table.th>
          <x-table.th> Pembuat </x-table.th>
          <x-table.th> Aksi </x-table.th>
        </x-table.tr>
      </x-table.thead>
      <x-table.tbody>
        
        <x-table.tr>
          <x-table.td></x-table.td>
          <x-table.td></x-table.td>
          <x-table.td></x-table.td>
          <x-table.td></x-table.td>
          <x-table.td></x-table.td>
          <x-table.td></x-table.td>
          <x-table.td></x-table.td>
        </x-table.tr>              
        
      </x-table.tbody>
    </x-table>
  </div>
  
  </x-app-layout> --}}