<x-app-layout title="Book">
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card-body">
        <h2 >Books</h2>
          <x-table id="myTable">
            <x-table.thead>
              <x-table.tr>
                <x-table.th> No </x-table.th>
                <x-table.th> Book Code  </x-table.th>
                <x-table.th> Book Name </x-table.th>
                <x-table.th> Author </x-table.th>
                <x-table.th> Category </x-table.th>
                <x-table.th> Status </x-table.th>
                <x-table.th> Action </x-table.th>
              </x-table.tr>
            </x-table.thead>
            <x-table.tbody>
              @foreach ( $books as $book )
              <x-table.tr>
                <x-table.td> {{ $loop->iteration }} </x-table.td>
                <x-table.td> {{ $book->code }} </x-table.td>
                <x-table.td> {{ $book->title }} </x-table.td>
                <x-table.td> {{ $book->author }} </x-table.td>
                <x-table.td> {{ $book->category->name ?? 'N/A' }} </x-table.td>
                <x-table.td> {{ $book->created_at->diffforhumans() }} </x-table.td>
                <x-table.td> 
                  <form action="{{ route('book.edit', ['id' => $book->id]) }}" method="post" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary btn-icon-text"> Edit <i class="ti-file btn-icon-append"></i>
                    </button> 
                  </form>
                  
                  <form action="{{ route('book.destroy', ['id' => $book->id]) }}" method="post" style="display:inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-icon-text"><i class="mdi mdi-delete-forever"></i>Delete</button> 
                  </form>
                </x-table.td>
              </x-table.tr>              
              @endforeach 
            </x-table.tbody>
          </x-table>
          <a href="{{ route('book.create') }}"><x-button>Tambah Book</x-button></a>
      </div>
    </div>
  </div>
</div>

</x-app-layout>