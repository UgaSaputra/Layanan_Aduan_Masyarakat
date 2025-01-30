@extends('layouts.app')

@section('contents')
<div class="register-wrapper">
    <div class="register-card">
        <div class="register-image">
            <img src="{{ asset('assets/img/masyarakat.png') }}" alt="Logo Layanan Aduan" />
        </div>
        <div class="register-form">
            <h1 class="register-title">Register</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group password-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span id="eye-icon" onclick="togglePassword()">👁️</span>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Daftar</button>
                </div>
            </form>
            <div class="login-link">
                <p>Sudah punya akun? <a href="/login">Login</a></p>
            </div>
            <div class="social-login">
                <button type="button" class="google-login">
                    Login dengan Google
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Menggunakan font Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background: #f7f9fc;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .register-wrapper {
        width: 100%;
        max-width: 900px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .register-card {
        display: flex;
        flex-direction: row;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 100%;
        max-width: 700px;
    }

    .register-image {
        flex: 1;
        background: linear-gradient(120deg, #0072ff, #00c6ff);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register-image img {
        max-width: 80%;
        height: auto;
    }

    .register-form {
        flex: 1;
        padding: 40px 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .register-title {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 30px;
        color: #333;
        text-align: center;
        text-transform: uppercase;
    }

    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    .register-form input[type="text"],
    .register-form input[type="email"],
    .register-form input[type="password"] {
        width: 100%;
        padding: 12px 14px;
        padding-right: 45px; /* Ruang untuk ikon mata */
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #f9f9f9;
        outline: none;
        transition: 0.3s;
    }

    .register-form input:focus {
        border-color: #0072ff;
        box-shadow: 0 0 8px rgba(0, 114, 255, 0.2);
    }

    .password-group #eye-icon {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: #888;
        cursor: pointer;
    }

    .password-group #eye-icon:hover {
        color: #0072ff;
    }

    .register-form button {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        background: #0072ff;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    .register-form button:hover {
        background: #005bb5;
    }

    .login-link {
        margin-top: 15px;
        text-align: center;
    }

    .login-link a {
        color: #0072ff;
        text-decoration: none;
    }

    .login-link a:hover {
        text-decoration: underline;
    }

    .social-login button {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        background: #db4437;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    .social-login button:hover {
        background: #c1351d;
    }

    /* Responsif */
    @media (max-width: 768px) {
        .register-card {
            flex-direction: column;
        }

        .register-image {
            display: none;
        }

        .register-form {
            padding: 20px;
        }
    }
</style>

<script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const icon = document.getElementById("eye-icon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.textContent = "🙈";
        } else {
            passwordField.type = "password";
            icon.textContent = "👁️";
        }
    }
</script>
@endsection
