@extends('layouts.app')

@section('title', 'Tambah Nilai')
@section('content')
    <div class="modul">
        @foreach($modul as $data)
            <a class="btn btn-light modul-btn @if ($data->id == 1) active @endif" id="{{$data->id}}"
               data-praktikum="{{$data->id_praktikum}}">Modul {{$data->id}}</a>
        @endforeach
    </div>

    <form action="{{ route('submit-nilai') }}" method="POST">
        @csrf
        <input type="hidden" name="modul" id="modul">
        <input type="hidden" name="praktikum" id="praktikum">
        <div class="inputtable-container">
            <table class="input-table">
                <thead class="bg-primary">
                <tr>
                    <th scope="col" style="text-align: center">NIM</th>
                    <th scope="col" style="text-align: center">NAMA</th>
                    <th scope="col" style="text-align: center">KELAS</th>
                    <th scope="col" style="text-align: center" class="input">TES AWAL</th>
                    <th scope="col" style="text-align: center" class="input">JURNAL</th>
                    <th scope="col" style="text-align: center" class="input">AUDIT</th>
                    <th scope="col" style="text-align: center" class="input">NILAI AKHIR</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nilai_1 as $data)
                    <tr>
                        <td align="center"><input type="hidden" name="nim[]" value="{{ $data->nim }}">{{ $data->nim }}
                        </td>
                        <td align="center">{{ $data->nama }}</td>
                        <td align="center">{{ $data->kelas }}</td>
                        <td align="center">
                            <input type="text" class="form-control form-nilai" name="tp[]" id="tp_{{$data->nim}}"
                                   value="{{ $data->nilai_tp }}" style="text-align: center" readonly>
                        </td>
                        <td align="center">
                            <input type="text" class="form-control form-nilai" name="jurnal[]"
                                   id="jurnal_{{$data->nim}}" value="{{ $data->nilai_jurnal }}"
                                   onchange="getGrade('{{$data->nim}}')" style="text-align: center">
                        </td>
                        <td align="center">
                            <input type="text" class="form-control form-nilai" name="audit[]" id="audit_{{$data->nim}}"
                                   value="{{ $data->nilai_audit }}" onchange="getGrade('{{$data->nim}}')"
                                   style="text-align: center">
                        </td>
                        <td align="center">
                            <input type="text" class="form-control form-nilai" name="nilai_akhir[]"
                                   id="nilai_akhir_{{$data->nim}}" value="{{ $data->nilai_akhir}}"
                                   style="text-align: center" readonly>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary btn-save">
            Save
        </button>
    </form>
@endsection
