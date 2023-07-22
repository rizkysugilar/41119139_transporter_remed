<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Barang;
use App\Models\lokasi;
use App\Models\pengiriman;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pengiriman';
        $data = Pengiriman::whereDate('created_at', now()->format('Y-m-d'))->latest()->paginate(5);
        
        return view ('admin.pengiriman',compact('title','data'));
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Pengiriman';
        $lokasi = lokasi::all();
        $barang = Barang::all();
        return view ('pengiriman.create',compact('title','lokasi','barang'));
        // return $barang;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = 'Pengiriman';
        $userId = Auth::user()->id;
        $today = Carbon::today();
        $deliveryCount = pengiriman::where('kurir_id', $userId)
            ->whereDate('created_at', $today)
            ->count();
        if ($deliveryCount >= 5) {
            return redirect('/pengiriman')->with('error', 'Maaf, Anda telah mencapai batas maksimal pengiriman per hari.');
        }

        $barang = Barang::find($request->barang_id);
        if ($barang->stock_barang <= 0) {
            return redirect('/pengiriman')->with('error', 'Maaf, stok barang telah habis.');
        }

        $data = new pengiriman;
        $data ->kurir_id = $userId;
        $data ->lokasi_id= $request->lokasi_id;
        $data -> barang_id = $request->barang_id;
        $data->no_pengiriman = $this->generateUniqueNoPengiriman(); // Menghasilkan nomor pengiriman baru
        // $data ->no_pengiriman = $request->no_pengiriman;
        $data -> jumlah_barang = $request->jumlah_barang;
        $data -> harga_barang = $request -> harga_barang * $request->jumlah_barang;
        $data ->save();

        $barang ->stock_barang -= $request->jumlah_barang;
        $barang->save();

        return redirect ('/pengiriman');
        // dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasi = pengiriman::find($id);
        $lokasi ->delete();
        return redirect('/pengiriman')->with('success', 'data di hapus');
    }

    private function generateUniqueNoPengiriman()
    {
        $unique = false;
        $length = 10; 
        
        do {
            $randomNumber = mt_rand(pow(10, $length - 1), pow(10, $length) - 1); 
            $noPengiriman = str_pad($randomNumber, $length, '0', STR_PAD_LEFT); 
            
            $existingPengiriman = pengiriman::where('no_pengiriman', $noPengiriman)->exists(); 
            
            if (!$existingPengiriman) {
                $unique = true;
            }
        } while (!$unique);
        
        return $noPengiriman;
    }
    
    private function convertToNumeric($uuid)
    {
        $numericOnly = preg_replace('/[^0-9]/', '', $uuid);
        $numericValue = intval($numericOnly);
        
        return $numericValue;
    }

}
