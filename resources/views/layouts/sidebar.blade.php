<div class="d-flex" id="wrapper">
    <div class="bg-light" id="sidebar-wrapper">

        @if (Auth::user()->role === 'ROLAS')

            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/home.png')}}"
                        alt="" height="20" width="20">Beranda</a>
                @if (Request::is('inputnilai'))
                    <a href="{{ url('/inputnilai') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/input nilai active.png')}}" alt="" height="20" width="20">Input
                        Nilai</a>"
                @else
                    <a href="{{ url('/inputnilai') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/input nilai.png')}}" alt="" height="20" width="20">Input Nilai</a>"
                @endif
                @if (Request::is('token'))
                    <a href="{{ url('/token') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/generate token active.png')}}" alt="" height="20" width="20">Generate"
                        Token
                        Absen</a>
                @else
                    <a href="{{ url('/token') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/generate token.png')}}" alt="" height="20" width="20">Generate Token"
                        Absen</a>
                @endif
                @if (Request::is('verifikasiabsen'))
                    <a href="{{ url('/verifikasiabsen') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/tp active.png')}}" alt="" height="20" width="20">Verifikasi Absen</a>
                @else
                    <a href="{{ url('/verifikasiabsen') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/tp.png')}}" alt="" height="20" width="20">Verifikasi Absen</a>
                @endif
                @if (Request::is('download-tp'))
                    <a href="{{ url('/download-tp') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/daftar praktikum active.png')}}" alt="" height="20" width="20">Tugas"
                        Pendahuluan</a>
                @else
                    <a href="{{ url('/download-tp') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/daftar praktikum.png')}}" alt="" height="20" width="20">Tugas
                        Pendahuluan</a>"
                @endif
                @if (Request::is('input-nilai-tp'))
                    <a href="{{ url('/input-nilai-tp') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/test awal active.png')}}" alt="" height="20" width="20">Input Nilai"
                        TP</a>
                @else
                    <a href="{{ url('/input-nilai-tp') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/test awal.png')}}" alt="" height="20" width="20">Input Nilai TP</a>"
                @endif
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/generate token.png')}}" alt="" height="20" width="20">Generate Token Tes</a>"
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/student profil.png')}}" alt="" height="20" width="20">Student Profile</a>"
            </div>

        @elseif (Auth::user()->role === 'ROLPR')

            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/home.png')}}"
                        alt="" height="20" width="20">Beranda</a>
                @if (Request::is('dashboardpraktikan'))
                    <a href="{{ url('/dashboardpraktikan') }}"
                       class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/input nilai active.png')}}" alt="" height="20" width="20">Absen</a>"
                @else
                    <a href="{{ url('/dashboardpraktikan') }}"
                       class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/input nilai.png')}}"
                            alt="" height="20" width="20">Absen</a>
                @endif
                @if (Request::is('input-tp'))
                    <a href="{{ url('/input-tp') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/tp active.png')}}" alt="" height="20" width="20">Tugas Pendahuluan</a>"
                @else
                    <a href="{{ url('/input-tp') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/tp.png')}}" alt="" height="20" width="20">Tugas Pendahuluan</a>"
                @endif
                @if (Request::is('jurnal'))
                    <a href="{{ url('/jurnal') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/jurnal active.png')}}" alt="" height="20" width="20">Jurnal</a>"
                @else
                    <a href="{{ url('/jurnal') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/jurnal.png')}}" alt="" height="20" width="20">Jurnal</a>"
                @endif
                @if (Request::is('nilai'))
                    <a href="{{ url('/nilai') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/nilai active.png')}}" alt="" height="20" width="20">Nilai</a>"
                @else
                    <a href="{{ url('/nilai') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/nilai.png')}}" alt="" height="20" width="20">Nilai</a>"
                @endif
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/test awal.png')}}" alt="" height="20" width="20">Tes Awal</a>"
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/takhir.png')}}"
                        alt="" height="20" width="20">Tes
                    Akhir</a>
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/nilai.png')}}"
                        alt="" height="20" width="20">Nilai</a>
            </div>
        @else
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/home.png')}}"
                        alt="" height="20" width="20">Beranda</a>
                @if (Request::is('inputnilai'))
                    <a href="{{ url('/inputnilai') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/input nilai active.png')}}" alt="" height="20" width="20">Input
                        Nilai</a>"
                @else
                    <a href="{{ url('/inputnilai') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/input nilai.png')}}" alt="" height="20" width="20">Input Nilai</a>
                @endif
                @if (Request::is('token'))
                    <a href="{{ url('/token') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/generate token active.png')}}" alt="" height="20" width="20">Generate
                        Token
                        Absen</a>
                @else
                    <a href="{{ url('/token') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/generate token.png')}}" alt="" height="20" width="20">Generate Token
                        Absen</a>
                @endif
                @if (Request::is('verifikasiabsen'))
                    <a href="{{ url('/verifikasiabsen') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/tp active.png')}}" alt="" height="20" width="20">Verifikasi Absen</a>
                @else
                    <a href="{{ url('/verifikasiabsen') }}" class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/tp.png')}}" alt="" height="20" width="20">Verifikasi Absen</a>
                @endif
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/generate token.png')}}" alt="" height="20" width="20">Generate Token Tes</a>
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/student profil.png')}}" alt="" height="20" width="20">Student Profile</a>
            </div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/home.png')}}"
                        alt="" height="20" width="20">Beranda</a>
                @if (Request::is('dashboardpraktikan'))
                    <a href="{{ url('/dashboardpraktikan') }}"
                       class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/input nilai active.png')}}" alt="" height="20" width="20">Absen</a>
                @else
                    <a href="{{ url('/dashboardpraktikan') }}"
                       class="list-group-item list-group-item-action bg-light"><img
                            src="{{asset('images/input nilai.png')}}"
                            alt="" height="20" width="20">Absen</a>
                @endif
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/test awal.png')}}" alt="" height="20" width="20">Tes Awal</a>
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/jurnal.png')}}"
                        alt="" height="20" width="20">Jurnal</a>
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/tp.png')}}"
                        alt="" height="20" width="20">Tugas
                    Pendahuluan</a>
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/takhir.png')}}"
                        alt="" height="20" width="20">Tes
                    Akhir</a>
                <a href="#" class="list-group-item list-group-item-action bg-light"><img
                        src="{{asset('images/nilai.png')}}"
                        alt="" height="20" width="20">Nilai</a>
            </div>

        @endif
    </div>
</div>
