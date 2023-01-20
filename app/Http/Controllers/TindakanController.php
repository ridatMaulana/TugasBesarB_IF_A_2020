<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tindakan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TindakansExport;
use App\Imports\TindakansImport;
use PDF;

class TindakanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $data['tindakans'] = Tindakan::all();
        return view('admin.data_tindakan')->with($data);
    }

    // public function tambah_tindakan(){
    //     return view('admin.tambah_tindakan');
    // }

    public function store_tindakan(Request $request){

        $request->validate([
            'nama_tindakan' => 'required',
            'harga_tindakan' => 'required|numeric'
            ]);

        //cek pasien apakah ada di database
        $tindakan = new Tindakan;
        $tindakan->nama_tindakan = $request->get('nama_tindakan');
        $tindakan->harga_tindakan = $request->get('harga_tindakan');
        $tindakan->save();

        $notification = array(
            'message' => 'Data tindakan Berhasil Ditambahkan',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.tindakan')->with($notification);
    }

    public function hapus_tindakan(Request $request){
        $id = $request->id;
        $tindakan = Tindakan::findOrFail($id);
        $tindakan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data tindakan Berhasil Dihapus',
        ]);
    }

    public function update_tindakan(Request $request){
        $id = $request->id;
        $tindakan = Tindakan::findOrFail($id);

        $request->validate([
            'nama_tindakan' => 'required',
            'harga_tindakan' => 'required|numeric'
            ]);

        $tindakan->nama_tindakan = $request->get('nama_tindakan');
        $tindakan->harga_tindakan = $request->get('harga_tindakan');
        $tindakan->save();
        $notification = array(
            'message' => 'Data tindakan berhasil diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.tindakan')->with($notification);
    }

    public function get_tindakan($id)
    {
        $tindakan = Tindakan::findOrFail($id);
        return response()->json($tindakan);
    }

    public function print_tindakans(){
        $tindakans = Tindakan::all();

        $pdf = PDF::loadview('print_tindakans',['tindakans'=>$tindakans]);
        return $pdf->download('data_tindakan.pdf');
    }

    public function export(){
        return Excel::download(new TindakansExport, 'tindakans.xlsx');
    }


}
