<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icd;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DiagnosasExport;
class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $data['diagnosas'] = Icd::all();
        return view('diagnosa')->with($data);
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
            'nama_diagnosa' => 'required'
            ]);

        //cek pasien apakah ada di database
        $diagnosa = new Icd;
        $diagnosa->nama_diagnosa = $request->get('nama_diagnosa');
        $diagnosa->save();

        $notification = array(
            'message' => 'Data Diagnosa Berhasil Ditambahkan',
            'alert-type' => 'success'
        );
        return redirect()->route('diagnosa.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnosa = Icd::findOrFail($id);
        return response()->json($diagnosa);
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
        $diagnosa = Icd::findOrFail($id);
        $diagnosa->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Diagnosa Berhasil Dihapus',
        ]);
    }

    public function change(Request $request)
    {
        $request->validate([
            'nama_diagnosa' => 'required'
            ]);

        //cek pasien apakah ada di database
        $diagnosa = Icd::findOrFail($request->get('id'));
        $diagnosa->nama_diagnosa = $request->get('nama_diagnosa');
        $diagnosa->save();

        $notification = array(
            'message' => 'Data Diagnosa Berhasil Diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('diagnosa.index')->with($notification);
    }

    public function print_diagnosas(){
        $diagnosa = Icd::all();

        $pdf = PDF::loadview('print_diagnosas',['diagnosas'=>$diagnosa]);
        return $pdf->download('data_diagnosa.pdf');
    }

    public function export(){
        return Excel::download(new DiagnosasExport, 'diagnosas.xlsx');
    }

}
