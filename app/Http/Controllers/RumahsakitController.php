<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;


class RumahsakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = RumahSakit::orderBy('id', 'ASC')
        ->get();
        return json_encode($data);
    }

    public function rules()
    {
        return [
           'nama' => 'required',
           'email' => 'required|email',
           'alamat' => 'required',
           'telepon' => 'required|min:10'
       ];
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rumahsakit.add');

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
        $this->validate($request, $this->rules());

        RumahSakit::create($request->all());

        return redirect()->route('home')
        ->with('success', 'Data baru berhasil ditambahkan');
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
        var_dump($id);
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
        $data = new RumahSakit;
        return view('rumahsakit.edit', ['data' => $data::findOrFail($id)]);
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
     $data = RumahSakit::findOrFail($id);
     $data->nama = $request->get('nama');
     $data->email = $request->get('email');
     $data->alamat = $request->get('alamat');
     $data->telepon = $request->get('telepon');
     $this->validate($request, $this->rules());
     $data->save();
     return redirect()->route('home')
     ->with('success', 'Data '.$data->nama. ' berhasil diupdate');
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
        $data = RumahSakit::find($id);
        $data->delete();
        return response()->json('Data rumah sakit deleted!');
    }
}
