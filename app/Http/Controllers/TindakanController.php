<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TindakanController extends Controller
{
    public function tambah_tindakan(){
        return view('admin.tambah_tindakan');
    }
    
    public function store_tindakan(Request $request){
        
        $request->validate([
            'pasien' => 'required|string',
            'tindakan' => 'required'
            ]);
            
        //cek pasien apakah ada di database
        $pasien = DB::table('pasiens')->where('nama', $request->pasiens)->first();
        
        if($pasiens == null){
            return redirect('/tambah_tindakan')->with('pasiens', 'Nama pasien belum terdaftar');
        }
            
        $save = DB::table('tindakans')->insert([
            'id_pasien' => $pasiens->id,
            'nama_tindakan' => $request->tindakans,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            if($save){
                return redirect('/data_tindakan')->with('sukses', 'Data berhasil ditambahkan');
            }
    }
    
    public function hapus_tindakan(Request $request){
        $id = $request->id;
        DB::table('tindakans')->delete($id);
        return redirect('/data_tindakan')->with('hapus', 'Data tindakan berhasil dihapus');
    }
    
    public function edit_tindakan($id){
        $datas = DB::table('tindakans')->find($id);
        $pasiens = DB::table('pasiens')->find($datas->id_pasien);
        return view('admin.edit_tindakan', ['data' => $datas, 'pasien' => $pasiens->nama]);
    }
    
    public function update_tindakan(Request $request){
    
        $request->validate([
            'pasiens' => 'required',
            'tindakans' => 'required'
            ]);
        
        $pasien = DB::table('pasiens')->where('nama', $request->pasiens)->first();

        DB::table('tindakan')->where('id', $request->id)->update([
            'id_pasien' => $pasien->id,
            'nama_tindakan' => $request->tindakan,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        
        return redirect('/data_tindakan')->with('update', 'Data tindakan berhasil diupdate');
    }
    
    public function cari_tindakan(Request $request){
        $tindakans = DB::table('pasiens')->where('nama', 'like', "%$request->keyword%")->join('tindakan', 'pasien.id', '=', 'tindakan.id_pasien')->select('pasiens.nama', 'tindakans.*')->get();
        return view('admin.cari_tindakan', ['tindakans' => $tindakans, 'keyword' => $request->keyword]);
    }
}
