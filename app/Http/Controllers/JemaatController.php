<?php

namespace App\Http\Controllers;

use App\Http\Requests\JemaatStoreRequest;
use App\Http\Requests\JemaatUpdateRequest;
use App\Http\Resources\JemaatResource;
use App\Models\Jemaat;

class JemaatController extends Controller
{
    public function index()
    {
        $daftarjemaat = Jemaat::with('masjid')->get();

        return JemaatResource::collection($daftarjemaat);
    }

    public function store(JemaatStoreRequest $request)
    {
        $jemaat = Jemaat::create([
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
            'masjid_id'=>$request->masjid_id,
        ]);

        return (new JemaatResource($jemaat))->additional([
            'message' => 'Data Berhasil di Masukkan',
        ]);
    }

    public function update(JemaatUpdateRequest $request, Jemaat $jemaat)
    {
        $jemaat->update([
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
            'masjid_id'=>$request->masjid_id,
        ]);

        return (new JemaatResource($jemaat))->additional([
            'message' => 'Data Berhasil di Edit',
        ]);
    }

    public function show($jemaat)
    {
        $jemaat = Jemaat::findOrFail($jemaat);

        return (new JemaatResource($jemaat))->additional([
            'message' => 'Data Berhasil di Ambil'
        ]);
    }

    public function destroy(Jemaat $jemaat)
    {
        $jemaat->delete();

        return response()->json([
            'message' => 'Data Berhasil di Hapus'
        ]);
    }
}
