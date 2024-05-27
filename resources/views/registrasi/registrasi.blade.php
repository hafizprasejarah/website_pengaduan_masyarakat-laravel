<!-- ==========================================
    tampilan registrasi
    ============================================-->


<div class="container registrasi">
    <form action="/" method="POST" class="form login">

        <h3 class="title login">Registrasi</h3>
        @csrf
        <div class="register-column">
            <input type="text" name="name" class="box-input @error('name') invalid @enderror" placeholder="Name" required
            value="{{ old('name') }}" autocomplete="off"  id="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="register-column">
            <input type="text" name="username" class="box-input @error('username') invalid @enderror"
                placeholder="Username" required value="{{ old('username') }}" autocomplete="off" id="username"> 
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="register-column">
            <input type="email" name="email" class="box-input @error('email') invalid @enderror"
                placeholder="Email" required value="{{ old('email') }}" autocomplete="off" id="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="register-column">
            <input type="password" name="password" class="box-input @error('password') invalid @enderror"
                placeholder="Password" required autocomplete="off" id="password"> 
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn login">Registrasi</button>
    </form>
</div>

<!-- ==========================================
    registrasi
    ============================================-->
