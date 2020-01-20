@extends('layouts.app')

@section('title', 'Daftar Nilai')
@section('content')
    <div class="inputtable-container">
        <table class="input-table" style="text-align: center;">
            <thead class="bg-primary">
            <tr>
                <th scope="col">MODUL</th>
                <th scope="col">ASSISTANT TP</th>
                <th scope="col">TP (20%)</th>
                <th scope="col">ASSISTANT PRAKTIKUM</th>
                <th scope="col">PRAKTIKUM (60%)</th>
                <th scope="col">AUDIT (20%)</th>
                <th scope="col">NILAI AKHIR</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $hasil)
                <tr>
                    <td>{{ $hasil->id_modul }}</td>
                    <td>{{ $hasil->kode_asisten_tesawal }}</td>
                    <td>{{ $hasil->tes_awal }}</td>
                    <td>{{ $hasil->kode_asisten_praktikum }}</td>
                    <td>{{ $hasil->jurnal }}</td>
                    <td>{{ $hasil->tes_akhir }}</td>
                    <td>{{ $hasil->nilai_akhir }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
