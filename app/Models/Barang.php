<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $barang = 'barangs';
    protected $primaryKey= 'id';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'deskripsi',
        'stock_barang',
        'harga_barang',
    ];

    public function pengiriman()
    {
        return $this->hasMany(pengiriman::class);
    }
}
