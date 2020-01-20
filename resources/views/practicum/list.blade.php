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
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center">{{$practicum->name}}</td>
                <td class="text-center">{{$practicum->year}}</td>
                <td class="text-center">{{$practicum->status->description}}</td>
                <td class="text-center">
                    <button class="btn btn-outline-primary">Detail</button>
                </td>
                <td class="text-center">
                    <form action="{{ route('practicums.edit', $practicum) }}" method="GET">
                        <button class="btn btn-primary" type="submit">Ubah</button>
                    </form>
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
