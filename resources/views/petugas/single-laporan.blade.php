@extends('layout/layout2')

@section('body')
    <div class="wrapper single">
        <div class="sub-wrapper">
            <div class="back-from-single">
                <a href="../daftarlaporan"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="container table">
                <div class="card-lapor">
                    <h1>LAPORAN PENGADUAN MASYARAKAT</h1>

                    <div class="content">
                        <h4>Nama</h4>
                        <p><span>: </span>{{ $lapor->nama }} </p>
                    </div>
                    <div class="content">
                        <h4>Perihal</h4>
                        <p><span>: </span>{{ $lapor->perihal }} </p>
                    </div>
                    <div class="content">
                        <h4>Tanggal</h4>
                        <p><span>: </span>{{ $lapor->created_at->setTimezone('Asia/Jakarta')->format('m-d-Y H:i') }}</p>
                    </div>
                    <div class="content">
                        <h4>Alamat</h4>
                        <p><span>: </span>{{ $lapor->alamat }}</p>
                    </div>
                    <div class="content lapor">
                        <h4>Keterangan</h4>
                        <p><span>:</span> {{ $lapor->lapor }}</p>
                    </div>
                    @if ($lapor->bukti)
                        <div class="content foto">
                            <h4>Bukti</h4>
                            <div class="group-bukti">
                                <div class="bukti-wrapper">
                                    <img src="{{ asset('storage/' . $lapor->bukti) }}" alt="" draggable="false">
                                </div>
                            </div>
                        </div>
                    @endif


                </div>

                <div class="container dua">
                    <div class="validation">

                        <form action="method">
                            <label for="check">validate</label>
                            <input type="checkbox" @if ($lapor->validasi == 1) checked @endif class="custom-checkbox"
                                name="validasi" id="check">
                        </form>
                    </div>

                    <div class="content-comment">
                        <form method="POST" class="comment" action="/petugas/daftarlaporan/{{ $lapor->slug }}">
                            @csrf
                            <textarea name="message" rows="4" placeholder="Your Message" required></textarea>
                            <button type="submit" class="btn print">Submit</button>
                        </form>
                        @if (count($lapor->comments) > 0)
                            @foreach ($lapor->comments()->latest()->paginate(4) as $comment)
                                <div class="content-comments">
                                    <div class="account-comment">
                                        <h4 class="name"> {{ $comment->user->role }} <br> {{ $comment->user->username}}</h4>
                                        <div class="fa-regular fa-circle-user" id="profile"></div>
                                    </div>
                                    <div class="comment-field">
                                        <p>{{ $comment->message }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>leave comment here</p>
                        @endif

                    </div>

                    <div class="row justify-content-center">
                        <div class="pagination-container">
                            @php
                                $lapor_page = $lapor
                                    ->comments()
                                    ->latest()
                                    ->paginate(4);
                            @endphp

                            <ul class="pagination">
                                @if ($lapor_page->onFirstPage())
                                    <li class="page-item disabled"><span>&laquo; Previous</span></li>
                                @else
                                    <li class="page-item"><a href="{{ $lapor_page->previousPageUrl() }}"
                                            class="page-link">&laquo; Previous</a></li>
                                @endif

                                @foreach ($lapor_page->getCollection() as $comment)
                                    <li
                                        class="page-item {{ $lapor_page->currentPage() == $loop->index + 1 ? 'active' : '' }}">
                                        <a href="{{ $lapor_page->url($loop->index + 1) }}"
                                            class="page-link">{{ $loop->index + 1 }}</a>
                                    </li>
                                @endforeach

                                @if ($lapor_page->hasMorePages())
                                    <li class="page-item"><a href="{{ $lapor_page->nextPageUrl() }}" class="page-link">Next
                                            &raquo;</a></li>
                                @else
                                    <li class="page-item disabled"><span>Next &raquo;</span></li>
                                @endif
                            </ul>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            const checkbox = document.getElementById('check');

            checkbox.addEventListener('change', function() {
                const newValue = checkbox.checked ? 1 : 0;

                fetch('/petugas/daftarlaporan/{{ $lapor->slug }}/validasi?newValue=' + newValue)
                    .then(response => response.json())
                    .then(data => {
                        if (data === 1) {
                            checkbox.checked = true; // Mencentang checkbox
                            // console.log(data.result);
                        } else {
                            // console.log(data.result);
                            // checkbox.checked = false; // Menghilangkan centang pada checkbox
                        }
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan:', error);
                    });
            });
        </script>
    @endsection