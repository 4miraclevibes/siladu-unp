@extends('layouts.frontend.main')

@section('content')

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h5 class="display-5">Lorem ipsum dolor sit amet <a href="#" class="text-decoration-underline">consectetur</a> adipiscing elit.</h5>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        </div>
        <div class="col-md-6 text-center p-0">
            <img src="{{ asset('frontend/assets/images/banner-kanan.png') }}" class="img-fluid" alt="Banner Image">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 bg-dark text-white p-5">
            <h2>Lorem ipsum dolor sit amet</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
        </div>
        <div class="col-md-6 bg-light p-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center">
            <img src="{{ asset('frontend/assets/images/mask-group.png') }}" class="img-fluid" alt="Mask Group Image">
        </div>
        <div class="col-md-6">
            <h2>Lorem ipsum dolor sit amet consectetur</h2>
            <div class="mt-4">
                <h5><i class='bx bx-group'></i> Lorem Ipsum Dolor</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
            </div>
            <div class="mt-4">
                <h5><i class='bx bx-group'></i> Consectetur Adipiscing</h5>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
            </div>
            <div class="mt-4">
                <h5><i class='bx bx-book'></i> Sed Do Eiusmod</h5>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="mb-4">Lorem ipsum dolor sit</h2>
    <div class="row">
        @for ($i = 0; $i < 8; $i++)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Lorem ipsum dolor</h5>
                    <p class="card-text"><i class='bx bxs-star'></i> 4.8/5</p>
                    <p class="card-text">Consectetur adipiscing</p>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>

<div class="container my-5">
    <div class="row align-items-center bg-dark">
        <div class="col-md-8 text-white p-5">
            <h2 class="display-5">Lorem ipsum dolor <br>sit amet consectetur</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class='bx bx-check'></i> Lorem ipsum dolor sit</li>
                <li class="mb-2"><i class='bx bx-check'></i> Consectetur adipiscing</li>
                <li class="mb-2"><i class='bx bx-check'></i> Sed do eiusmod tempor</li>
            </ul>
            <a href="#" class="btn btn-light">Lorem ipsum</a>
        </div>
        <div class="col-md-4 text-center p-0">
            <img src="{{ asset('frontend/assets/images/people.jpg') }}" class="img-fluid" alt="People Image">
        </div>
    </div>
</div>

<div class="container my-5 text-center">
    <div class="row">
        <div class="col-md-4">
            <h3>560+</h3>
            <p>Lorem ipsum dolor</p>
        </div>
        <div class="col-md-4">
            <h3>120+</h3>
            <p>Consectetur adipiscing</p>
        </div>
        <div class="col-md-4">
            <h3>360K+</h3>
            <p>Sed do eiusmod</p>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-4 text-center">
            <img src="{{ asset('frontend/assets/images/costumer.svg') }}" class="img-fluid" alt="Customer Image">
        </div>
        <div class="col-md-8">
            <h5 class="text-primary">Lorem Ipsum</h5>
            <h2>Dolor sit amet consectetur</h2>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."</p>
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/img/avatars/1.png') }}" class="rounded-circle me-3" alt="Customer Avatar" width="50" height="50">
                <div>
                    <h5 class="mb-0">Lorem Ipsum</h5>
                    <p class="mb-0">Dolor sit</p>
                    <div class="text-warning">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection