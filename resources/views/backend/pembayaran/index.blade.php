@extends('layouts.vuexy')

@section('header')
Data Pembelian Kelas
@endsection

@section('content')
@if($errors->all())
    @include('layouts.validation')
@elseif(session('success'))
    @include('layouts.success')
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <!-- <div class="col-md-3 form-group">
                <a href="{{ url('/admin/kelas/create') }}" type="button" class="btn btn-outline-primary waves-effect waves-float waves-light">
                    
                    <i data-feather="plus"></i>
                    Baru
                </a>
            </div> -->
        </div>

        <table class="table table-hover table-bordered datatable">
            <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Pembeli</th>
                <th>No Telepon</th>
                <th>Kelas Yang Di Beli</th>
                <th>Nominal</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    </div>
</div>
@endsection

@section('myjs')
<script>
    $(function(){
        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("/admin/pembayaran") }}',
                type: 'GET',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'user_id', name: 'user_id'},
                {data: 'no_telp', name: 'user_id'},
                {data: 'kelas_id', name: 'kelas_id'},
                {data: 'nominal', name: 'nominal'},
                {data: 'status', name: 'status'}
            ],
            lengthMenu: [[25,50, 100, -1],[25,50, 100, "All"]]
        })
        // console.log()
        // styling wrapper
        //$('.dataTables_wrapper').addClass('py-2')

        //$('<div id="header-datatable" class="d-flex justify-content-between" ></div>').prependTo('.dataTables_wrapper')
        $('.dataTables_length').appendTo('#header-datatable')
        $('.dataTables_filter').appendTo('#header-datatable')

        // styling orderable
        $('.dataTables_length label')[0].childNodes[0].nodeValue = ''
        $('.dataTables_length label')[0].childNodes[2].nodeValue = ''
        $('.dataTables_length').addClass('p-0')
        $('.dataTables_length').css('float', 'none')
        $('.dataTables_length select').addClass('form-control form-control-sm form-control-alternative')

        // styling filter
        $('.dataTables_filter label')[0].childNodes[0].nodeValue = ''
        $('.dataTables_filter input').addClass('form-control form-control-sm form-control-alternative')
        $('.dataTables_filter input').attr('placeholder', 'search...')
        $('.dataTables_filter').css('float', 'none')
        $('.dataTables_filter').css('padding-right', '10px')

        // styling table
        $('.dataTable').removeClass('no-footer')
    })
</script>
@endsection