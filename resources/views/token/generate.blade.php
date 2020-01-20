@extends('layouts.app')

@section('title', 'Tambah Nilai')
@section('content')
    <div class="token-container">
        <h1 class="token">{{ $token }}</h1>
        <hr>
        <h2>Availabe Until</h2>
        <h4 id="timer">10:00</h4>
        <a href="{{ url('token') }}" class="btn btn-primary btn-token">Refresh</a>
    </div>
@endsection
@push('scripts')
    <script>
        var countDownDate = new Date('{{$expired_at}}').getTime();
        var x = setInterval(function () {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED"
            }
        }, 1000);
    </script>
@endpush
