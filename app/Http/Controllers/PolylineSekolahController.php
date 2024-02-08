<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Polyline;

class PolylineSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polylines = Polyline::all();

        return view('polylines.index', [
            'polylines' => $polylines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('polylines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $polyline = new Polyline;
        $polyline->sekolah_id = $request->sekolah_id;
    
        // Create an associative array with latitude and longitude
        $location = [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];
    
        // Convert the array to a JSON string
        $polyline->location = json_encode($location);
    
        $polyline->save();
    
        return redirect()->route('polylines.index')->with('success', 'Data polyline Berhasil Ditambahkan');
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
    }
}
