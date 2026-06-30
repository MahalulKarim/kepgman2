<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Link — MAN 2 Krasak</title>
    
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            min-height: 100vh;
        }
        /* Sisi Kiri: Gambar Latar Belakang Penuh */
        .login-bg {
            background-image: url('https://lh3.googleusercontent.com/gps-cs-s/APNQkAHPKJO2f5odvigPINMuDVgIVhsskcxsKvGzisBzKw-cGRkNa1lfaRI99I4QeETKFqqhAtXXpfFSjM3r5CH-zKAZK81RpBKI7BYalJra2WOopA4J5GM-wQ9k-u1RGO4hZsry2nvo=s1360-w1360-h1020-rw'); /* Ganti dengan path gambar lokal sekolahmu nanti */
            background-size: cover;
            background-position: center;
            position: relative;
        }
        /* Overlay gradasi hijau/gelap di atas gambar agar estetis */
        .login-bg::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(25, 135, 84, 0.8), rgba(33, 37, 41, 0.8));
        }
        .login-brand-text {
            position: relative;
            z-index: 2;
        }
        /* Sisi Kanan: Form input */
        .form-border-bottom {
            border: none !important;
            border: 2px solid #198754 !important;
            border-radius: 10px !important;
            /* padding-left: 35px !important; */
        }
        .form-border-bottom:focus {
            box-shadow: none !important;
            border: 2px solid #198754 !important;
        }
        .input-group-custom {
            position: relative;
        }
        .input-group-custom i {
            position: absolute;
            bottom: 8px;
            left: 5px;
            color: #6c757d;
            z-index: 4;
        }
    </style>
</head>
<body>

<div class="container-fluid px-0">
    <div class="row g-0 login-container">
        
        <div class="col-md-6 col-lg-7 d-none d-md-flex align-items-center justify-content-center login-bg text-white p-5">
            <div class="login-brand-text text-center text-lg-start max-w-md">
                <h1 class="display-4 fw-bold mb-3 text-center">SISTEM KEPEGAWAIAN MAN 2 WONOSOBO</h1>
                {{-- <p class="lead opacity-75">Sistem Informasi Manajemen Sekolah Terpadu Madrasah Aliyah Negeri 2 Kliwonan.</p> --}}
                
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-5 d-flex align-items-center justify-content-center bg-white p-4 p-sm-5">
            <div class="w-100" style="max-width: 400px;">
                
                <div class="text-center mb-5">
                    <img src="{{ asset('asset/logo.png') }}" alt="" srcset="" width="130px">
                    {{-- <div class="text-success mb-2">
                        <i class="bi bi-mortarboard-fill" style="font-size: 3rem;"></i>
                    </div> --}}
                    {{-- <h3 class="fw-bold text-dark mb-1">Selamat Datang</h3>
                    <p class="text-muted small">Silakan masuk menggunakan akun administrasi Anda</p> --}}
                </div>

               <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                             <div class="mb-4 input-group-custom">
                                <label for="email" class="form-label small fw-bold text-secondary">Email</label>
                                <input id="email" type="email" class="form-control form-border-bottom @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email@domain.com">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                            {{-- <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                        </div>

                        <div class="row mb-0">
                             <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-success py-2.5 fw-bold shadow-sm rounded">
                                    Kirim Link
                                </button>
                            </div>
                            {{-- <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div> --}}
                        </div>
                    </form>

            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
