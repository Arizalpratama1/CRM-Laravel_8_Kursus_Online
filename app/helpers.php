<?php

use App\Models\BukuBank;
use App\Models\BukuBankRinci;
use App\Models\BukuBesar;
use App\Models\Coa;
use App\Models\TipeCoa;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

function rupiah($jumlah)
{
    if(!is_numeric($jumlah)){
        $jumlah = 0;
    }
    return "Rp. " . number_format($jumlah,0,',','.');
}

function rupiahReport($jumlah)
{
    if(!is_numeric($jumlah)){
        $jumlah = 0;
    }
    return number_format($jumlah,2,',','.');
}

function tanggal($date)
{
    return Carbon::parse($date)->format('d F Y');
}

function explodeRupiah($string)
{
    $hilangkanRupiahNya = str_replace('Rp. ', '', $string);
    $result = str_replace('.', '', $hilangkanRupiahNya);

    return $result;
}

// Insert ke buku besar
function storeBukuBesar($coa_id, $tanggal, $nomer, $deskripsi, $sumber, $debit, $kredit)
{
    $id = Uuid::uuid4()->toString();
    BukuBesar::create([
        'id' => $id,
        'coa_id' => $coa_id,
        'tahun' =>  date('Y', strtotime($tanggal)),
        'tanggal' => $tanggal,
        'nomer' => $nomer,
        'deskripsi' => $deskripsi,
        'sumber' => $sumber,
        'debit' => $debit,
        'kredit' => $kredit,
        'is_deleted' => 1
    ]);
}

// destroy item buku besar
function destroyBukuBesar($sumber, $nomer)
{
    BukuBesar::whereSumber($sumber)->whereNomer($nomer)->delete();
}

// soft destroy buku besar
function softDestroyBukuBesar($sumber, $nomer)
{
    BukuBesar::whereSumber($sumber)->whereNomer($nomer)->update(['is_deleted' => 0]);
}

//insert ke buku bank
function storeBukuBank($buku_bank_id, $coa_id, $nomer, $tanggal, $sumber,  $deskripsi)
{

    $status = false;

    $totalCoa = count($coa_id);
    for ($i=0; $i < $totalCoa; $i++) { 
        $coa = Coa::whereId($coa_id[$i])
            ->whereIn('id_coatype', [1, 13]) // kalau ingin mengubah type coa id mana yang masuk ke kas bank bisa diubah di sini
            ->first();

        if(!empty($coa)){ 
            $status = true;
        }
    }

    if($status){ 
        BukuBank::create([
            'id' => $buku_bank_id,
            'nomer' => $nomer,
            'tanggal' => $tanggal,
            'sumber' => $sumber,
            'deskripsi' => $deskripsi,
            'is_deleted' => 1
        ]);
    }
    
}

function storeBukuBankRinci($buku_bank_id, $coa_id, $nominal, $memo, $tipe)
{
    $id = Uuid::uuid4()->toString();

    $coa = Coa::whereId($coa_id)
        ->whereIn('id_coatype', [1, 13]) // kalau ingin mengubah type coa id mana yang masuk ke kas bank bisa diubah di sini
        ->first();

    if(!empty($coa)){
        BukuBankRinci::create([
            'id' => $id,
            'buku_bank_id' => $buku_bank_id,
            'coa_id' => $coa_id,
            'nominal' => $nominal,
            'memo' => $memo,
            'tipe' => $tipe,
        ]);
    }
}

// destroy item buku besar
function destroyBukuBank($sumber, $nomer)
{
    BukuBank::whereSumber($sumber)->whereNomer($nomer)->delete();
}

// soft destroy buku besar
function softDestroyBukuBank($sumber, $nomer)
{
    BukuBank::whereSumber($sumber)->whereNomer($nomer)->update(['is_deleted' => 0]);
}


function tanggalSekarang()
{
    $tanggal = Carbon::now();
    return $tanggal->toDateString();
}