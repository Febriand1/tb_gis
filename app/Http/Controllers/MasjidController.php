<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masjid;

class MasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function welcome()
     {
        $masjids = Masjid::all();
        return view('welcome', [
            'masjids' => $masjids
        ]);
     }

     public function map()
     {
        $masjids = Masjid::all();
        return view('maps.map', [
            'masjids' => $masjids
        ]);
     }

    public function index()
    {
        //
        $masjids = Masjid::all();
        return view('masjids.index', [
            'masjids' => $masjids
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('masjids.create');
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
        echo "<script>console.log('Debug Objects: " . $request->namamasjid . "' );</script>";
        $masjid = new Masjid;
        $masjid->namamasjid = $request->namamasjid;
        $masjid->provinsi = $request->provinsi;
        $masjid->kota = $request->kota;
        $masjid->kecamatan = $request->kecamatan;
        $masjid->alamat = $request->alamat;
        $masjid->longitude = $request->longitude;
        $masjid->latitude = $request->latitude;
        $masjid->save();

        return redirect()->route('masjids.index')->with('success', 'Data Masjid Berhasil Ditambahkan');
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
        $masjid = Masjid::findOrFail($id);
        return view('masjids.show', [
            'masjid' => $masjid
        ]);
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
        $masjid = Masjid::findOrFail($id);
        return view('masjids.edit', [
            'masjid' => $masjid
        ]);
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
        $masjid = Masjid::findOrFail($id);
        $masjid->namamasjid = $request->namamasjid;
        $masjid->provinsi = $request->provinsi;
        $masjid->kota = $request->kota;
        $masjid->kecamatan = $request->kecamatan;
        $masjid->alamat = $request->alamat;
        $masjid->longitude = $request->longitude;
        $masjid->latitude = $request->latitude;
        $masjid->save();

        return redirect()->route('masjids.index')->with('success', 'Data masjid berhasil diupdate.');
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
        $masjid = Masjid::findOrFail($id);
        $masjid->delete();

        return redirect()->route('masjids.index')->with('success', 'Data masjid berhasil dihapus.');
    }
}
