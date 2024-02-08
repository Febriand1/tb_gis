<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Polygon;

use Illuminate\Support\Facades\Cookie;

class PolygonSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolahs = Sekolah::all();

        return view('polygons.index', [
            'sekolahs' => $sekolahs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('polygons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataArray = json_decode($request->dataArray);
        
        $sekolah = new Sekolah;
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->latitude = $request->latitude;
        $sekolah->longitude = $request->longitude;
        $sekolah->save();

        $sekolahId = $sekolah->id;
        
        foreach ($dataArray as $record) {
            // Polygon::create($record);
            if($record[0] == null || $record[1] == null){
                continue;
            }
            $polygon = new Polygon;
            $polygon->sekolah_id = $sekolahId;
            $polygon->latitude = $record[0];
            $polygon->longitude = $record[1];
            $polygon->save();
        }

        return redirect()->route('polygons.index')->with('success', 'Data Polygon Sekolah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $polygon = Polygon::where('sekolah_id', $id)->get();
        return view('polygons.show', [
            'sekolah' => $sekolah,
            'polygon' => json_encode($polygon)
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
    }
}
