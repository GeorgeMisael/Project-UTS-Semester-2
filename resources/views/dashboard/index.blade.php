<x-app-layout title="Dashboard">
  
  <x-slot:heading>
    @if (Auth::check())
    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
      <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
    </div>
    @endif
  </x-slot:heading>

  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body text-center">
          <h5>{{ $jumlah_emiten }}</h5>
          <p>Jumlah Emiten</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body text-center">
          <h5>{{ number_format($total_volume / 1e9, 1) }}B</h5>
          <p>Volume Transaksi</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body text-center">
          <h5>{{ number_format($total_value / 1e12, 1) }}T</h5>
          <p>Value Transaksi</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body text-center">
          <h5>{{ number_format($total_frequency) }}</h5>
          <p>Jumlah Frekuensi</p>
        </div>
      </div>
    </div>
  </div>

  
  <!-- Grafik -->
  <div class="row">
    <div class="col-md-6">
      <div class="card-body">
        <div id="bar">
          <h1>Bar Chart</h1>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <div id="Pie">
          <h1>Pie Chart</h1>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card-body">
        <div>
          <div class="col-md-12 mb-3">
            <button id="downlaod" class="btn btn-primary">Download PDF</button>
          </div>
          <x-table id="myTable">
            <x-table.thead>
              <x-table.tr>
                <x-table.th> No </x-table.th>
                <x-table.th> NO RECORDS </x-table.th>
                <x-table.th> STOCK CODE </x-table.th>
                <x-table.th> DATE TRANSACTION </x-table.th>
                <x-table.th> VALUE </x-table.th>
              </x-table.tr>
            </x-table.thead>
            <x-table.tbody>
              @foreach ( $transaksi as  $t )
              <x-table.tr>
                <x-table.td> {{ $loop->iteration }} </x-table.td>
                <x-table.td> {{ $t->no_records }} </x-table.td>
                <x-table.td> {{ $t->stock_code }} </x-table.td>
                <x-table.td> {{ $t->date_transaction }} </x-table.td>
                <x-table.td> {{ $t->value }} </x-table.td>
              </x-table.tr>              
              @endforeach 
            </x-table.tbody>
          </x-table>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Highcharts Scripts -->
  <script>
    // Bar Chart
    Highcharts.chart('bar', {
        chart: { type: 'bar' },
        title: { text: 'Ringkasan Transaksi - Januari 2023' },
        xAxis: {
            categories: ['ANTM', 'BBCA', 'BBRI', 'BRIS', 'GOTO'],
            title: { text: 'Kode Saham' }
        },
        yAxis: {
            min: 0,
            title: { text: 'Jumlah Nilai (dalam Triliun)' }
        },
        tooltip: {
            headerFormat: '<b>{point.key}</b><br />',
            pointFormat: 'Total Nilai: {point.y}'
        },
        legend: { enabled: false },
        plotOptions: {
            bar: {
                dataLabels: { enabled: true, format: '{point.y}' }
            }
        },
        series: [{
            name: 'Jumlah Nilai',
            colorByPoint: true,
            data: [
                { name: 'ANTM', y: 4354048869000, color: '#4caf50' },
                { name: 'BBCA', y: 15438041255000, color: '#ff9800' },
                { name: 'BBRI', y: 15617348532000, color: '#2196f3' },
                { name: 'BRIS', y: 956160927000, color: '#f44336' },
                { name: 'GOTO', y: 6911588060500, color: '#9c27b0' }
            ]
        }]
    });

    // Pie Chart
    const dataFromDB = @json($data);
    const chartData = dataFromDB.map(item => ({
        name: item.stock_code,
        y: parseFloat(item.total_value),
        color: Highcharts.getOptions().colors[dataFromDB.indexOf(item) % Highcharts.getOptions().colors.length]
    }));

    Highcharts.chart('Pie', {
        chart: { type: 'pie' },
        title: { text: 'Pie Value Transaksi' },
        tooltip: {
            headerFormat: '<b>{point.key}</b><br/>',
            pointFormat: '{point.percentage:.2f}%'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.percentage:.2f}%'
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Value',
            colorByPoint: true,
            data: chartData
        }]
    });
  </script>
  <script>
    document.getElementById('downlaod').addEventListener('click', function(){
      var element = document.getElementById('myTable');
      html2pdf()
        .from(element)
        .save();
    })
  </script>
</x-app-layout>