@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('main')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Matakuliah Page</h1>
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
                                    <th>Prodi</th>
                                    <th>Matakuliah</th>
                                    <th>Kategori</th>
                                    <th>Kuota</th>
                                    <th>Jumlah Sks</th>
                                    <th>Semester</th>
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
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Matakuliah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('method' => 'POST', 'id' => 'form'))}}
                    {{ csrf_field() }}
                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Prodi Matakuliah :', ['class' => 'awesome'])}}
                        <select name="prodi" id="prodi" class="form-control">
                            @foreach($data as $r)
                                <option value="{{$r->id}}">{{$r->nama_prodi}} | {{$r->nama_fakultas}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Matakuliah :', ['class' => 'awesome'])}}
                        {{Form::text('matakuliah','',['class' => 'form-control', 'id' => 'matakuliah', 'placeholder' => 'Nama Matakuliah ...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Kategori Matakuliah :', ['class' => 'awesome'])}}
                        {{Form::text('kategori','',['class' => 'form-control', 'id' => 'kategori', 'placeholder' => 'Kategori Matakuliah...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Kuota Matakuliah :', ['class' => 'awesome'])}}
                        {{Form::number('kuota','',['class' => 'form-control', 'id' => 'kuota', 'placeholder' => 'Kuota Total ...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Sks Matakuliah :', ['class' => 'awesome'])}}
                        {{Form::number('sks','',['class' => 'form-control', 'id' => 'sks', 'placeholder' => 'Sks Matakuliah...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Semester Matakuliah :', ['class' => 'awesome'])}}
                        {{Form::number('semester','',['class' => 'form-control', 'id' => 'semester', 'placeholder' => 'Semester Matakuliah...'])}}
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
            language: {
                "emptyTable": "Tidak Ada Data Tersimpan"
            },
            ajax: "{{ url('/jurusan/matakuliah/data') }}",
                "columns": [
                    {
                        "data": "id",
                        class: "text-center",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { "data": "prodi.nama_prodi"},
                    { "data": "nama_matakuliah"},
                    { "data": "kategori_matakuliah"},
                    { 
                        "data": "kuota",
                        sClass: 'text-center',
                        render: function(data){
                            return '<span>'+data+' orang</span>';
                        },
                    },
                    { 
                        "data": "sks",
                        sClass: 'text-center',
                        render: function(data){
                            return '<span>'+data+' Sks</span>';
                        },
                    },
                    { 
                        "data": "semester",
                        sClass: 'text-center',
                        render: function(data){
                            return '<span> Semester '+data+'</span>';
                        },
                    },
                    {
                        data: 'id',
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
        $('#modal1').modal('show');  
        $('#matakuliah').val("");
        $('#kategori').val("");
        $('#kuota').val("");
        $('#sks').val("");
        $('#semester').val("");
        $('#form').attr('action', '{{ url('dosen/matakuliah/create') }}');     
    });

    $(document).on('click', '#edit', function() {
        $('#modal1').modal('show');
        var id = $(this).data('id');
        $.ajax({   
            type: "get",
            url: "{{ url('/jurusan/matakuliah/edit') }}/"+id,
            dataType: "json",
            success: function(data) {
                console.log(data[0].id);
                event.preventDefault();
                var matakuliah=data[0].nama_matakuliah
                var kategori=data[0].kategori_matakuliah
                var kuota=data[0].kuota
                var sks=data[0].sks
                var semester=data[0].semester

                $('#matakuliah').val(matakuliah).change();
                $('#kategori').val(kategori).change();
                $('#kuota').val(kuota).change();
                $('#sks').val(sks).change();
                $('#semester').val(semester).change();
                $('#form').attr('action', '{{ url('jurusan/matakuliah/update') }}/'+id);
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
                    url : "{{ url('jurusan/matakuliah/delete') }}/"+id,
                    success :function () {
                        location.reload();
                    }
                })
            }
    });

    });
</script>
@endsection