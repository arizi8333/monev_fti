@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('main')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Kelas Perkuliahan</h1>
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
                        </div>
                        <div class="col-md-4">
                            <div>{{$data[0]->id}}</div>
                            <div>{{$data[0]->matakuliah->nama_matakuliah}}</div>
                            <div>{{$data[0]->matakuliah->kategori_matakuliah}}</div>
                            <div>{{$data[0]->matakuliah->kuota}} Orang</div>
                            <div>Semester {{$data[0]->matakuliah->semester}} / {{$data[0]->matakuliah->sks}} sks</div>
                            <div>{{$data[0]->tahun_akademik}}</div>
                            <div>{{$data[0]->kurikulum}}</div>
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
                        <div class="col-md-6 text-right">
                            <a href="#" id="add" class="btn btn-secondary btn-sm">
                                <!-- <span class="icon text-white-50">
                                    <i class="fa fa-plus"></i>
                                </span> -->
                                <span class="text"><i class="fa fa-plus"></i> Tambah</span>
                            </a>
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
                                </tr>
                            </thead>
                            <tbody style="font-size:13px;">
                            <?php
                                $no = 1;
                            ?>
                                @forelse ($monitoring as $b)
                                    @foreach($b->monitoring as $bb)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$bb->tanggal}}</td>
                                            <td>{{$bb->pertemuan}}</td>
                                            <td>{{$bb->materi}}</td>
                                            <td>{{$bb->jumlah_mahasiswa}} Orang</td>
                                            <td>{{$bb->jam_mulai}}</td>
                                            <td>{{$bb->jam_selesai}}</td>
                                        </tr>
                                    @endforeach
                                @empty
                                <tr>
                                    <td colspan=7 class="text-center">Belum Ada Data</td>
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
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Kegiatan Perkuliahan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('method' => 'POST', 'id' => 'form', 'files' => 'true'))}}
                    {{ csrf_field() }}

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Kategori:', ['class' => 'awesome'])}}
                        <select class="form-control" name="hasil_verifikasi" required>
                            @foreach($monitoring as $m)
                            <option value="{{$m->id}}">
                                @if($m->timeline_perkuliahan == 1)
                                Perkuliahan
                                @elseif($m->timeline_perkuliahan == 2)
                                Ujian Tengah Semester
                                @else
                                Ujian Akhir Semester
                                @endif
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Jumlah Mahasiswa :', ['class' => 'awesome'])}}
                        {{Form::number('jumlah','',['class' => 'form-control', 'id' => 'jumlah', 'placeholder' => 'Jumlah Mahasiswa Hadir ...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Pembahasan / Materi :', ['class' => 'awesome'])}}
                        {{Form::text('materi','',['class' => 'form-control', 'id' => 'materi'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Pertemuan :', ['class' => 'awesome'])}}
                        {{Form::text('pertemuan','',['class' => 'form-control', 'id' => 'pertemuan'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Tanggal :', ['class' => 'awesome'])}}
                        {{Form::date('tanggal','',['class' => 'form-control', 'id' => 'tanggal'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Jam Mulai :', ['class' => 'awesome'])}}
                        {{Form::time('jam_mulai','',['class' => 'form-control', 'id' => 'jam_mulai'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Jam Selesai :', ['class' => 'awesome'])}}
                        {{Form::time('jam_selesai','',['class' => 'form-control', 'id' => 'jam_selesai'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Bukti :', ['class' => 'awesome'])}}
                        <input type="file" class="form-control" name="bukti" id="bukti">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-secondary" value="Save">
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
$(document).ready( function () {

    $(document).on('click', '#add', function() {
        $('#modal').modal('show');  
        $('#form').attr('action', '{{ url('dosen/kelas-perkuliahan/monitoring/create') }}');     
    });

    $('#simpan').submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
            data: formData,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success :function () {
                alert(data.success);
                $('#modal').modal('hide');
                location.reload();
            },
        });
    });
});
</script>
@endsection