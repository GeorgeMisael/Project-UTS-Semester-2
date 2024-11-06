<x-app-layout title="Category">
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card-body">
      <h2>Category</h2>
            <x-table id="myTable">
              <x-table.thead>
                <x-table.tr>
                  <x-table.th> No </x-table.th>
                  <x-table.th> Category Name </x-table.th>
                  <x-table.th> Status </x-table.thx>
                  <x-table.th> Action </x-table.thx>
                </x-table.tr>
              </x-table.thead>
              <x-table.tbody>
                @foreach ( $categories as $category )
                <x-table.tr>
                  <x-table.td> {{ $loop->iteration }} </x-table.td>
                  <x-table.td> {{ $category->name }} </x-table.td>
                  <x-table.td> {{ $category->created_at->diffforhumans() }}</x-table.td>
                  <x-table.td> 
                    <form action="{{ route('category.edit', ['id' => $category->id]) }}" method="post" style="display:inline">
                      @csrf
                      <button type="submit" class="btn btn-outline-secondary btn-icon-text"> Edit <i class="ti-file btn-icon-append"></i>
                      </button> 
                    </form>

                    <form action="" method="post" style="display:inline">
                      @csrf
                      <button type="button" class="btn btn-outline-warning btn-icon-text">
                        <i class="ti-reload btn-icon-prepend"></i> Reset 
                      </button>
                    </form>

                    <form action="{{ route('category.destroy', $category->id) }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-icon-text"><i class="mdi mdi-delete-forever"></i>Delete</button> 
                    </form>
                  </x-table.td>
                </x-table.tr>              
                @endforeach 
              </x-table.tbody>
            </x-table>
            <a href="{{ route('category.create') }}"><x-button>Tambah Category </x-button></a>
          </div>
        </div>
    </div>
</div>

</x-app-layout>