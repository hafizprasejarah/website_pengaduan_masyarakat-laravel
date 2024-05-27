@extends('layout/layout2')

@section('body')
    <div class="wrapper dashboard">
        <div class="sub-wrapper">

            <div class="user-change">
                <a href="/dashboard">
                    <h2>Dashboard</h2>
                </a>
                <a href="/daftarlaporan">
                    <h2>Daftar Laporan</h2>
                </a>
            </div>

            <h4 class="main-title daftar">Daftar Laporan Anda</h4>
            @if (session('success'))
                <div class="message success">
                    <span>{{ session('success') }}</span>
                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>
            @endif
            <div class="container daftar">
                @foreach ($lapors as $lapor)
                    <div class="card-daftar @if ($lapor->validasi == 1) validate @endif">

                        @if ($lapor->bukti)
                            <div class="group pict">
                                <p class="title-daftar">bukti</p>
                                <div class="img-container">
                                    <img src="{{ asset('storage/' . $lapor->bukti) }}" alt="" draggable="false">
                                </div>
                                <h4>{{ $lapor->created_at->setTimezone('Asia/Jakarta')->format('M d, Y - H.i') }}</h4>
                            </div>
                        @else
                            <div class="group pict">
                                <p class="title-daftar">bukti</p>
                                <div class="img-container">
                                    <img src="" alt="" draggable="false">
                                </div>
                                <h4>{{ $lapor->created_at->setTimezone('Asia/Jakarta')->format('M d, Y - H.i') }}</h4>
                            </div>
                        @endif

                        <div class="group keterangan">
                            <p class="title-daftar">Keterangan</p>
                            <textarea type="text" readonly class="input-laporan hasil" placeholder="Laporan" required autocomplete="off">
                            {{ $lapor->lapor }}
                    </textarea>
                        </div>
                        <div class="group alamat">
                            <p class="title-daftar">Alamat</p>
                            <textarea type="text" readonly class="input-laporan hasil alamat" placeholder="Laporan" required autocomplete="off">
                            {{ $lapor->alamat }}
                    </textarea>
                        </div>

                        <div class="group">
                            <div class="status @if ($lapor->validasi == 1) validate @endif"></div>
                            <a href="/daftarlaporan/{{ $lapor->slug }}"><button class="btn-single"><i
                                        class="fa-solid fa-chevron-right"></i></button></a>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="pagination-container">
                    <ul class="pagination">
                        @if ($lapors->onFirstPage())
                            <li class="page-item disabled"><span>&laquo; Previous</span></li>
                        @else
                            <li class="page-item"><a href="{{ $lapors->previousPageUrl() }}" class="page-link">&laquo;
                                    Previous</a></li>
                        @endif

                        @foreach ($lapors as $lapor)
                            <li class="page-item {{ $lapors->currentPage() == $loop->index + 1 ? 'active' : '' }}">
                                <a href="{{ $lapors->url($loop->index + 1) }}"
                                    class="page-link">{{ $loop->index + 1 }}</a>
                            </li>
                        @endforeach

                        @if ($lapors->hasMorePages())
                            <li class="page-item"><a href="{{ $lapors->nextPageUrl() }}" class="page-link">Next &raquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled"><span>Next &raquo;</span></li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
