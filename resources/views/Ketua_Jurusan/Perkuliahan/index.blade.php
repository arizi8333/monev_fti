@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('main')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelas Perkuliahan Page</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-secondary">Table Data</h6>
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
                                    <th>Tahun Ajaran</th>
                                    <th>Matakuliah</th>
                                    <th>Dosen Pengampu</th>
                                    <th>Dosen Verifikator</th>
                                    <th>Kurikulum</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:13px;">

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
                    <h5 class="modal-title" id="exampleModalLabel">Form Kategori Penilaian</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('method' => 'POST', 'id' => 'form'))}}
                    {{ csrf_field() }}

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Tahun Ajaran Akademik :', ['class' => 'awesome'])}}
                        {{Form::number('tahun_akademik','',['class' => 'form-control', 'id' => 'tahun_akademik', 'placeholder' => 'Tahun Ajaran Akademik ...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Kurikulum :', ['class' => 'awesome'])}}
                        {{Form::text('kurikulum','',['class' => 'form-control', 'id' => 'kurikulum', 'placeholder' => 'Kurikulum Matakuliah ...'])}}
                    </div>

                    <div class="form-group" id="div_matakuliah">
                        {{Form::label('text', 'Matakuliah :', ['class' => 'awesome'])}}
                        <select name="matakuliah" id="matakuliah" class="form-control">
                            @foreach($matakuliah as $r)
                                <option value="{{$r->id}}">{{$r->nama_matakuliah}} | {{$r->prodi->nama_prodi}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Dosen Pengampu :', ['class' => 'awesome'])}}
                        <select name="dosen_pengampu" id="dosen_pengampu" class="form-control">
                            @foreach($dosen as $r)
                                <option value="{{$r->nip}}">{{$r->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Dosen Verifikator :', ['class' => 'awesome'])}}
                        <select name="dosen_verifikator" id="dosen_verifikator" class="form-control">
                            @foreach($dosen as $r)
                                <option value="{{$r->nip}}">{{$r->nama}}</option>
                            @endforeach
                        </select>
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
        var table = $('#table').DataTable( {
            "pageLength": 50,
            language: {
                "emptyTable": "Tidak Ada Data Tersimpan"
            },
            ajax: "{{ url('/jurusan/kelas-perkuliahan/data') }}",
                "columns": [
                    {
                        "data": "kelas_perkuliahan.id",
                        class: "text-center",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { 
                        data: "kelas_perkuliahan.tahun_akademik",
                        sClass : "text-center",

                    },
                    { 
                        data: "kelas_perkuliahan.matakuliah.nama_matakuliah",
                        sClass : "text-center",
                    },
                    { 
                        data: "kelas_perkuliahan.dosen_pengampu.nama",
                        sClass : "text-center",
                    },
                    { 
                        data: "dosen_verifikator.nama",
                        sClass : "text-center",
                    },
                    { 
                        data: "kelas_perkuliahan.kurikulum",
                        sClass : "text-center",
                    },
                    {
                        data: 'kelas_perkuliahan.id',
                        sClass: 'text-center',
                        render: function(data) {
                            return '<a style="text-decoration:none" href="#" data-id="'+data+'" id="edit" class="text-secondary" title="edit"><i class="fas fa-edit"></i></a> &nbsp;'+
                                '<a style="text-decoration:none" href="#" data-id="'+data+'" id="delete" class="text-secondary" title="hapus"><i class="fas fa-trash"></i> </a>';
                        },
                    }
                ],
            });

    setInterval( function () {
        table.ajax.reload( null, false ); // user paging is not reset on reload
    }, 5000 );

    $(document).on('click', '#add', function() {
        $('#modal').modal('show');  
        $('#div_matakuliah').show();
        $('#tahun_akademik').val("");
        $('#kurikulum').val("");
        $('#form').attr('action', '{{ url('jurusan/kelas-perkuliahan/create') }}');     
    });

    $(document).on('click', '#edit', function() {
        $('#modal').modal('show');
        $('#div_matakuliah').hide();
        var id = $(this).data('id');
        $.ajax({   
            type: "get",
            url: "{{ url('/jurusan/kelas-perkuliahan/edit') }}/"+id,
            dataType: "json",
            success: function(data) {
                console.log(data[0].id);
                event.preventDefault();
                var tahun_akademik=data[0].tahun_akademik
                var kurikulum=data[0].kurikulum

                $('#tahun_akademik').val(tahun_akademik).change();
                $('#kurikulum').val(kurikulum).change();
                $('#form').attr('action', '{{ url('jurusan/kelas-perkuliahan/update') }}/'+id);
            }
        });        
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

    $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Anda Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('jurusan/kelas-perkuliahan/delete') }}/"+id,
                    success :function () {
                        location.reload();
                    }
                })
            }
    });

    });
</script>
@endsection