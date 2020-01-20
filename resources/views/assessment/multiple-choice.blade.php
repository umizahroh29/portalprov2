@extends('layouts.app')

@section('title', 'Multiple Choice')
@section('content')
    <div class="tesawal-container">
        <div class="col-xl-6 col-xs-12 soal-tesawal">
            <iframe src="https://kegunung.com" frameborder="0"></iframe>
        </div>
        <div class="col-xl-6 col-xs-12 jawaban-tesawal">
            <form action="">
                <ul class="nav justify-content-end">
                    <li class="nav-item time">
                        <span>20:20:10</span>
                    </li>
                    <li class="nav-item">
                        <select class="form-control" id="sel1">
                            <option>Kode Asisten</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </li>
                    <li class="nav-item">
                        <select class="form-control" id="sel1">
                            <option>Pilih Modul</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </li>
                </ul>
                <table class="table">
                    <tr>
                        <td class="number">
                        <td>
                            <input type="radio" name="optradio" disabled>
                        </td>
                        </td>
                        <td>
                            <input type="radio" name="optradio">
                        </td>
                        <td>
                            <input type="radio" name="optradio">
                        </td>
                        <td>
                            <input type="radio" name="optradio">
                        </td>
                        <td>
                            <input type="radio" name="optradio">
                        </td>
                        <td>
                            <input type="radio" name="optradio">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
