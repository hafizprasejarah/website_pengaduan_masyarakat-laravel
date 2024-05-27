@extends('layout/layout2')

@section('body')
    <div class="wrapper">
        <div class="sub-wrapper">
            <div class="back-from-single">
                <a href="/administrasi/data-masyarakat"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="container edit">

                <form action="/administrasi/data-masyarakat/{{ $users->id }}" method="POST" class="form edit">
                    <h3 class="title login">edit</h3>
                    @method('put')
                    @csrf
                    <div class="register-column">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="box-input-edit @error('name') invalid @enderror"
                            id="name" placeholder="Name" required value="{{ old('name', $users->name) }}"
                            autocomplete="off">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="register-column">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="box-input-edit @error('username') invalid @enderror"
                            placeholder="Username" required value="{{ old('username', $users->username) }}"
                            autocomplete="off" id="username">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="register-column">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="box-input-edit @error('email') invalid @enderror"
                            placeholder="Email" id="email" required value="{{ old('email', $users->email) }}"
                            autocomplete="off" id="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="register-column">
                        <label for="role">Role</label>
                        <select name="role" id="role">
                            <option value="user" @if (old('role', $users->role) === 'user') selected @endif>user</option>
                            <option value="petugas" @if (old('role', $users->role) === 'petugas') selected @endif>petugas</option>
                            <option value="admin" @if (old('role', $users->role) === 'admin') selected @endif>admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn login">edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
