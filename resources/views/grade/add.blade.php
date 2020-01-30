@extends('layouts.app')

@section('title', 'Tambah Nilai')
@section('content')
<div id="myBtnContainer" class="modul">
    <button class="btn btn-light modul-btn active" id="" onclick="filterSelection('')">All</button>
    @foreach($modules as $m)
    <button class="btn btn-light modul-btn active" id="" onclick="filterSelection('{{$m->name}}')">Modul - {{$m->name}}</button>
    @endforeach
</div>

<form action="{{ url('/submit-nilai') }}" method="POST">
    @csrf

    <!-- <input type="hidden" name="praktikum" id="praktikum"> -->
    <div class="inputtable-container">
        <table class="input-table">
            <thead class="bg-primary">
                <tr>
                    <th scope="col" style="text-align: center">NIM</th>
                    <th scope="col" style="text-align: center">NAMA</th>
                    <th scope="col" style="text-align: center">KELAS</th>
                    <th scope="col" style="text-align: center">Modul</th>

                    @foreach($grades as $grade=>$keys)
                    @foreach($keys as $key)
                    <th scope="col" style="text-align: center" class="input">{{$key->tipe}}</th>

                    @endforeach
                    @break
                    @endforeach
                    <th scope="col" style="text-align: center" class="input">NILAI AKHIR</th>
                </tr>
            </thead>
            <tbody id="myTable">

                @foreach($grades as $grade => $keys)
                @php
                $Classes = $keys[$loop->iteration]->Modul;

                @endphp
                <tr class="filterDiv {{$Classes}}" style="text-align: center;">
                    <td>
                        <!-- <input type="hidden" name="nim[]" value="{{$keys[$loop->iteration]->user_nim}}"> -->
                        {{$keys[$loop->iteration]->user_nim}}</td>

                    <td>{{$keys[$loop->iteration]->Nama}}</td>
                    <td>{{$keys[$loop->iteration]->class}}</td>
                    <td>{{$keys[$loop->iteration]->Modul}}</td>

                    @php
                    $nilai_akhir = 0;
                    @endphp

                    @foreach($keys as $key)

                    @php
                    $nilai_akhir += number_format($key->grade*($key->percentage/100),2);
                    @endphp

                    @if($key->answer_type == "ANSMC")

                    <td>

                        <input type="hidden" name="nim[]" value="{{$key->user_nim}}">
                        <input type="hidden" name="id_nilai[]" value="{{$key->id}}">
                        <input type="text" class="form-control form-nilai" name="nilai[]" id="{{$key->tipe}}_{{$key->user_nim}}" value="{{$key->grade}}" style="text-align: center" readonly>

                    </td>
                    @elseif($key->assistant_code != Auth::user()->assistant_code)

                    <td>


                        <input type="hidden" name="nim[]" value="{{$key->user_nim}}">
                        <input type="hidden" name="id_nilai[]" value="{{$key->id}}">
                        <input type="text" class="form-control form-nilai" name="nilai[]" id="{{$key->tipe}}_{{$key->user_nim}}" value="{{$key->grade}}" style="text-align: center" readonly>
                    </td>
                    @else

                    <td>

                        <input type="hidden" name="nim[]" value="{{$key->user_nim}}">
                        <input type="hidden" name="id_nilai[]" value="{{$key->id}}">
                        <input type="text" class="form-control form-nilai" name="nilai[]" id="{{$key->tipe}}_{{$key->user_nim}}" value="{{$key->grade}}" style="text-align: center">
                    </td>

                    @endif

                    @endforeach
                    <td><input type="text" class="form-control form-nilai" name="nilai_akhir[]" id="nilai_akhir_{{$key->user_nim}}" value="{{$nilai_akhir}}" style="text-align: center" readonly></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary btn-save">
        Save
    </button>
</form>
<script>
    function filterSelection(params) {
        // Declare variable
        var input, filter, table, tr, td, i, txtValue;
        input = params;
        filter = input;
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");




        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

    }
</script>
@endsection