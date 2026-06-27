@extends('layouts.app')
@section('title','Home')
@section('content')
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <!-- Foto Profil -->
            <div class="mb-4">
                <img src="{{ asset('images/myself.jpg') }}" 
                     alt="Foto Nada Adzani Ramadhanu" 
                     class="rounded-circle img-fluid object-fit-cover" 
                     style="width: 200px; height: 200px; object-fit: cover; border: 4px solid #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            </div>
            <h1 class="display-4 mb-3">Halo, saya Nada Adzani Ramadhanu</h1>
            
            <p class="lead mb-3">Saya adalah seorang programmer dengan pengalaman di bidang web development</p>
            
            <hr class="my-4" style="width: 50%; margin: auto;">
            
            <p class="mt-3">Selamat Datang di halaman home</p>
        </div>
    </div>
</div>
    <div class="row mt-5 text-center">
        <div class="col-md-4 ml-8">
            <div class="card">
                <h5 class="card-title">Pengalaman</h5>
                <p class="card-text">3 tahun pengalaman</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-title">Bahasa yang dikuasai</h5>
                <p class="card-text">10+ bahasa</p>
            </div>
        </div>
        <div class="col-md-4 mr-8">
            <div class="card">
                <h5 class="card-title">Klien</h5>
                <p class="card-text">100+ klien</p>
            </div>
        </div>
    </div>
@endsection