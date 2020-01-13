@extends('layouts.app')

@section('title', 'Tambah Praktikum')
@section('content')
    <form action="{{ route('practicums.store') }}" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Praktikum</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="year" id="year">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <span class="card-header">Modul</span>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="simple-table" id="module-table">
                                <thead>
                                <tr>
                                    <th width="200">Nama Modul</th>
                                    <th width="100">Link Modul</th>
                                    <th width="100">Link Video</th>
                                    <th width="100">Tanggal Publish Nilai</th>
                                    <th width="30">Hapus</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control input" name="module_name[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input" name="module_link[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input" name="module_video_link[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input" name="module_publish_date[]">
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger delete-size" type="button"
                                                style="height: 40px; width: 40px" onclick="delete_row($(this))">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="add-module">
                                    <td class="text-left">
                                        <a href="javascript:void(0);" class="add-row" onclick="add_module()">+ Tambah</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            <small>* Urutan modul sesuai dengan urutan pada tabel</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="card">
                    <span class="card-header">Komponen Penilaian</span>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="simple-table" id="assessment-table">
                                <thead>
                                <tr>
                                    <th width="100">Nama Penilaian</th>
                                    <th width="70">Bobot Penilaian (%)</th>
                                    <th width="70">Durasi Penilaian (Menit)</th>
                                    <th width="70">Jumlah Soal</th>
                                    <th width="100">Jenis Jawaban</th>
                                    <th width="50">Penilaian Online</th>
                                    <th width="30">Hapus</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control input" name="assessment_name[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input" name="assessment_pct[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input" name="assessment_duration[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input" name="assessment_question[]">
                                    </td>
                                    <td>
                                        <select class="form-control" name="assessment_answer_type[]">
                                            <option></option>
                                            @foreach($answer_types as $answer_type)
                                                <option
                                                    value="{{ $answer_type->code }}">{{ $answer_type->description }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                   name="assessment_isonline" checked>
                                            <label class="custom-control-label" for="customCheck1">Ya</label>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger delete-size" type="button"
                                                style="height: 40px; width: 40px" onclick="delete_row($(this))">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="add-assessment">
                                    <td class="text-left">
                                        <a href="javascript:void(0);" class="add-row" onclick="add_assessment()">+ Tambah</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center m-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script type="text/javascript">
        function add_module() {
            let newRow =
                '<tr>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="module_name[]">' +
                '   </td>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="module_link[]">' +
                '   </td>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="module_video_link[]">' +
                '   </td>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="module_publish_date[]">' +
                '   </td>' +
                '   <td>' +
                '       <button class="btn btn-sm btn-danger delete-size" type="button"' +
                '               style="height: 40px; width: 40px" onclick="delete_row($(this))">' +
                '           <i class="far fa-trash-alt"></i>' +
                '       </button>' +
                '   </td>' +
                '</tr>';

            $(newRow).insertBefore('tr.add-module');
        }

        function delete_row($this) {
            $this.closest('tr').remove();
        }

        function add_assessment() {
            let newRow =
                '<tr>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="assessment_name[]">' +
                '   </td>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="assessment_pct[]">' +
                '   </td>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="assessment_duration[]">' +
                '   </td>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="assessment_question[]">' +
                '   </td>' +
                '   <td>' +
                '       <select class="form-control" name="assessment_answer_type[]">' +
                '           <option></option>' +
                '           @foreach($answer_types as $answer_type)' +
                '               <option' +
                '                   value="{{ $answer_type->code }}">{{ $answer_type->description }}</option>' +
                '           @endforeach' +
                '       </select>' +
                '   </td>' +
                '   <td>' +
                '       <div class="custom-control custom-checkbox">' +
                '           <input type="checkbox" class="custom-control-input" id="customCheck1"' +
                '                  name="assessment_isonline" checked>' +
                '           <label class="custom-control-label" for="customCheck1">Ya</label>' +
                '       </div>' +
                '   </td>' +
                '   <td>' +
                '       <button class="btn btn-sm btn-danger delete-size" type="button"' +
                '               style="height: 40px; width: 40px" onclick="delete_row($(this))">' +
                '           <i class="far fa-trash-alt"></i>' +
                '       </button>' +
                '   </td>' +
                '</tr>';

            $(newRow).insertBefore('tr.add-assessment');
        }
    </script>
@endpush
