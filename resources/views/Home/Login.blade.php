@extends('layouts.app')

@section('contents')
<div class="register-wrapper">
    <div class="register-card">
        <div class="register-image">
            <img src="{{ asset('assets/img/masyarakat.png') }}" alt="Logo Layanan Aduan" />
        </div>
        <div class="register-form">
            <h1 class="login-title">Login</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group password-container">
                    <input id="password" type="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility()">👁️</span>
                </div>
                <div class="form-group">
                    <select name="role" required>
                        <option value="" disabled selected>Choose Role</option>
                        <option value="admin">Admin</option>
                        <option value="superadmin">Superadmin</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
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

    .login-title {
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
    .register-form input[type="password"],
    .register-form select {
        width: 100%;
        padding: 12px 14px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #f9f9f9;
        outline: none;
        transition: 0.3s;
    }

    .register-form input:focus,
    .register-form select:focus {
        border-color: #0072ff;
        box-shadow: 0 0 8px rgba(0, 114, 255, 0.2);
    }

    .password-container {
        position: relative;
    }

    .password-container input {
        padding-right: 45px; /* Tambahkan ruang untuk ikon mata */
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 14px;
        transform: translateY(-50%);
        font-size: 20px;
        cursor: pointer;
        color: #888;
    }

    .toggle-password:hover {
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
    function togglePasswordVisibility() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.querySelector(".toggle-password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.textContent = "🙈"; // Ubah ikon saat password terlihat
        } else {
            passwordField.type = "password";
            toggleIcon.textContent = "👁️"; // Ubah ikon saat password tersembunyi
        }
    }
</script>
@endsection
