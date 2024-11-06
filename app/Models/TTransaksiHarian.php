<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTransaksiHarian extends Model
{
    use HasFactory;
    protected $table = 't_transaksi_harians'; // Nama tabel
    protected $fillable = [
        'no_records',
        'stock_code',
        'date_transaction',
        'open',
        'high',
        'low',
        'close',
        'change',
        'volume',
        'value',
        'frequency',
    ];

}
