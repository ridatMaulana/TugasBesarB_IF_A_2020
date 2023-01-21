<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekammedises;
use App\Models\Pasien;
use App\Models\Icd;
use App\Models\Karyawan;
use App\Models\Registrasi;
use App\Models\Pembayaran;
use App\Models\Obat;
use App\Models\Tindakan;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['bayars'] = Pembayaran::all();
        return view('pembayaran.index')->with($data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['antrians'] = Pembayaran::all();
        // dd($data);
        $data['pasiens'] = Pasien::all();
       
        $data['karyawans'] = Karyawan::where('id','>',2)->get();
        $data['obats'] = Obat::all();
        $data['tindakans'] = Tindakan::all();
        $data['rekams'] = Rekammedises::all();

        return view('pembayaran/form')->with($data);
    
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
         //
         $request->validate([
            'pasiens_id' => 'required|numeric',
            'karyawans_id' => 'required|numeric',
            'obats_id' => 'required|numeric',
            'tindakans_id'=> 'required|numeric',
            'rekams_id' => 'required|numeric',
            'no_antrian' => 'required|numeric'
            ]);

            $obat = Obat::find($request->get('obats_id'));
            $tindakan = Tindakan::find($request->get('tindakans_id'));
            $total = $obat->harga_obat+ $tindakan->harga_tindakan;
            // dd($request);
            Pembayaran::create([
                'pasiens_id' => $request->get('pasiens_id'),
                'karyawans_id' => $request->get('karyawans_id'),
                'obats_id' => $request->get('obats_id'),
                'tindakans_id' => $request->get('tindakans_id'),
                'rekammedises_id' => $request->get('rekams_id'),
                'no_antrian' => $request->get('no_antrian'),
                'tanggal_transaksi' => Carbon::now(),
                'total_biaya' => $total
            ]);
            $notification = array(
                'message' => 'Data registrasi Berhasil Ditambahkan',
                'alert-type' => 'success'
            );
            return redirect()->route('pembayaran.index')->with($notification);
        
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
        $pembayarans = Pembayaran::findOrFail($id);
        $pembayarans->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus',
        ]);
    }
}
