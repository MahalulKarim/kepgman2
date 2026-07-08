<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sistem Kepegawaian MAN 2 Wonosobo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="{{ asset('asset/admin/sidebars.css') }}" rel="stylesheet">
  </head>
  <body>
   
    <style>
      .nav-item .active{
        background-color: #0eb538!important;
        color: #ffffff!important;
      }
      .form_border {
          border: none !important;
          border-bottom: 1px solid #ced4da !important;
          border-radius: 0 !important;
          background-color: transparent !important; /* Biar menyatu dengan background */
          padding-left: 0 !important; /* Merapatkan teks ke kiri agar sejajar label */
          padding-right: 0 !important;
          transition: border-color 0.2s ease-in-out; /* Efek transisi halus saat diklik */
      }

      /* Menghilangkan shadow biru Bootstrap dan mengganti warna garis bawah saat di-klik (Focus) */
      .form_border:focus {
          outline: none !important;
          box-shadow: none !important;
          border-bottom: 2px solid #0d6efd !important; /* Mengubah garis menjadi lebih tebal & berwarna biru Bootstrap */
      }
      .preview-container {
          width: 100px;
          height: 100px;
          overflow: hidden;
          border: 2px dashed #ced4da;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top: 10px;
          background-color: #f8f9fa;
      }
      .preview-container img {
          width: 100%;
          height: 100%;
          object-fit: cover;
      }
      </style>

<main>

 

  <div class="d-flex flex-column flex-shrink-0 p-3 d-flex h-100 bg-success" style="width: 18%;height: 100vh!important;position: fixed;">
    <a href="/" class="text-center d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    </a>
    <a href="{{ route('kepsek.dashboard') }}" class="text-center text-decoration-none text-white">
      <h1 style="font-size: 65px;">
        <i class="bi bi-person-circle"></i>
      </h1>
      <h4>Dashboard</h4>
    </a>
    <ul class="nav nav-pills flex-column mb-auto">
      {{-- <li class="nav-item text-center">
        <a href="{{ route('kepsek.dashboard') }}" class="nav-link text-white {{($title=='Dashboard')? 'active':''}}" aria-current="page">
          Dashboard
        </a>
      </li> --}}
      <li class="nav-item text-center">
        <a href="{{ route('kepsek.kegiatan.index') }}" class="nav-link text-white {{($title=='Kegiatan')? 'active':''}}" aria-current="page">
          Data Kegiatan Harian Pegawai
        </a>
      </li> 
       <li class="nav-item text-center">
        <a href="{{ route('kepsek.laporan.index') }}" class="nav-link text-white {{($title=='Laporan')? 'active':''}}" aria-current="page">
          Data Laporan
        </a>
      </li>

      {{-- <li class="nav-item text-center">
        <a href="{{ route('admin.pegawai.index') }}" class="nav-link text-white {{($title=='Pegawai')? 'active':''}}" aria-current="page">
          Data Pegawai
        </a>
      </li> --}}
      {{-- <li class="nav-item text-center">
        <a href="{{ route('admin.jabatan.index') }}" class="nav-link text-white {{($title=='Jabatan')? 'active':''}}" aria-current="page">
          Data Jabatan
        </a>
      </li>
      <li class="nav-item text-center">
        <a href="{{ route('admin.pendidikan.index') }}" class="nav-link text-white {{($title=='Riwayat Pendidikan')? 'active':''}}" aria-current="page">
          Data Riwayat Pendidikan / Pelatihan
        </a>
      </li>
      <li class="nav-item text-center">
        <a href="{{ route('admin.pensiun.index') }}" class="nav-link text-white {{($title=='Pensiun')? 'active':''}}" aria-current="page">
          Data Pensiun
        </a>
      </li>
      <li class="nav-item text-center">
        <a href="{{ route('admin.laporan.index') }}" class="nav-link text-white {{($title=='Laporan')? 'active':''}}" aria-current="page">
          Data Laporan
        </a>
      </li>
       --}}
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('asset/logo.png') }}" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Kepsek</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
       <li>
          <a class="dropdown-menu-item dropdown-item text-danger d-flex align-items-center" 
            href="#" 
            data-bs-toggle="modal" 
            data-bs-target="#logoutConfirmationModal">
              <i class="bi bi-box-arrow-left me-2"></i> Log Out
          </a>
        </li>
      </ul>

      <form id="logout-form-dropdown" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </div>
  </div>

  
      <div class="modal fade" id="logoutConfirmationModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm"> <div class="modal-content border-0 shadow">
            <div class="modal-body text-center p-4">
                {{-- <div class="text-danger mb-3">
                    <i class="bi bi-exclamation-circle-fill fs-1"></i>
                </div> --}}
                {{-- <h5 class="modal-title fw-bold mb-2" id="logoutModalLabel">Konfirmasi Log Out</h5> --}}
                <p class="text-muted small mb-4">Apakah Anda yakin ingin logout?</p>
                
                <div class="d-flex gap-2 justify-content-center">
                  <button type="button" class="btn btn-success w-50 fw-semibold small" 
                          onclick="event.preventDefault(); document.getElementById('logout-form-dropdown').submit();">
                      Ya
                  </button>
                    <button type="button" class="btn btn-primary w-50 fw-semibold small" data-bs-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
</div>

  </div>
   <div class="bg-light" style="padding-left: 17%;min-height: 100vh!important;width: 100%;overflow-x: scroll;">
    <div class="container px-4">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> Gagal menyimpan data. Periksa kembali inputan Anda.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    </div>
    @yield('content')

  </div>
</main>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="{{ asset('asset/admin/sidebars.js') }}"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

    