<?php

namespace App\Http\Controllers;

use App\Models\Emiten;
use Illuminate\Http\Request;
use App\Models\TTransaksiHarian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $transaksi = TTransaksiHarian::all();
        $emiten = Emiten::all();


        // Menghitung total data yang diperlukan
        $jumlah_emiten = TTransaksiHarian::distinct('stock_code')->count('stock_code');
        $total_volume = TTransaksiHarian::sum('volume');
        $total_value = TTransaksiHarian::sum('value');
        $total_frequency = TTransaksiHarian::sum('frequency');

        // Mengambil data detail untuk grafik
        $data = TTransaksiHarian::select(
            'stock_code',
            DB::raw('SUM(volume) as total_volume'),
            DB::raw('SUM(value) as total_value'),
            DB::raw('SUM(frequency) as total_frequency')
        )
        ->groupBy('stock_code')
        ->get();

        return view('dashboard.index', [
            'jumlah_emiten' => $jumlah_emiten,
            'total_volume' => $total_volume,
            'total_value' => $total_value,
            'total_frequency' => $total_frequency,
            'data' => $data,
            'transaksi' => $transaksi,
            'emiten' => $emiten,
        ]);
    }

    public function downloadTransaksi()
    {
        $transaksi = TTransaksiHarian::all();
        
        // Nama file CSV
        $fileName = 'transaksi_saham.csv';
        
        // Header CSV
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        // Callback untuk menulis data CSV
        $callback = function() use ($transaksi) {
            $file = fopen('php://output', 'w');
            
            // Header kolom tabel CSV
            fputcsv($file, ['No', 'No Records', 'Stock Code', 'Date Transaction', 'Value', 'Status']);
            
            // Menambahkan data ke dalam file CSV
            foreach ($transaksi as $key => $t) {
                fputcsv($file, [
                    $key + 1,
                    $t->no_records,
                    $t->stock_code,
                    $t->date_transaction,
                    $t->value,
                    $t->status
                ]);
            }
            
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
