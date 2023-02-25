<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Download;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/download/index', [
            'download' => Download::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/download/create', [
            'download' => Download::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $valeidasi = $request->validate([
            'nama' => ['required', 'max:255'],
            'file' => ['file','mimes:zip','max:3072'],
            
        ]); 
        $file_name = $request->file('file')->getClientOriginalName();
        if($request->file('file')){
            $valeidasi['file'] = $request->file('file')->storeAs('file-download', $file_name);
        }
        $download = new Download;
        $download->nama = $valeidasi['nama'];
        $download->file = $file_name;
        $download->count = 0;
        $count = $download->count + 1;
        $download->update(['count' => $count]);

        $download->save();
        // Download::create($valeidasi);
        return redirect('/dashboard/download')->with('add', 'Berhasil Menambah Data');
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
    public function destroy(Download $download)
    {
        $download = Download::findOrFail($download->id);
        if ($download->file) {
            Storage::delete($download->file);
        }
        $download->delete();
        return redirect('dashboard/download')->with('del', 'Data berhasil dihapus.');
    }
}
