@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('main')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Monev Perkuliahan</h1>
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
                                    <th>Matakuliah</th>
                                    <th>Dosen Pengampu</th>
                                    <th>Tahun Akademik</th>
                                    <th>Timeline</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:13px;">
                                <?php
                                $no=1;
                                ?>
                                @forelse($data as $d)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$d->kelas_perkuliahan->matakuliah->nama_matakuliah}}</td>
                                        <td>{{$d->kelas_perkuliahan->dosen_pengampu->nama}}</td>
                                        <td>{{$d->kelas_perkuliahan->tahun_akademik}}</td>
                                        <td>
                                            @if($d->timeline_perkuliahan == 1)
                                            Perkuliahan
                                            @elseif($d->timeline_perkuliahan == 2)
                                            UTS
                                            @elseif($d->timeline_perkuliahan == 3)
                                            UAS                                            
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a style="text-decoration:none" href="{{url('/dosen/monev/detail')}}/{{$d->id}}" data-id="{{$d->id}}" data-id1="{{$d->timeline_perkuliahan}}" id="detail" class="text-secondary" title="Detail"><i class="fa fa-ellipsis-h"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7">Tidak Ada Ada</td>
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

@section('modal')

@endsection

@section('js')
<script>
$(document).ready( function () {

    });
</script>
@endsection