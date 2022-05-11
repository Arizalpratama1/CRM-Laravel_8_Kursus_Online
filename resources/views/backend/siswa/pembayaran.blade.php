@extends('layouts.vuexy')

@section('header')
Menu Pembayaran
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="table-responsive">
                <table class="table-pembayaran table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Bayar</th>
                            <th>Cancel Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $or)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $or->kelas->nama_kelas }}</td>
                            <td>{{ rupiah($or->kelas->nominal) }}</td>
                            <td>
                                @if($or->status == 3)
                                <div class="badge badge-light-danger">Belum di Bayar</div>
                                @elseif($or->status ==2)
                                <div class="badge badge-light-warning">Proses</div>
                                @elseif($or->status == 1)
                                <div class="badge badge-light-success">Lunas</div>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="badge badge-light-secondary btn-bayar" data-snaptoken="{{$or->snaptoken}}">
                                    <i class="fas fa-hand-holding-usd"></i>
                                    Bayar
                                </a>
                            </td>
                            <td>
                                @if($or->status == 1)
                                <div class="badge badge-light-success">Pembayaran Telah Lunas</div>
                                @else
                                <form action="/siswa/pembayaran/{{ $or->id }}" method="POST">
                                @csrf
                                <button onclick="hapusFunction()" class="btn btn-outline-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i>&nbsp Cancel Pembelian</button>
                                </form>
                                @endif
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</div>
@endsection

@section('myjs')
<script>
    $(document).ready(function() {
        $('.table-pembayaran').DataTable({
            "lengthMenu": [[100, 200, -1], [100,200, "All"]]
        });
    });
    
</script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    $('.btn-bayar').click(function(e){
        e.preventDefault();
        var snaptoken = $(this).attr("data-snaptoken");
        // alert(snaptoken);

        snap.pay(snaptoken, {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
                window.location.reload();
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script type="text/javascript">
function hapusFunction() {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
        swal({
        title: "Are you sure?",
        text: "Apakah Anda yakin akan menghapus data Pembayaran?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#a90808",
        cancelButtonColor: "#87a182",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Tidak, Jangan Hapus!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm){
    if (isConfirm) {
        form.submit();          // submitting the form when user press yes
    } else {
        swal("Cancelled", "Data Batal Terhapus!", "error");
    }
    });
}
</script>
@endsection