@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="banner">
        <h3>Praktikum Lebih Mudah dengan Portal Pro</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, neque non ipsa quis labore
            commodi beatae ipsam ducimus placeat iure distinctio quibusdam, ullam velit, eius itaque
            recusandae earum vel provident.</p>
    </div>
    <div class="jadwal">
        <h3>Jadwal Mengajar Asisten Daspro</h3>
        <table class="table">
            <thead class="bg-primary">
            <tr>
                <th scope="col">Hari</th>
                <th scope="col">Shift</th>
                <th scope="col">Lab</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i = 0; $i < 4; $i++) {  ?>
            <tr>
                <td>Senin</td>
                <td>14.00 - 21.00</td>
                <td>Kanteq</td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="deadline-modul">
        <div class="header">
            <h3>MODUL 1</h3>
        </div>
        <div class="body">
            <img src="asset/images/alarm.png" alt="" height="80px" width="80px">
            <div class="detail">
                <h3>Deadline Input Nilai</h3>
                <div class="hari">
                    <h3>6</h3>
                    <h3>Hari</h3>
                </div>
                <div class="jam">
                    <h3>6</h3>
                    <h3>Jam</h3>
                </div>
                <div class="menit">
                    <h3>6</h3>
                    <h3>Menit</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
