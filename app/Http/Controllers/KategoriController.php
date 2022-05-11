<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriKelas;
use Carbon\carbon;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Gate::allows('index-kategori')) abort(403, 'access denied');

        if($request->ajax()){
            $data = KategoriKelas::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'. url('admin/kategori/' . $row->id ) .'" class="badge badge-light-secondary"><i class="fas fa-solid fa-eye"></i>
                    Lihat</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('backend.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('create-kategori')) abort(403, 'access denied');

        return view('backend.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('create-kategori')) abort(403, 'access denied');

        $validate = $this->validation();
        
        try {
        $kategori = new KategoriKelas;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();

            toast('Berhasil Menambahkan Data', 'success');
            return redirect('/admin/kategori');

        } catch (\Throwable $th) {
            toast('Terjadi kesalahan pada inputan, mohon diperiksa ulang!','error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Gate::allows('read-kategori')) abort(403, 'access denied');

        $kategori = KategoriKelas::find($id);

        return view('backend.kategori.detail', compact(
            'kategori'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('edit-kategori')) abort(403, 'access denied');

        $kategori = KategoriKelas::find($id);

        return view('backend.kategori.edit', compact(
            'kategori'
        ));
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
        if(!Gate::allows('edit-kategori')) abort(403, 'access denied');

        $validate = $this->validation();
        
        try {
        $kategori = KategoriKelas::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();

            toast('Berhasil Mengubah Data', 'success');
            return redirect('/admin/kategori');

        } catch (\Throwable $th) {
            toast('Terjadi kesalahan pada inputan, mohon diperiksa ulang!','error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Gate::allows('delete-kategori')) abort(403, 'access denied');

        try {
            $kategori = KategoriKelas::find($id);
            $kategori->delete();

            toast('Berhasil Menghapus Data', 'success');
            return redirect('/admin/kategori');

        } catch (\Throwable $th) {
            toast('Data gagal terhapus! Karena data sudah berelasi','error');
            return back();
        }
    }

    private function validation()
    {
        $validate = request()->validate([
            'nama_kategori' => 'required'
        ]);

        return $validate;
    }
}
