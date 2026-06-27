@extends('layouts.app')
@section('title','Projects Detail')
@section('content')
<style>
    .card-img-top{
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        object-position: center;
    }
</style>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-8 max-auto">
            <div class="card shadow-sm">
                <img class="card-img-top" src="{{ asset('images/' . $project->image) }}" alt="">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $project->title }}</h5>
                    <div class="mb-4">
                        <h5 class="text-center">Deskripsi Project</h5>
                        <p class="card-text text-center">{{ $project->description }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-center">Teknologi yang digunakan</h5>
                            <p class="text-center">{{ $project->teknologi }}</p>
                        </div>
                        <div class="col-md-6 justify-content-center">
                            <h5 class="text-center">Status Project</h5>
                            <p class="text-center">{{ $project->status }}</p>
                        </div>
                    </div>
                    <a href="{{ route('projects') }}" class="btn btn-primary w-100">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection