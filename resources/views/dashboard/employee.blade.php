<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table-employee table table-condensed table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Masuk Kerja</th>
                        <th>Masa Kontrak</th>
                        <th>Sisa Masa Kontrak</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $employee as $emp )
                        <tr>
                            <td>{{ $emp->nik }}</td>
                            <td>{{ $emp->nama_karyawan }}</td>
                            <td>{{ $emp->tanggal_masuk_kerja }}</td>
                            <td>Sampai dengan {{ $emp->masa_kontrak}}</td>
                            <td>{{ \Carbon\Carbon::parse($emp->masa_kontrak)->diffAsCarbonInterval( \Carbon\Carbon::now()->startOfDay() )}}
                                @if(\Carbon\Carbon::now()->startOfDay() >= $emp->masa_kontrak)
                                    - <span class="badge badge-danger pl-1 pr-1">Terlewatkan</span>
                                @else
                                    - <span class="badge badge-primary pl-1 pr-1">Sisa</span>
                                @endif
                            </td>
                            <td>
                                @if(\Carbon\Carbon::now()->startOfDay() >= $emp->masa_kontrak)
                                    <span  class="badge badge-danger pl-1 pr-1">Masa Kontrak Telah Habis</span>
                                @else
                                    <span  class="badge badge-primary pl-1 pr-1">Masa Kontrak Aktif</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.table-employee').DataTable();
    })
</script>