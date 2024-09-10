<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasjidStoreRequest;
use App\Http\Requests\MasjidUpdateRequest;
use App\Http\Resources\MasjidResource;
use App\Models\Masjid;

class MasjidController extends Controller
{
    public function index()
    {
        $daftarmasjid = Masjid::get();

        return MasjidResource::collection($daftarmasjid);
    }

    public function store(MasjidStoreRequest $request)
    {
        $masjid = Masjid::create([
            'nama'=>$request->nama,
            'rt'=>$request->rt,
            'rw'=>$request->rw,
            'desa'=>$request->desa,
            'kecamatan'=>$request->kecamatan,
        ]);

        return (new MasjidResource($masjid))->additional([
            'message' => 'Data Berhasil di Tambahkan',
        ]);
    }

    public function update(MasjidUpdateRequest $request, Masjid $masjid)
    {
        $masjid->update([
            'nama'=>$request->nama,
            'rt'=>$request->rt,
            'rw'=>$request->rw,
            'desa'=>$request->desa,
            'kecamatan'=>$request->kecamatan,
        ]);

        return (new MasjidResource($masjid))->additional([
            'message' => 'Data Berhasil di Edit'
        ]);
    }

    public function show($masjid)
    {
        $masjid = Masjid::findOrFail($masjid);

        return (new MasjidResource($masjid))->additional([
            'message' => 'Data Berhasil di Tampilkan'
        ]);
    }

    public function destroy(Masjid $masjid)
    {
        $masjid->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus'
        ]);
    }
}
