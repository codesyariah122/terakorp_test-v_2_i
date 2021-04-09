<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RumahSakit;


class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pasien.index');
    }


    public function show_pasien()
    {
        $pasiens = Pasien::join('rumah_sakits', 'pasiens.id_rumahsakit', '=', 'rumah_sakits.id')
        ->get(['pasiens.*', 'rumah_sakits.nama']);
        return json_encode($pasiens);

    }

    public function rules()
    {
        return [
         'nama_pasien' => 'required',
         'id_rumahsakit' => 'required',
         'email' => 'required|email',
         'alamat' => 'required',
         'telepon' => 'required|min:12'
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
        $data = RumahSakit::get();
        $context = [
            'hospitals' => $data
        ];
        return view('pasien.add', $context);
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

        Pasien::create($request->all());

        return redirect()->route('pasien')
        ->with('success', 'Data pasien baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showById($id)
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
        // echo $nama_pasien . ' ' .$id_rumahsakit;
        //
        $pasien = Pasien::join('rumah_sakits', 'pasiens.id_rumahsakit', '=', 'rumah_sakits.id')
        ->where('pasiens.id', $id)
        ->get(['pasiens.*', 'rumah_sakits.nama'])[0];
        $rumahsakits = RumahSakit::get();
        // var_dump($pasien);
        // die;
        // $rumah_sakit = $id_rumahsakit->intersect(RumahSakit::whereIn('id')->get());

        // echo "<pre>";
        // var_dump($rumah_sakit);
        // echo "</pre>";
        // echo $pasien[0]->id_rumahsakit;
        return view('pasien.edit', ['data' => $pasien, 'rumahsakits' => $rumahsakits]);
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
         $data = Pasien::findOrFail($id);
         $data->nama_pasien = $request->get('nama_pasien');
         $data->id_rumahsakit = $request->get('id_rumahsakit');
         $data->email = $request->get('email');
         $data->alamat = $request->get('alamat');
         $data->telepon = $request->get('telepon');
         $this->validate($request, $this->rules());
         $data->save();
         return redirect()->route('pasien')
         ->with('success', 'Data '.$data->nama_pasien. ' berhasil diupdate');
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
        $data = Pasien::find($id);
        $data->delete();
        return response()->json('Data pasien deleted!');
    }
}
