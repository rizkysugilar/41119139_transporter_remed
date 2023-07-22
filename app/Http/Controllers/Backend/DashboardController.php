<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pengiriman;
use App\Models\Barang;
use App\Models\lokasi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $user=User::all()->count();
        $barang = Barang::all()->count();
        $pengiriman = pengiriman::all()->count();
        $lokasi = lokasi::all()->count();
        $recent = User::where('role','kurir')->get();

        $data = DB::table(DB::raw('(SELECT DATE_FORMAT(created_at, "%W") as created_at, COUNT(*) as total FROM pengirimen GROUP BY created_at) as subquery'))
        ->orderBy(DB::raw('DAYOFWEEK(created_at)'))
        ->get();

        $days = $data->pluck('created_at')->toArray();
        $totals = $data->pluck('total')->toArray();

        return view ('admin.index',compact('title','user','barang','pengiriman','lokasi','recent','days','totals'));
        // return $totals;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
