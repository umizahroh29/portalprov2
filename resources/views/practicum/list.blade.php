@extends('layouts.app')

@section('title', 'Daftar Praktikum')
@section('create-action', 'practicums/create')
@section('content')
    <table class="input-table">
        <thead class="bg-primary">
        <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Praktikum</th>
            <th scope="col" class="text-center">Tahun</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Lihat Detail</th>
            <th scope="col" class="text-center">Ubah</th>
        </tr>
        </thead>
        <tbody>
        @forelse($practicums as $practicum)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$practicum->name}}</td>
                <td>{{$practicum->year}}</td>
                <td>{{$practicum->status->description}}</td>
                <td>
                    <button>Detail</button>
                </td>
                <td>
                    <button>Ubah</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
