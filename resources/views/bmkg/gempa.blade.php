<x-app-layout title="Informasi Gempa">

  <x-slot name="heading">Informasi Gempa</x-slot name="heading">
  

    <div class="card-body">
        <div class="container mt-5">
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Coordinates</th>
                            <th>Magnitude</th>
                            <th>Depth</th>
                            <th>Region</th>
                            <th>Tsunami Potential</th>
                        </tr>
                    </thead>
                    <tbody id="earthquake-table">
                        <!-- Data will be appended here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  
  </x-app-layout>