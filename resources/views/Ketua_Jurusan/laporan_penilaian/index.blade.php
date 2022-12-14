@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('main')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Evaluasi Page</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-secondary">Table Data</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom-secondary">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Matakuliah</th>
                                    <th>Dosen</th>
                                    <th>Kurikulum</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:13px;">
                            <?php $no=1; ?>
                            @forelse($data as $d)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$d->tahun_akademik}}</td>
                                    <td>{{$d->matakuliah->nama_matakuliah}}</td>
                                    <td>{{$d->dosen_pengampu->nama}}</td>
                                    <td>{{$d->kurikulum}}</td>
                                    <td class="text-center">
                                        <a style="text-decoration:none" href="{{url('/jurusan/laporan-penilaian/detail')}}/{{$d->id}}" data-id="{{$d->id}}" data-id1="{{$d->timeline_perkuliahan}}" id="detail" title="Detail"><i class="fa fa-ellipsis-h"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    Tidak Ada Data
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready( function () {

});
</script>
@endsection