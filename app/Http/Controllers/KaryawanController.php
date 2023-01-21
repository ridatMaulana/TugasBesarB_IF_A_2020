<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\Spesialis;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KaryawansExport;
use App\Import\KaryawansImport;

class KaryawanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function karyawans(){
        $user = Auth::user();
        $karyawans = Karyawan::where('id','>','1')->get();
        $spesialis = Spesialis::where('id','>','1')->get();
        return view('karyawan', compact('user', 'karyawans','spesialis'));
    }

    public function submit_karyawan(Request $req){

        $validate = $req->validate([
            'nama' => 'required|max:255',
            'alamat' =>'required',
            'no_telepon' =>'required',
            'jabatan' =>'required|max:255',
            'spesialis' => 'required',
        ]);

        $karyawan = new Karyawan;
        $karyawan->nama = $req->get('nama');
        $karyawan->alamat = $req->get('alamat');
        $karyawan->no_telepon = $req->get('no_telepon');
        $karyawan->jabatan = $req->get('jabatan');
        $karyawan->spesialis_id = $req->get('spesialis');

        $karyawan->save();



        if ($req->get('spesialis') == 2) {
            $karyawans = Karyawan::all()->last();
            $user = new User;
            $user->name = $req->get('nama');
            $user->username = $req->get('nama')."12345";
            $user->password = bcrypt("12345678");
            $user->roles_id = 2;
            $user->karyawans_id = $karyawans->id;
            $user->email = $req->get('nama')."@mail.com";

            $user->save();
        }

        $notification = array(
            'message' => 'Data karyawan Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.karyawan')->with($notification);
    }

    //AJAX PROCESS
    public function getDataKaryawan($id){
        $karyawan = Karyawan::find($id);
        return response()->json($karyawan);
    }

    public function update_karyawan(Request $req){
        $karyawan = Karyawan::find($req->get('id'));
        $validate = $req->validate([
            'nama' => 'required|max:255',
            'alamat' =>'required',
            'no_telepon' =>'required',
            'jabatan' =>'required|max:255',
            'spesialis' => 'required',
        ]);
        $karyawan->nama = $req->get('nama');
        $karyawan->alamat = $req->get('alamat');
        $karyawan->no_telepon = $req->get('no_telepon');
        $karyawan->jabatan = $req->get('jabatan');
        $karyawan->spesialis_id =  $req->get('spesialis');

        $karyawan->save();

        $notification = array(
            'message' => 'Data karyawan berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.karyawan')->with($notification);
    }

    public function delete_karyawan($id){

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->delete();

        $success = true;
        $message = "Data karyawan berhasil dihapus";

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function print_karyawan(){
        $karyawans = Karyawan::all();

        $pdf = PDF::loadview('print_karyawans',['karyawans'=>$karyawans]);
        return $pdf->download('data_karyawan.pdf');
    }

    public function export(){
        return Excel::download(new KaryawansExport, 'karyawans.xlsx');
    }

    public function import(Request $req)
    {
        Excel::import(new KaryawansImport, $req->file('file'));

        $notification = array(
            'message' => 'import data telah berhasil dilakukan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.karyawans')->with($notification);
    }

    // public function import(Request $req)
    // {
    //     Excel::import(new PasiensImport, $req->file('file'));

    //     $notification = array(
    //         'message' => 'Import Data Berhasil Dilakukan',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('admin.pasiens')->with($notification);
    // }
}
