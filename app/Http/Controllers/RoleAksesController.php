<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    RoleAkses,
    User
};
use Illuminate\Support\Facades\Gate;

class RoleAksesController extends Controller
{
    public function index(){

        if(!Gate::allows('index-roleakses')) abort(403, 'access denied');

        $user = User::where('level_id', '!=', 4)->where('level_id', '!=', 1)->get();
        
        return view('roleakses.index', compact('user'));
    }

    public function show($id){
        if(!Gate::allows('index-roleakses')) abort(403, 'access denied');

        $user = User::find($id);
        $role = RoleAkses::where('user_id', $id)->get();
        
        return view('roleakses.show', compact('role','user'));
    }

    public function store_update($id){
        $request = Request();

        // Kategori
        $kat_role = RoleAkses::where(['user_id' => $id, 'nama_controller' => 'KategoriController'])->first();
        if($request->kat_i == 1 || $request->kat_c == 1 || $request->kat_r == 1 || $request->kat_e == 1 || $request->kat_d == 1){
            if(empty($kat_role)){
                $role = new RoleAkses;
                $role->nama_controller = 'KategoriController';
                $role->user_id = $id;
                $role->can_index = (empty(Request('kat_i'))) ? 0 : 1;
                $role->can_create = (empty(Request('kat_c'))) ? 0 : 1;
                $role->can_read = (empty(Request('kat_r'))) ? 0 : 1;
                $role->can_edit = (empty(Request('kat_e'))) ? 0 : 1;
                $role->can_delete = (empty(Request('kat_d'))) ? 0 : 1;
                $role->save();
            }else{
                $role = RoleAkses::find($kat_role->id);
                $role->nama_controller = 'KategoriController';
                $role->user_id = $id;
                $role->can_index = (Request('kat_i') == 1) ? 1 : 0;
                $role->can_create = (Request('kat_c') == 1) ? 1 : 0;
                $role->can_read = (Request('kat_r') == 1) ? 1 : 0;
                $role->can_edit = (Request('kat_e') == 1) ? 1 : 0;
                $role->can_delete = (Request('kat_d') == 1) ? 1 : 0;
                $role->save();
            }
        }else{
            if(!empty($kat_role)){
                $role = RoleAkses::find($kat_role->id);
                $role->delete();
            }
        }

        //Tentor
        $ten_role = RoleAkses::where(['user_id' => $id, 'nama_controller' => 'TentorController'])->first();
        if($request->ten_i == 1 || $request->ten_c == 1 || $request->ten_r == 1 || $request->ten_e == 1 || $request->ten_d == 1){
            if(empty($ten_role)){
                $role = new RoleAkses;
                $role->nama_controller = 'TentorController';
                $role->user_id = $id;
                $role->can_index = (empty(Request('ten_i'))) ? 0 : 1;
                $role->can_create = (empty(Request('ten_c'))) ? 0 : 1;
                $role->can_read = (empty(Request('ten_r'))) ? 0 : 1;
                $role->can_edit = (empty(Request('ten_e'))) ? 0 : 1;
                $role->can_delete = (empty(Request('ten_d'))) ? 0 : 1;
                $role->save();
            }else{
                $role = RoleAkses::find($ten_role->id);
                $role->nama_controller = 'TentorController';
                $role->user_id = $id;
                $role->can_index = (Request('ten_i') == 1) ? 1 : 0;
                $role->can_create = (Request('ten_c') == 1) ? 1 : 0;
                $role->can_read = (Request('ten_r') == 1) ? 1 : 0;
                $role->can_edit = (Request('ten_e') == 1) ? 1 : 0;
                $role->can_delete = (Request('ten_d') == 1) ? 1 : 0;
                $role->save();
            }
        }else{
            if(!empty($ten_role)){
                $role = RoleAkses::find($ten_role->id);
                $role->delete();
            }
        }

        //Kelas
        $kel_role = RoleAkses::where(['user_id' => $id, 'nama_controller' => 'KelasController'])->first();
        if($request->kel_i == 1 || $request->kel_c == 1 || $request->kel_r == 1 || $request->kel_e == 1 || $request->kel_d == 1){
            if(empty($kel_role)){
                $role = new RoleAkses;
                $role->nama_controller = 'KelasController';
                $role->user_id = $id;
                $role->can_index = (empty(Request('kel_i'))) ? 0 : 1;
                $role->can_create = (empty(Request('kel_c'))) ? 0 : 1;
                $role->can_read = (empty(Request('kel_r'))) ? 0 : 1;
                $role->can_edit = (empty(Request('kel_e'))) ? 0 : 1;
                $role->can_delete = (empty(Request('kel_d'))) ? 0 : 1;
                $role->save();
            }else{
                $role = RoleAkses::find($kel_role->id);
                $role->nama_controller = 'KelasController';
                $role->user_id = $id;
                $role->can_index = (Request('kel_i') == 1) ? 1 : 0;
                $role->can_create = (Request('kel_c') == 1) ? 1 : 0;
                $role->can_read = (Request('kel_r') == 1) ? 1 : 0;
                $role->can_edit = (Request('kel_e') == 1) ? 1 : 0;
                $role->can_delete = (Request('kel_d') == 1) ? 1 : 0;
                $role->save();
            }
        }else{
            if(!empty($kel_role)){
                $role = RoleAkses::find($kel_role->id);
                $role->delete();
            }
        }


        //Pembayaran
        $pem_role = RoleAkses::where(['user_id' => $id, 'nama_controller' => 'PembayaranController'])->first();
        if($request->pem_i == 1 || $request->pem_c == 1 || $request->pem_r == 1 || $request->pem_e == 1 || $request->pem_d == 1){
            if(empty($pem_role)){
                $role = new RoleAkses;
                $role->nama_controller = 'PembayaranController';
                $role->user_id = $id;
                $role->can_index = (empty(Request('pem_i'))) ? 0 : 1;
                $role->can_create = (empty(Request('pem_c'))) ? 0 : 1;
                $role->can_read = (empty(Request('pem_r'))) ? 0 : 1;
                $role->can_edit = (empty(Request('pem_e'))) ? 0 : 1;
                $role->can_delete = (empty(Request('pem_d'))) ? 0 : 1;
                $role->save();
            }else{
                $role = RoleAkses::find($pem_role->id);
                $role->nama_controller = 'PembayaranController';
                $role->user_id = $id;
                $role->can_index = (Request('pem_i') == 1) ? 1 : 0;
                $role->can_create = (Request('pem_c') == 1) ? 1 : 0;
                $role->can_read = (Request('pem_r') == 1) ? 1 : 0;
                $role->can_edit = (Request('pem_e') == 1) ? 1 : 0;
                $role->can_delete = (Request('pem_d') == 1) ? 1 : 0;
                $role->save();
            }
        }else{
            if(!empty($pem_role)){
                $role = RoleAkses::find($pem_role->id);
                $role->delete();
            }
        }

    }
}
