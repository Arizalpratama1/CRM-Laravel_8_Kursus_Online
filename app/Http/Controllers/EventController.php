<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\carbon;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Event::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('tgl_event', function ($row) {
                    return $row->tgl_event ? with(new Carbon($row->tgl_event))->format('d F Y') : '';;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'. url('admin/event/' . $row->id ) .'" class="badge badge-light-secondary"><i class="fas fa-solid fa-eye"></i>
                    Lihat</a>';
                    return $btn;
                })
                ->rawColumns(['tgl_event','action'])
                ->make(true);
        }

        return view('backend.event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validation();

        try {
            $event = new Event;
            $event->nama_event = $request->nama_event;
            $event->tgl_event = $request->tgl_event;
            $event->jam_event = $request->jam_event;
            $event->link_event = $request->link_event;
            $event->lokasi = $request->lokasi;
            //upload foto_event
            $foto_event = '';
            if ($request->hasFile('foto_event')) {
                $file = $request->file('foto_event');
                $originalName1 = time() . '.' . $file->getClientOriginalName();
                $foto_event = $originalName1;
                $file->move('uploads/event', $foto_event);
            }
            $event->foto_event = $foto_event;
            $event->deskripsi = $request->deskripsi;
            $event->save();

            toast('Berhasil Menambahkan Data', 'success');
            return redirect('/admin/event');

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
        $event = Event::find($id);

        return view('backend.event.detail', compact(
            'event'
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
        $event = Event::find($id);

        return view('backend.event.edit', compact(
            'event'
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
        $validate = $this->validation();
        
        try 
        {
            $event = Event::find($id);
            $event->nama_event = $request->nama_event;
            $event->tgl_event = $request->tgl_event;
            $event->jam_event = $request->jam_event;
            $event->link_event = $request->link_event;
            $event->lokasi = $request->lokasi;
            $event->deskripsi = $request->deskripsi;

            //upload foto_event
            if ($request->hasFile('foto_event')) {
                $file = $request->file('foto_event');
                $originalName1 = time() . '.' . $file->getClientOriginalName();
                $foto_event = $originalName1;
                $file->move('uploads/event', $foto_event);
                if ($event->foto_event != '') {
                    File::delete('uploads/event/' . $event->foto_event);
                }
            } else {
                $foto_event = $event->foto_event;
            }
            $event->foto_event = $foto_event;
            $event->save();

            toast('Berhasil Mengubah Data', 'success');
            return redirect('/admin/event');

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
        try {
            $event = Event::find($id);
            
            //hapus foto event
            if (!empty($event->foto_event)) {
                File::delete('uploads/event/' . $event->foto_event);
            }
            
            //hapus event
            $event->delete();

            toast('Berhasil Menghapus Data', 'success');
            return redirect('/admin/event');
        } catch (\Throwable $th) {
            toast('Terjadi kesalahan pada inputan, mohon diperiksa ulang!','error');
            return back();
        }
    }

    private function validation()
    {
        $validate = request()->validate([
            'nama_event' => 'required',
            'tgl_event' => 'required',
            'jam_event' => 'required',
            'deskripsi' => 'required',
            'foto_event' => 'file|mimes:jpeg,jpg,png|max:2000'
        ]);

        return $validate;
    }
}
