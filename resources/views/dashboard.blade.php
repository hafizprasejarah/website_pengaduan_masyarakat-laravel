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

            @if (session('success'))
                <div class="message success">
                    <span>{{ session('success') }}</span>
                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>
            @endif
            <div class="container dashboard">
                <form action="/daftarlaporan" method="POST" class="form dashboard" enctype="multipart/form-data">
                    @csrf
                    <h3 class="main-title dashboard">Layanan Keluhan Dan Pengaduan Online Masyarakat SMKN 5 SKA</h3>
                    <div class="laporan khusus">
                        <div class="grup">
                            <label for="nama">Nama anda</label>
                            <input type="text" class="input-laporan nama @error('nama') invalid @enderror"
                                placeholder="Atas Nama" required id="nama" maxlength="50" autocomplete="off"
                                name="nama">
                            <input type="hidden" id="slug" name="slug" id="slug">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="grup">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="input-laporan tentang @error('perihal') invalid @enderror"
                                placeholder="Perihal" required id="perihal" autocomplete="off" name="perihal">

                            @error('perihal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="laporan">
                        <label for="bukti">Tambahkan Bukti Foto</label>
                        <input type="file" class="input-laporan foto @error('bukti') invalid @enderror" id="bukti"
                            name="bukti" multiple>
                        @error('bukti')
                            <div class="invalid-feedback">{{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="laporan">
                        <label for="lapor">Sampaikan Laporan Anda</label>
                        <textarea name="lapor" type="text" class="input-laporan lapor @error('lapor') invalid @enderror"
                            placeholder="Laporan" required id="lapor" autocomplete="off"></textarea>

                        @error('lapor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="laporan">
                <label >Sampaikan Laporan Anda</label>
                <input id="lapor" type="hidden" name="lapor">
                <trix-editor style="font-size: 1.8rem; color:#444; border:2px solid #44444449; border-radius: 1rem;" input="lapor"></trix-editor>

                @error('lapor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

                    <div class="laporan">
                        <label for="alamat">Alamat Anda</label>
                        <textarea type="text" name="alamat" class="input-laporan alamat @error('alamat') invalid @enderror"
                            placeholder="Alamat" required id="alamat" autocomplete="off"></textarea>

                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <button class="btn submit" type="submit">submit</button>
                </form>

            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector('#nama');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/checkSlug?nama=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endsection
