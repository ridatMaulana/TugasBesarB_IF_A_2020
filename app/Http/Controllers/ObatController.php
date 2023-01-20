<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Icd;
use PDF;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['obats'] = Obat::all();
        $data['diagnosas'] = Icd::all();
        return view('obat')->with($data);
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
        $request->validate([
            'icds_id' => 'required',
            'nama_obat' => 'required',
            'harga_obat' => 'required|numeric',
            ]);

        //cek pasien apakah ada di database
        $obat = new obat;
        $obat->icds_id = $request->get('icds_id');
        $obat->nama_obat = $request->get('nama_obat');
        $obat->harga_obat = $request->get('harga_obat');
        $obat->save();

        $notification = array(
            'message' => 'Data Obat Berhasil Ditambahkan',
            'alert-type' => 'success'
        );
        return redirect()->route('obat.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obat = Obat::findOrFail($id);
        return response()->json($obat);
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
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Obat Berhasil Dihapus',
        ]);
    }

    public function change(Request $request)
    {
        $request->validate([
            'icds_id' => 'required',
            'nama_obat' => 'required',
            'harga_obat' => 'required|numeric',
            ]);

        //cek pasien apakah ada di database
        $obat = obat::findOrFail($request->get('id'));
        $obat->icds_id = $request->get('icds_id');
        $obat->nama_obat = $request->get('nama_obat');
        $obat->harga_obat = $request->get('harga_obat');
        $obat->save();

        $notification = array(
            'message' => 'Data Obat Berhasil Diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('obat.index')->with($notification);
    }
    public function print_obats(){
        $obats = Obat::all();

        $pdf = PDF::loadview('print_obats',['obats'=>$obats]);
        return $pdf->download('data_obat.pdf');
    }

    public function export(){
        return Excel::download(new ObatsExport, 'obats.xlsx');
    }
}
