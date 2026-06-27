@extends('layouts.app')
@section('title','Contact')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card-body">
                <h5 class="card-title">Contact Information</h5>
                <p class="card-text">You can reach us at:</p>
                <ul class="list-unstyled">
                    <li>Email: adzaninada@gmail.com</li>
                    <li>Phone: +62 812 3456 7890</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Hubungi saya</div>
                    <form action="">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea type="text" class="form-control" placeholder="Enter your message"></textarea>
                            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection