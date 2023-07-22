<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengirimen';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kurir_id',
        'lokasi_id',
        'barang_id',
        'no_pengiriman',
        'jumlah_barang',
        'harga_barang',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(lokasi::class);
    }
}
