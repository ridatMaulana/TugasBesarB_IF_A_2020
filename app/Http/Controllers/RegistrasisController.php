<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekammedises;
use App\Models\Pasien;
use App\Models\Icd;
use App\Models\Karyawan;
use App\Models\Registrasis;
use Carbon\Carbon;

class registrasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['registrasis'] = Registrasis::all();
        return view('registrasi.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['antrians'] = Registrasis::all();
        // dd($data);
        $data['pasiens'] = Pasien::all();

        return view('registrasi/form')->with($data);
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
         $request->validate([
        'pasiens_id' => 'required|numeric',
        'no_nota'=> 'required',
        'no_antrian' => 'required',
        'tanggal_registrasi' => 'required'
        ]);
        // dd($request);
        Registrasis::create([
            'pasiens_id' => $request->get('pasiens_id'),
            'no_nota' => $request->get('no_nota'),
            'no_antrian' => $request->get('no_antrian'),
            'tanggal_registrasi' => $request->get('tanggal_registrasi')
        ]);
        $notification = array(
            'message' => 'Data registrasi Berhasil Ditambahkan',
            'alert-type' => 'success'
        );
        return redirect()->route('registrasi.index')->with($notification);
    
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
        $registrasis = Registrasis::findOrFail($id);
        $registrasis->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus',
        ]);
    }
}
