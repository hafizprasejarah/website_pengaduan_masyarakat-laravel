@extends('layout/layout2')

@section('body')

    <div class="wrapper table">
        <div class="sub-wrapper">
            <div class="sidebar">
                @include('/layout/sidebar');
            </div>

            <h4 class="main-title daftar">Data Masyarakat</h4>
            <div class="search-user">
                <form action="/administrasi/data-masyarakat">
                    <input class="input-user" name="search" type="search" id="" placeholder="Search here....">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            @if (session('success'))
                <div class="message success">
                    <span>{{ session('success') }}</span>
                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>
            @endif
            <div class="container table">

                <table>
                    <thead>
                        <tr>
                            <th>
                                <p>Aksi</p>
                            </th>
                            <th>
                                <p>Nama</p>
                            </th>
                            <th>
                                <p>Username</p>
                            </th>
                            <th>
                                <p>role</p>
                            </th>
                            <th>
                                <p>Email</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="action-btn">
                                            <a href="/administrasi/data-masyarakat/{{ $user->id }}/edit"><button
                                                    class="btn-table edit">E</button></a>
                                            <form action="/administrasi/data-masyarakat/{{ $user->id }}/delete"
                                                method="POST">
                                                @csrf
                                                <button type="submit" onclick="return confirm('are you sure')"
                                                    class="btn-table delete">H</button>
                                            </form>
                                        </div>

                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        @else
                            <p>tidak ada</p>
                        @endif


                    </tbody>
                </table>
            </div>
            <div class="row justify-content-center">
                <div class="pagination-container">
                    <ul class="pagination">
                        @if ($users->onFirstPage())
                            <li class="page-item disabled"><span>&laquo; Previous</span></li>
                        @else
                            <li class="page-item"><a href="{{ $users->previousPageUrl() }}" class="page-link">&laquo;
                                    Previous</a></li>
                        @endif

                        @foreach ($users as $lapor)
                            <li class="page-item {{ $users->currentPage() == $loop->index + 1 ? 'active' : '' }}">
                                <a href="{{ $users->url($loop->index + 1) }}" class="page-link">{{ $loop->index + 1 }}</a>
                            </li>
                        @endforeach

                        @if ($users->hasMorePages())
                            <li class="page-item"><a href="{{ $users->nextPageUrl() }}" class="page-link">Next &raquo;</a>
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
