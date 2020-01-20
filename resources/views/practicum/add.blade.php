@extends('layouts.app')

@section('title', 'Tambah Praktikum')
@section('content')
    <form action="{{ route('practicums.store') }}" method="POST">
        @csrf
        <input type="hidden" name="laboratory_id" value="{{ \Illuminate\Support\Facades\Auth::user()->laboratory_id }}">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Laboratorium</label>
            <div class="col-sm-4">
                <input type="text" class="form-control @error('laboratory_id') is-invalid @enderror"
                       name="laboratory_name"
                       id="laboratory_name" value="{{ $laboratory->name }}" readonly>
                @error('laboratory_id')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Praktikum</label>
            <div class="col-sm-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                       id="name" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-4">
                <input type="text" class="form-control @error('year') is-invalid @enderror" name="year"
                       id="year" value="{{ old('year') }}">
                @error('year')
                <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
                                    <th width="100">Nama Modul</th>
                                    <th width="100">Link Modul</th>
                                    <th width="100">Link Video</th>
                                    <th width="100">Tanggal Publish Nilai</th>
                                    <th width="30">Hapus</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(is_array(old('modules')))
                                    @foreach(old('modules') as $i => $module)
                                        <tr>
                                            <td>
                                                <input type="text"
                                                       class="form-control @error('modules.'.$i.'.name') is-invalid @enderror input"
                                                       name="modules[{{$i}}][name]"
                                                       value="{{ old('modules.'.$i.'.name') }}">
                                                @error('modules.'.$i.'.name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text"
                                                       class="form-control @error('modules.'.$i.'.module_link') is-invalid @enderror input"
                                                       name="modules[{{$i}}][module_link]"
                                                       value="{{ old('modules.'.$i.'.module_link') }}">
                                                @error('modules.'.$i.'.module_link')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text"
                                                       class="form-control @error('modules.'.$i.'.video_link') is-invalid @enderror input"
                                                       name="modules[{{$i}}][video_link]"
                                                       value="{{ old('modules.'.$i.'.video_link') }}">
                                                @error('modules.'.$i.'.video_link')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <div class="col-sm-12 text-center p-0">
                                                    <input type="text"
                                                           class="form-control datetimepicker-input @error('modules.'.$i.'.grade_publish_date') is-invalid @enderror"
                                                           id="datetimepicker{{$i+1}}" data-toggle="datetimepicker"
                                                           data-target="#datetimepicker{{$i+1}}"
                                                           value="{{ old('modules.'.$i.'.grade_publish_date') }}"
                                                           name="modules[{{$i}}][grade_publish_date]"/>
                                                    @error('modules.'.$i.'.grade_publish_date')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-danger delete-size" type="button"
                                                        style="height: 40px; width: 40px" onclick="delete_row($(this))">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>
                                            <input type="text"
                                                   class="form-control input"
                                                   name="modules[0][name]">
                                        </td>
                                        <td>
                                            <input type="text"
                                                   class="form-control input"
                                                   name="modules[0][module_link]">
                                        </td>
                                        <td>
                                            <input type="text"
                                                   class="form-control input"
                                                   name="modules[0][video_link]">
                                        </td>
                                        <td>
                                            <div class="col-sm-12 text-center p-0">
                                                <input type="text"
                                                       class="form-control datetimepicker-input"
                                                       id="datetimepicker1" data-toggle="datetimepicker"
                                                       name="modules[0][grade_publish_date]"
                                                       data-target="#datetimepicker1"/>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger delete-size" type="button"
                                                    style="height: 40px; width: 40px" onclick="delete_row($(this))">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                                <tr class="add-module">
                                    <td class="text-left">
                                        <a href="javascript:void(0);" class="add-row" onclick="add_module()">+
                                            Tambah</a>
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
                        <div class="table-responsive" style="overflow: visible !important;">
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
                                @if(is_array(old('assessments')))
                                    @foreach(old('assessments') as $i => $assessment)
                                        <tr>
                                            <td>
                                                <input type="text"
                                                       class="form-control @error('assessments.'.$i.'.name') is-invalid @enderror input"
                                                       name="assessments[{{$i}}][name]"
                                                       value="{{ old('assessments.'.$i.'.name') }}">
                                                @error('assessments.'.$i.'.name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text"
                                                       class="form-control @error('assessments.'.$i.'.percentage') is-invalid @enderror input"
                                                       name="assessments[{{$i}}][percentage]"
                                                       value="{{ old('assessments.'.$i.'.percentage') }}">
                                                @error('assessments.'.$i.'.percentage')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text"
                                                       class="form-control @error('assessments.'.$i.'.duration') is-invalid @enderror input"
                                                       name="assessments[{{$i}}][duration]"
                                                       value="{{ old('assessments.'.$i.'.duration') }}">
                                                @error('assessments.'.$i.'.duration')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text"
                                                       class="form-control @error('assessments.'.$i.'.question_count') is-invalid @enderror input"
                                                       name="assessments[{{$i}}][question_count]"
                                                       value="{{ old('assessments.'.$i.'.question_count') }}">
                                                @error('assessments.'.$i.'.question_count')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select
                                                    class="form-control @error('assessments.'.$i.'.answer_type') is-invalid @enderror"
                                                    name="assessments[{{$i}}][answer_type]">
                                                    <option></option>
                                                    @foreach($answer_types as $answer_type)
                                                        <option
                                                            {{ (old('assessments.'.$i.'.answer_type') == $answer_type->code) ? 'selected' : '' }}
                                                            value="{{ $answer_type->code }}">{{ $answer_type->description }}</option>
                                                    @endforeach
                                                </select>
                                                @error('assessments.'.$i.'.answer_type')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck{{$i+1}}" value="OPTYS"
                                                           name="assessments[{{$i}}][isOnline]" {{ (old('assessments.'.$i.'.isOnline') == 'OPTYS') ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                           for="customCheck{{$i+1}}">Ya</label>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-danger delete-size" type="button"
                                                        style="height: 40px; width: 40px" onclick="delete_row($(this))">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control input" name="assessments[0][name]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input"
                                                   name="assessments[0][percentage]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input"
                                                   name="assessments[0][duration]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input"
                                                   name="assessments[0][question_count]">
                                        </td>
                                        <td>
                                            <select
                                                class="form-control" name="assessments[0][answer_type]">
                                                <option></option>
                                                @foreach($answer_types as $answer_type)
                                                    <option
                                                        value="{{ $answer_type->code }}">{{ $answer_type->description }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="OPTYS"
                                                       id="customCheck1" name="assessments[0][isOnline]" checked>
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
                                @endif
                                <tr class="add-assessment">
                                    <td class="text-left">
                                        <a href="javascript:void(0);" class="add-row" onclick="add_assessment()">+
                                            Tambah</a>
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
                <button type="submit" class="btn btn-primary" onclick="checkEmptyRow()">Simpan</button>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script type="text/javascript">
        let dateTimePickerOption = {
            format: 'YYYY-MM-DD HH:mm:ss',
        };

        $(function () {
            $('input[id*="datetimepicker"]').datetimepicker(dateTimePickerOption);

            @if(is_array(old('modules')))
            $('#module-table tbody tr').not('.add-module').each(function () {
                let $this = $(this).find('input.datetimepicker-input');
                $this.datetimepicker('date', $this.val());
            });
            @endif
        });

        function add_module() {
            $(function () {
                let i = $('#module-table tbody tr').not('.add-module').length;
                let newRow =
                    '<tr>' +
                    '   <td>' +
                    '       <input type="text" class="form-control input" name="modules[' + i + '][name]">' +
                    '   </td>' +
                    '   <td>' +
                    '       <input type="text" class="form-control input" name="modules[' + i + '][module_link]">' +
                    '   </td>' +
                    '   <td>' +
                    '       <input type="text" class="form-control input" name="modules[' + i + '][video_link]">' +
                    '   </td>' +
                    '   <td>' +
                    '       <div class="col-sm-12 text-center p-0">' +
                    '           <input type="text" class="form-control datetimepicker-input"' +
                    '                  data-toggle="datetimepicker" name="modules[' + i + '][grade_publish_date]"' +
                    '                  id="datetimepicker' + (i + 1) + '" data-target="#datetimepicker' + (i + 1) + '"/>' +
                    '       </div>' +
                    '   </td>' +
                    '   <td>' +
                    '       <button class="btn btn-sm btn-danger delete-size" type="button"' +
                    '               style="height: 40px; width: 40px" onclick="delete_row($(this))">' +
                    '           <i class="far fa-trash-alt"></i>' +
                    '       </button>' +
                    '   </td>' +
                    '</tr>';

                $(newRow).insertBefore('tr.add-module');
                $('#datetimepicker' + (i + 1)).datetimepicker(dateTimePickerOption);
            });
        }

        function delete_row($this) {
            let moduleLength = $this.closest('tbody').find('tr').not('.add-module').length;
            let assessmentLength = $this.closest('tbody').find('tr').not('.add-assessment').length;

            if ($this.closest('table').attr('id') === 'module-table') {
                if (moduleLength === 1) {
                    return false;
                }
            }

            if ($this.closest('table').attr('id') === 'assessment-table') {
                if (assessmentLength === 1) {
                    return false;
                }
            }

            $this.closest('tr').remove();
        }

        function add_assessment() {
            let i = $('#assessment-table tbody tr').not('.add-assessment').length;

            let newRow =
                '<tr>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="assessments[' + i + '][name]"' +
                '   </td>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="assessments[' + i + '][percentage]"' +
                '   </td>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="assessments[' + i + '][duration]"' +
                '   </td>' +
                '   <td>' +
                '       <input type="text" class="form-control input" name="assessments[' + i + '][question_count]"' +
                '   </td>' +
                '   <td>' +
                '       <select class="form-control" name="assessments[' + i + '][answer_type]"' +
                '           <option></option>' +
                '           @foreach($answer_types as $answer_type)' +
                '               <option' +
                '                   value="{{ $answer_type->code }}">{{ $answer_type->description }}</option>' +
                '           @endforeach' +
                '       </select>' +
                '   </td>' +
                '   <td>' +
                '       <div class="custom-control custom-checkbox">' +
                '           <input type="checkbox" class="custom-control-input" id="customCheck' + (i + 1) + '"' +
                '                  name="assessments[' + i + '][isOnline]" checked>' +
                '           <label class="custom-control-label" for="customCheck' + (i + 1) + '">Ya</label>' +
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

        function checkEmptyRow() {
            let moduleTable = $('#module-table tbody tr').not('.add-module');
            let assessmentTable = $('#assessment-table tbody tr').not('.add-assessment');

            moduleTable.each(function (i) {
                if (i !== 0) {
                    let module_name = $(this).find('input[name="modules[' + i + '][name]"]').val();
                    let module_link = $(this).find('input[name="modules[' + i + '][module_link]"]').val();
                    let module_video_link = $(this).find('input[name="modules[' + i + '][video_link]"]').val();
                    let module_grade_publish_date = $(this).find('input[name="modules[' + i + '][grade_publish_date]"]').val();
                    if ((module_name == null || module_name === '') &&
                        (module_link == null || module_link === '') &&
                        (module_video_link == null || module_video_link === '') &&
                        (module_grade_publish_date == null || module_grade_publish_date === '')) {
                        $(this).remove();
                    }
                }
            });

            assessmentTable.each(function (i) {
                if (i !== 0) {
                    let assessment_name = $(this).find('input[name="assessments[' + i + '][name]"]').val();
                    let assessment_percentage = $(this).find('input[name="assessments[' + i + '][percentage]"]').val();
                    let assessment_duration = $(this).find('input[name="assessments[' + i + '][duration]"]').val();
                    let assessment_question_count = $(this).find('input[name="assessments[' + i + '][question_count]"]').val();
                    let assessment_answer_type = $(this).find('input[name="assessments[' + i + '][answer_type]"]').val();
                    if ((assessment_name == null || assessment_name === '') &&
                        (assessment_percentage == null || assessment_percentage === '') &&
                        (assessment_duration == null || assessment_duration === '') &&
                        (assessment_question_count == null || assessment_question_count === '') &&
                        (assessment_answer_type == null || assessment_answer_type === '')) {
                        $(this).remove();
                    }
                }
            });

            return false;
        }
    </script>
@endpush
