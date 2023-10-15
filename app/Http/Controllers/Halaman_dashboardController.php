<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Jenis_surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Halaman_dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Surat $surat)
    {
        $surat = Surat::orderby('id_surat','asc')->get();
        return view('dashboard.dashboard')->with(['surat' => $surat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Jenis_surat $jenis)
    {
        $jenisSuratData = $jenis->all();

        return view('dashboard.tambah', [
            'jenis_Surat' => $jenisSuratData,
        ]);
    }

    public function store(Request $request, Surat $surat)
    {
        $data = $request->validate(
            [
                'id_jenis_surat' => 'required',
                'tanggal_surat' => 'required',
                'ringkasan' => 'required',
                'file' => 'required|file',
            ]
        );

        $user = Auth::user();
        $data['id_user'] = $user->id_user;

        if($request->hasFile('file'))
        {
            $foto_file = $request->file('file');
            $foto_nama = $foto_file->getClientOriginalName() . time() . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('image'), $foto_nama);
            $data['file'] = $foto_nama;
        }
        
        if(Surat::create($data))
        {
            return redirect()->to('/dashboard')->with("success", "Data Surat Berhasil Ditambahkan");
        }else
        {
            return back()->with("error","Data Surat Gagal Ditambahkan");
        }
    } 

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat, Jenis_surat $jenis_surat, String $id)
    {
        //
        $suratData = Surat::where('id_surat', $id)->first();
        $jenis_surat = Jenis_surat::all();

        $data = [
            'surat' => $suratData,
            'jenis_surat' => $jenis_surat
        ];

        return view('dashboard.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        $data = $request->validate([
            'id_surat' => 'required',
            'tanggal_surat'=> 'required',
            'ringkasan'=> 'required',
            'id_jenis_surat'=> 'required',
            'file'=> 'sometimes'
        ]);
        if($data){
            if($request->hasFile('file')){
                $foto_file = $request->file('file');
                $foto_nama = $foto_file->getClientOriginalName() . time() . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('image'), $foto_nama);
                $update_data = $surat->where('id_surat', $request->input('id_surat'))->first();
                File::delete(public_path('image').'/'. $update_data->file);
                $data['file'] = $foto_nama;
            }
            Surat::where('id_surat', $request->input('id_surat'))->update($data);
            return redirect()->to('/dashboard')->with('success','Data Surat Berhasil di Update');
        } else {
            return back()->with('error','Data Surat Gagal di Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Surat $surat)
    {
        //
        $id_surat = $request->input('id_surat');
        $aksi = $surat->where('id_surat',$id_surat)->delete();
            if($aksi)
            {
                $pesan = [
                    'success' => true,
                    'pesan'   => 'Jenis surat berhasil dihapus'
                ];
            }else
            {
                $pesan = [
                    'success' => false,
                    'pesan'   => 'Jenis surat gagal dihapus'
                ];
            }
            return response()->json($pesan);
    }
}