<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spesialis;

class SpesialisController extends Controller
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
        $data['spesialiss'] = Spesialis::all();
        return view('spesialis')->with($data);
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
            'nama' => 'required'
            ]);

        //cek pasien apakah ada di database
        $spesialis = new Spesialis;
        $spesialis->nama = $request->get('nama');
        $spesialis->save();

        $notification = array(
            'message' => 'Data Spesialis Berhasil Ditambahkan',
            'alert-type' => 'success'
        );
        return redirect()->route('spesialis.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spesialiss = Spesialis::findOrFail($id);
        return response()->json($spesialiss);
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
        $spesialis = Spesialis::findOrFail($id);
        $spesialis->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Spesialis Berhasil Dihapus',
        ]);
    }

    public function change(Request $request)
    {
        $request->validate([
            'nama' => 'required'
            ]);

        //cek pasien apakah ada di database
        $spesialis = Spesialis::findOrFail($request->get('id'));
        $spesialis->nama = $request->get('nama');
        $spesialis->save();

        $notification = array(
            'message' => 'Data Spesialis Berhasil Diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('spesialis.index')->with($notification);
    }
}
