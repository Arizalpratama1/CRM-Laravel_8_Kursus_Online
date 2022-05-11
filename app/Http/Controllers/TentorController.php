<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentor;
use App\Models\KategoriKelas;
use Carbon\carbon;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Gate::allows('index-tentor')) abort(403, 'access denied');

        if($request->ajax()){
            $data = Tentor::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'. url('admin/tentor/' . $row->id ) .'" class="badge badge-light-secondary"><i class="fas fa-solid fa-eye"></i>
                    Lihat</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.tentor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('create-tentor')) abort(403, 'access denied');

        $kategori = KategoriKelas::all();

        return view('backend.tentor.create', compact(
            'kategori'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('create-tentor')) abort(403, 'access denied');

        $validate = $this->validation();
        
        try {
        $tentor = new Tentor;
        $tentor->kategori_id = $request->kategori_id; 
        $tentor->nama_tentor = $request->nama_tentor;
        $tentor->no_telp = $request->no_telp;
        $tentor->alamat = $request->alamat;
        $tentor->deskripsi = $request->deskripsi;
        //upload profil
        $profil = '';
        if ($request->hasFile('profil')) {
            $file = $request->file('profil');
            $originalName1 = time() . '.' . $file->getClientOriginalName();
            $profil = $originalName1;
            $file->move('uploads/tentor', $profil);
        }
        $tentor->profil = $profil;
        $tentor->save();

            toast('Berhasil Menambahkan Data', 'success');
            return redirect('/admin/tentor');

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
        if(!Gate::allows('read-tentor')) abort(403, 'access denied');

        $tentor = Tentor::find($id);
        $kategori = KategoriKelas::all();

        return view('backend.tentor.detail', compact(
            'tentor','kategori'
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
        if(!Gate::allows('edit-tentor')) abort(403, 'access denied');

        $tentor = Tentor::find($id);
        $kategori = KategoriKelas::all();
        
        return view('backend.tentor.edit', compact(
            'tentor','kategori'
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
        if(!Gate::allows('edit-tentor')) abort(403, 'access denied');

        $validate = $this->validation();

        try {
            $tentor = Tentor::find($id);
            $tentor->kategori_id = $request->kategori_id;
            $tentor->nama_tentor = $request->nama_tentor;
            $tentor->no_telp = $request->no_telp;
            $tentor->alamat = $request->alamat;
            $tentor->deskripsi = $request->deskripsi;
            //update profil
            if ($request->hasFile('profil')) {
                $file = $request->file('profil');
                $originalName1 = time() . '.' . $file->getClientOriginalName();
                $profil = $originalName1;
                $file->move('uploads/tentor', $profil);
                if ($tentor->profil != '') {
                    File::delete('uploads/tentor/' . $tentor->profil);
                }
            } else {
                $profil = $tentor->profil;
            }
            $tentor->profil = $profil;
            $tentor->save();

            toast('Berhasil Mengubah Data', 'success');
            return redirect('/admin/tentor');

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
        if(!Gate::allows('delete-tentor')) abort(403, 'access denied');

        try {
            $tentor = Tentor::find($id);
            if (!empty($tentor->profil)) {
                File::delete('uploads/tentor/' . $tentor->profil);
            }
            $tentor->delete();

            toast('Berhasil Menghapus Data', 'success');
            return redirect('/admin/tentor');

        } catch (\Throwable $th) {
            toast('Data gagal terhapus! Karena data sudah berelasi','error');
            return back();
        }
    }

    private function validation()
    {
        $validate = request()->validate([
            'nama_tentor' => 'required',
            'kategori_id' => 'required',
            'profil' => 'file|mimes:jpeg,jpg,png|max:2000'
        ]);

        return $validate;
    }
}
