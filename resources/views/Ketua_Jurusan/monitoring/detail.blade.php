@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('main')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Monitoring Kelas Perkuliahan</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-secondary">Info Kelas</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom-secondary">
                    <div class="row">
                        <div class="col-md-3">
                            <div>Kode Kelas</div>
                            <div>Matakuliah</div>
                            <div>Kelas</div>
                            <div>Kuota</div>
                            <div>Semester / Sks</div>
                            <div>Tahun Akademik</div>
                            <div>Kurikulum</div>
                            <div>Dosen Pengampu</div>
                            <div>Dosen Verifikator</div>
                        </div>
                        <div class="col-md-1 text-right">
                            <div>:</div>
                            <div>:</div>
                            <div>:</div>
                            <div>:</div>
                            <div>:</div>
                            <div>:</div>
                            <div>:</div>
                            <div>:</div>
                            <div>:</div>
                        </div>
                        <div class="col-md-8 text-left">
                            <div>{{$data[0]->id}}</div>
                            <div>{{$data[0]->nama_matakuliah}}</div>
                            <div>{{$data[0]->kategori_matakuliah}}</div>
                            <div>{{$data[0]->kuota}}</div>
                            <div>{{$data[0]->semester}} / {{$data[0]->sks}}</div>
                            <div>{{$data[0]->tahun_akademik}}</div>
                            <div>{{$data[0]->kurikulum}}</div>
                            <div>{{$data[0]->nama}}</div>
                            <div>{{$data1[0]->dosen_verifikator->nama}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-secondary">Info Kegiatan Kelas</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom-secondary">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pertemuan</th>
                                    <th>Materi</th>
                                    <th>Jumlah Mahasiswa</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:13px;">
                            <?php
                                $no = 1;
                            ?>
                            @forelse($data1 as $da)
                                @foreach($da->monitoring as $d)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$d->tanggal}}</td>
                                        <td>{{$d->pertemuan}}</td>
                                        <td>{{$d->materi}}</td>
                                        <td>{{$d->jumlah_mahasiswa}} Orang</td>
                                        <td>{{$d->jam_mulai}}</td>
                                        <td>{{$d->jam_selesai}}</td>
                                        <td class="text-center">
                                            <a id="pdf" href="#" data-id="{{$d->id}}"><i class="fa fa-file"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
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
$(document).on('click', '#pdf', function() {
    var id = $(this).data('id');
    window.open("{{ url('bukti') }}/"+id);
});
});
</script>
@endsection