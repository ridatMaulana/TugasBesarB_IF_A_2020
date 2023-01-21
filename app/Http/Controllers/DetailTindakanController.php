<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekammedises;
use App\Models\Pasien;
use App\Models\Icd;
use App\Models\Karyawan;
use App\Models\Registrasis;
use Carbon\Carbon;

class DetailTindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['rekams'] = Rekammedises::all();
        return view('rekammedis.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pasiens'] = Pasien::all();
        $data['karyawans'] = Karyawan::where('id','>',2)->get();
        $data['registrasis'] = Registrasis::where('tanggal_registrasi', '=', Carbon::now());
        $data['diagnosas'] = Icd::all();

        return view('rekammedis/form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasiens_id' => 'required|numeric',
            'karyawans_id' => 'required|numeric',
            'registrasis_id' => 'required|numeric',
            'kode_icd' => 'required|numeric',
            'keluhan'=> 'required',
            'tanggal' => 'required',
            'tensi' => 'required'
            ]);

            //cek pasien apakah ada di database
        Rekammedises::create($request);
        $notification = array(
            'message' => 'Data Spesialis Berhasil Ditambahkan',
            'alert-type' => 'success'
        );
        return redirect()->route('rekam.index')->with($notification);
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
        $rekammedises = Rekammedises::findOrFail($id);
        $rekammedises->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus',
        ]);
    }
}
