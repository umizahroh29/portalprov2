@extends('layouts.app')

@section('title', 'Tambah Nilai')
@section('content')
    <div class="studentprofile-search">
        <form action="" class="search">
            <input type="text" class="form-control search-input" placeholder="search">
        </form>
    </div>
    <div class="inputtable-container">
        <table class="input-table">
            <thead class="bg-primary">
            <tr>
                <th scope="col">NIM</th>
                <th scope="col">NAMA</th>
                <th scope="col">KELAS</th>
                <th scope="col" class="sp_center">Modules</th>
                <th scope="col" class="sp_center">Avg. Grade</th>
                <th scope="col" class="sp_center">Reset Pass</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i = 0; $i < 4; $i++) {  ?>
            <tr>
                <td>1202176969</td>
                <td>Muhammad Young Lex</td>
                <td>SI-42-05</td>
                <td class="sp_center">
                    8
                </td>
                <td class="sp_center">
                    00.0
                </td>
                <td class="sp_center">
                    <a href="#" class="btn btn-danger">Reset</a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
@endsection
