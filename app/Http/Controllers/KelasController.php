<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriKelas;
use App\Models\Kelas;
use App\Models\Video;
use App\Models\Order;
use App\Models\Tentor;
use Carbon\carbon;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Gate::allows('index-kelas')) abort(403, 'access denied');

        if($request->ajax()){
            $data = Kelas::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kategori_id', function ($data) {
                    return $data->kategorikelas->nama_kategori;
                })
                ->addColumn('tentor_id', function ($data) {
                    return $data->tentor->nama_tentor;
                })
                ->addColumn('nominal', function($row){
                    $nominal = 'Rp. ' . number_format($row->nominal, 0, ',', '.');
                    return $nominal;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'. url('admin/kelas/' . $row->id ) .'" class="badge badge-light-secondary"><i class="fas fa-solid fa-eye"></i>
                    Lihat</a>';
                    return $btn;
                })
                ->rawColumns(['kategori_id','tentor_id','nominal','action'])
                ->make(true);
        }

        return view('backend.kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('create-kelas')) abort(403, 'access denied');

        $kategori = KategoriKelas::all();
        $tentor = Tentor::all();

        return view('backend.kelas.create', compact(
            'kategori','tentor'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kelas $id)
    {
        if(!Gate::allows('create-kelas')) abort(403, 'access denied');

        $validate = $this->validation();
        
        try {
            $kelas = new Kelas;
            $kelas->tentor_id = $request->tentor_id; 
            $kelas->kategori_id = $request->kategori_id; 
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->foto_kelas = $request->foto_kelas;
            $kelas->nominal = explodeRupiah($request->nominal);
            $kelas->deskripsi = $request->deskripsi;
            //upload foto_kelas
            $foto_kelas = '';
            if ($request->hasFile('foto_kelas')) {
                $file = $request->file('foto_kelas');
                $originalName1 = time() . '.' . $file->getClientOriginalName();
                $foto_kelas = $originalName1;
                $file->move('uploads/kelas', $foto_kelas);
            }
            $kelas->foto_kelas = $foto_kelas;
            $kelas->save();
            // if(count($kelas->videos) == 0){
                //     $judul_list = $request->judul;
                //     $link_list = $request->link;
                //     $deskripsi_list = $request->deskripsi;
                //     $kelas_list = $kelas->id;
                //     foreach(array_merge($kelas_list,$judul_list,$link_list,$deskripsi_list) as $val){
                //         $video = Video::create(['kelas_id' => $val, 'judul' => $val, 'link' => $val, 'deskripsi' => $val]);
                //     }
                // }
            $judul = count($request->judul);
            for ($i = 0; $i < $judul; $i++) {
                $datarinci = new Video();
                $datarinci->kelas_id = $kelas->id;
                $datarinci->judul = $request->judul[$i];
                $datarinci->link = $request->link[$i];
                $datarinci->deskripsi = $request->deskripsi2[$i];
                $datarinci->save();  
            }

            toast('Berhasil Menambahkan Data', 'success');
            return redirect('/admin/kelas');

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
        if(!Gate::allows('read-kelas')) abort(403, 'access denied');

        $kelas = Kelas::find($id);
        // $video = Video::where('kelas_id', $id)->get();

        return view('backend.kelas.detail', compact(
            'kelas'
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
        if(!Gate::allows('edit-kelas')) abort(403, 'access denied');

        $kelas = Kelas::find($id);
        $kategori = KategoriKelas::all();
        $tentor = Tentor::all();
        $video = Video::where('kelas_id', $id);
        // $videos = Video::where('kelas_id', $id)->get()->toArray();

        return view('backend.kelas.edit', compact(
            'kelas','kategori','video','tentor'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Video $video, $id)
    {
        if(!Gate::allows('edit-kelas')) abort(403, 'access denied');

        $validate = $this->validation();
        
        try 
        {
            $kelas = Kelas::find($id);
            $kelas->tentor_id = $request->tentor_id; 
            $kelas->kategori_id = $request->kategori_id; 
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->nominal = explodeRupiah($request->nominal);
            $kelas->deskripsi = $request->deskripsi;

            //upload foto_kelas
            if ($request->hasFile('foto_kelas')) {
                $file = $request->file('foto_kelas');
                $originalName1 = time() . '.' . $file->getClientOriginalName();
                $foto_kelas = $originalName1;
                $file->move('uploads/kelas', $foto_kelas);
                if ($kelas->foto_kelas != '') {
                    File::delete('uploads/kelas/' . $kelas->foto_kelas);
                }
            } else {
                $foto_kelas = $kelas->foto_kelas;
            }
            $kelas->foto_kelas = $foto_kelas;
            $kelas->save();
    
            //update relasi tabel video
            $rinci = count($request->judul);
            for ($i = 0; $i < $rinci; $i++) {
                 if (!is_null($request->judul[$i])) {
                    if(!is_null($request->video_rinci[$i])){
                        Video::whereId($request->video_rinci[$i])
                            ->update([
                                'kelas_id' => $kelas->id,
                                'judul' => $request->judul[$i],
                                'link' => $request->link[$i],
                                'deskripsi' => $request->deskripsi2[$i],
                            ]);
                        }
                    }
                    
                // $datarinci = Video::find($video->id);
                // $datarinci->judul = $request->judul[$i];
                // $datarinci->link = $request->link[$i];
                // $datarinci->deskripsi = $request->deskripsi2[$i];
                // $datarinci->save();
             //}
            }

            toast('Berhasil Mengubah Data', 'success');
            return redirect('/admin/kelas');

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
        if(!Gate::allows('delete-kelas')) abort(403, 'access denied');

        try {
            $kelas = Kelas::find($id);
            //hapus foto kelas
            if (!empty($kelas->foto_kelas)) {
                File::delete('uploads/kelas/' . $kelas->foto_kelas);
            }
            //hapus relasi tabel video
            foreach ($kelas->videos as $rinci) {
                $rinci->delete();
            }

            //hapus kelas
            $kelas->delete();

            toast('Berhasil Menghapus Data', 'success');
            return redirect('/admin/kelas');

        } catch (\Throwable $th) {
            toast('Data gagal terhapus! Karena data sudah berelasi','error');
            return back();
        }
    }

    private function validation()
    {
        $validate = request()->validate([
            'nama_kelas' => 'required',
            'kategori_id' => 'required',
            'tentor_id' => 'required',
            'nominal' => 'required',
            'foto_kelas' => 'file|mimes:jpeg,jpg,png|max:2000'
        ]);

        return $validate;
    }

    // private function validation2()
    // {
    //     $validate2 = request()->validate([
    //         'judul' => 'required',
    //         'link' => 'required'
    //     ]);

    //     return $validate2;
    // }

    //=======================index pembayaran==============================================================//

    public function pembayaran(Request $request){
        if(!Gate::allows('index-pembayaran')) abort(403, 'access denied');

        if($request->ajax()){
            $data = Order::latest()->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('user_id', function ($data) {
                return $data->user->email;
            })
            ->addColumn('no_telp', function ($data) {
                return $data->user->phone;
            })
            ->addColumn('kelas_id', function ($data) {
                return $data->kelas->nama_kelas;
            })
            ->addColumn('nominal', function($row){
                $nominal = 'Rp. ' . number_format($row->nominal, 0, ',', '.');
                return $nominal;
            })
            ->addColumn('status', function($row){
                if($row->status == 3){
                    $status = '<div class="badge badge-light-warning">Belum dibayar</div>';
                }elseif($row->status == 1){
                    $status = '<div class="badge badge-light-success">Sudah dibayar</div>';
                }elseif($row->status == 2){
                    $status = '<div class="badge badge-light-danger">Transaksi Expired</div>';
                }elseif($row->status == 0){
                    $status = '<div class="badge badge-light-danger">Transaksi Masih dalam Proses</div>';
                }else{
                    $status = "-";
                }
                return $status;
            })
            ->rawColumns(['user_id','no_telp','kelas_id','nominal','status'])
            ->make(true);
        }

        return view('backend.pembayaran.index');
    }
    
    //=======================siswa==============================================================//
    //list kelas siswa
    public function listKelas(){
        $kelas = Kelas::all();

        return view('backend.siswa.index', compact(
            'kelas'
        ));
    }
    
    public function detailListKelas(Request $request, $id){

        $kelas = Kelas::find($id);
        $video = Video::where('kelas_id', $id)->first();
        
        return view('backend.siswa.indexdetail', compact(
            'kelas','video'
        ));
    }

    public function kelasSaya(){
        
        $order = Order::where(['user_id' => Auth::id(), 'status' => 1])->get();
        
        // if($order->status = 1){
        //     $kelas = Kelas::where('id', $order->kelas_id ='18')->get();
        // }

        // foreach($kelas as $kelas){
        //     $kelas = Kelas::where('id', $order->kelas_id);
        // }

        // $kelas = Kelas::where('id', $order->kelas_id = 'kelas_id')->get();
        
        // dd($order);
        if($order->count() == 0){
            return view('backend.siswa.belumbeli');
        }
        
        return view('backend.siswa.kelasku', compact(
            'order'
        ));
    }
    
    public function detailKelasSaya($id){
        
        $kelas = Kelas::find($id);
        $video = Video::where('kelas_id', $id)->get();

        return view('backend.siswa.detailkelasku', compact(
            'kelas','video'
        ));
    }
    
    public function embedKelasSaya($id,Video $video_id){
        $video_id = Video::find($video_id->id);
        $kelas = Kelas::find($id);

        return view('backend.siswa.detailvideoku', compact(
            'video_id','kelas'
        ));
    }

    public function detailBeliListKelas(Request $request, $id){

        try {
            $kelas = Kelas::find($id);
        
            //Mencari apakah user telah melakukan checkout
            $orderData = Order::where(['user_id' => Auth::id(), 'kelas_id' => $id])->first();
            
            if($orderData == null){
                 
                $order = new Order();
                $order->user_id = Auth::id();
                $order->kelas_id = $kelas->id;
                $order->nominal = $kelas->nominal;
                $order->status = 3;
                $order->save();

                if($order->snaptoken == null){
                    $this->initPaymentGateway();

                    $params = array(
                        'transaction_details' => array(
                            'order_id' => $order->id,
                            'gross_amount' => $order->nominal,
                        ),
                        'customer_details' => array(
                            'first_name' => Auth::user()->name,
                            'last_name' => '',
                            'email' => Auth::user()->email,
                            'phone' => '08111222333',
                        ),
                    );
                    $snapToken = \Midtrans\Snap::getSnapToken($params);
                    $order->snaptoken = $snapToken;
                    $order->save();
                }
                
            }else{
                toast('Anda Sudah membeli Kelas ini, Silahkan Cek di Menu Pembayaran!','error');
                return back();
            }

            toast('Berhasil Menambahkan Ke Pembayaran', 'success');
            return redirect('siswa/pembayaran');

        } catch (\Throwable $th) {

            toast('Terjadi Kesalahan!','error');
            return back();
        }  
    }

    public function beli(){
        $order = Order::where('user_id', Auth::id())->get();

        return view('backend.siswa.pembayaran', compact(
            'order'
        ));
    }

    public function hapusPembayaran($id){
        try {
            $order = Order::find($id);

            $order->delete();

            toast('Berhasil Menghapus Data', 'success');
            return redirect('/siswa/pembayaran');

        } catch (\Throwable $th) {
            toast('Data gagal terhapus! Karena data sudah berelasi','error');
            return back();
        }
    }

    private function initPaymentGateway(){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY')  ;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

}