@extends('layouts.vuexy')

@section('header')
Role Access Management ( Manajemen Akses )
@endsection

@section('content')
@if($errors->all())
    @include('layouts.validation')
@elseif(session('success'))
    @include('layouts.success')
@endif
<br>
<a href="{{ url('/admin/role-akses') }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>
<br>
<br>

<div class="card">
    <div class="card-header">
        <h3>{{ $user->name }} <small>({{ $user->level->nama_level }})</small> </h3>
    </div>
    <div class="card-body">
        <form action="{{ url('admin/role-akses/'.$user->id) }}" method="post">
        <table class="table">
            <tr>
                <td class="bg-light" colspan="6"><strong>Modul Master</strong> </td>
            </tr>
            <tr>
                <td>Master Kategori</td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'KategoriController' && $akses->can_index == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="kat_i"> Index</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'KategoriController' && $akses->can_create == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="kat_c"> Create</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'KategoriController' && $akses->can_read == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="kat_r"> Read</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'KategoriController' && $akses->can_update == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="kat_u"> Update</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'KategoriController' && $akses->can_delete == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="kat_d"> Delete</label></td>
            </tr>
            <tr>
                <td>Master Tentor</td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'TentorController' && $akses->can_index == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="ten_i"> Index</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'TentorController' && $akses->can_create == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="ten_c"> Create</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'TentorController' && $akses->can_read == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="ten_r"> Read</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'TentorController' && $akses->can_update == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="ten_u"> Update</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'TentorController' && $akses->can_delete == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="ten_d"> Delete</label></td>
            </tr>
            <tr>
                <td>Master Kelas</td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'KelasController' && $akses->can_index == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="kel_i"> Index</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'KelasController' && $akses->can_create == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="kel_c"> Create</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'KelasController' && $akses->can_read == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="kel_r"> Read</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'KelasController' && $akses->can_update == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="kel_u"> Update</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'KelasController' && $akses->can_delete == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="kel_d"> Delete</label></td>
            </tr>

            <!-- <tr>
                <td class="bg-light"  colspan="6"><strong>Role Akses</strong> </td>
            </tr>
            <tr>
                <td>Role Management</td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'role_akses' && $akses->can_index == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="rm_i"> Index</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'role_akses' && $akses->can_create == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="rm_c"> Create</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'role_akses' && $akses->can_read == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="rm_r"> Read</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'role_akses' && $akses->can_update == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="rm_u"> Update</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'role_akses' && $akses->can_delete == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="rm_d"> Delete</label></td>
            </tr> -->

            <tr>
                <td class="bg-light" colspan="6"><strong>Modul Pembelian Kelas</strong> </td>
            </tr>
            <tr>
                <td>Modul Pembelian Kelas</td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'PembelianController' && $akses->can_index == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="pem_i" > Index</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'PembelianController' && $akses->can_create == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="pem_c" disabled> Create</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'PembelianController' && $akses->can_read == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="pem_r" disabled> Read</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'PembelianController' && $akses->can_update == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="pem_u" disabled> Update</label></td>
                <td><label class="label"> <input <?php foreach($role as $akses){ if($akses->nama_controller == 'PembelianController' && $akses->can_delete == 1){ echo 'checked'; } } ?> type="checkbox" value="1" name="pem_d" disabled> Delete</label></td>
            </tr>
        </table>
        
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
</div>
@endsection