@extends('layouts.frontend.main')

@section('content')

<div class="container my-5">
    <!-- Profile Header -->
    <div class="row">
        <div class="col-12 text-center mb-4">
            <img src="{{ asset('assets/img/avatars/1.png') }}" class="rounded-circle mb-3" alt="Profile Picture" width="150" height="150">
            <h2>Lorem Ipsum Dolor</h2>
            <p class="text-muted">Consectetur adipiscing elit</p>
            <div class="d-flex justify-content-center gap-2">
                <a href="#" class="btn btn-primary">Edit Profile</a>
                <a href="#" class="btn btn-outline-secondary">Settings</a>
            </div>
        </div>
    </div>

    <!-- Profile Info -->
    <div class="row mb-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Personal Information</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class='bx bx-envelope me-2'></i> lorem.ipsum@dolor.sit</li>
                        <li class="mb-2"><i class='bx bx-phone me-2'></i> +1 234 567 890</li>
                        <li class="mb-2"><i class='bx bx-map me-2'></i> Lorem ipsum dolor sit amet</li>
                        <li class="mb-2"><i class='bx bx-calendar me-2'></i> Joined January 2024</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-8 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">About Me</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    
                    <h6 class="mt-4">Skills</h6>
                    <div class="mb-3">
                        <span class="badge bg-primary me-2">Lorem</span>
                        <span class="badge bg-primary me-2">Ipsum</span>
                        <span class="badge bg-primary me-2">Dolor</span>
                        <span class="badge bg-primary me-2">Sit</span>
                        <span class="badge bg-primary">Amet</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row mb-5">
        <div class="col-md-3 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">150+</h3>
                    <p class="card-text text-muted">Lorem Ipsum</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">45+</h3>
                    <p class="card-text text-muted">Dolor Sit</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">4.8</h3>
                    <p class="card-text text-muted">Amet Rating</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">25K+</h3>
                    <p class="card-text text-muted">Consectetur</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card mb-5">
        <div class="card-body">
            <h5 class="card-title mb-4">Recent Activity</h5>
            <div class="timeline">
                @for ($i = 0; $i < 4; $i++)
                <div class="timeline-item pb-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <i class='bx bx-circle text-primary'></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1">Lorem ipsum dolor sit amet</h6>
                            <p class="text-muted mb-0">Consectetur adipiscing elit, sed do eiusmod tempor</p>
                            <small class="text-muted">2 hours ago</small>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>

@endsection