<!-- ==========================================
    tampilan Login
    ============================================-->

<div class="container login">
    <form action="/login" method="POST" class="form login">
        @csrf
        <h3 class="title login">Login</h3>
        <div class="login-column">
           
            <input type="email" name="email" class="box-input @error('email') invalid @enderror" placeholder="Email"
                id="login-email" autofocus required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="login-column">
            
            <input type="password" name="password" class="box-input" placeholder="Password" id="login=password" required>
        </div>
        <button type="submit" class="btn login">LOGIN</button>
    </form>
</div>


<!-- ==========================================
    tampilan Login
    ============================================-->
