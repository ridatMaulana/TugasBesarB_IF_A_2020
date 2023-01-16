<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

use App\Models\Pasien;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PasienExport;
use App\Imports\PasiensImport;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function pasiens(){
        $user = Auth::user();
        $pasiens = Pasien::all();
        return view('pasien', compact('user', 'pasiens'));
    }

    public function submit_pasien(Request $req){

        $validate = $req->validate([
            'nama' => 'required|max:255',
            'tanggal_lahir' =>'required',
            'alamat' =>'required',
            'jenis_kelamin' => 'required',
        ]);

        $pasien = new Pasien;
        $pasien->nama = $req->get('nama');
        $pasien->tanggal_lahir = $req->get('tanggal_lahir');
        $pasien->alamat = $req->get('alamat');
        $pasien->jenis_kelamin = $req->get('jenis_kelamin');
     

        $pasien->save();

        $notification = array(
            'message' => 'Data Pasien Berhasil Ditambahkan',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.pasiens')->with($notification);
    }    

    //AJAX PROCESS
    public function getDataPasien($id){
        $pasien = Pasien::find($id);
        return response()->json($pasien);
    }

    public function update_pasien(Request $req){
        $pasien = Pasien::find($req->get('id'));

        $validate = $req->validate([
            'nama' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $pasien->nama = $req->get('nama');
        $pasien->tanggal_lahir = $req->get('tanggal_lahir');
        $pasien->alamat = $req->get('alamat');
        $pasien->jenis_kelamin = $req->get('jenis_kelamin');


        $pasien->save();

        $notification = array(
            'message' => 'Data pasien berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.pasiens')->with($notification);
    }

    public function delete_pasien($id){
        
        $pasien = Pasien::find($id);

        $pasien->delete();

        $success = true;
        $message = "Data pasien berhasil dihapus";

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function print_pasiens(){
        $pasiens = Pasien::all();

        $pdf = PDF::loadview('print_pasiens',['pasiens'=>$pasiens]);
        return $pdf->download('data_pasien.pdf');
    }

    public function export(){
        return Excel::download(new PasienExport, 'pasiens.xlsx');
    }

    public function import(Request $req)
    {
        Excel::import(new PasiensImport, $req->file('file'));
        
        $notification = array(
            'message' => 'Import Data Berhasil Dilakukan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.pasiens')->with($notification);
    }
}
