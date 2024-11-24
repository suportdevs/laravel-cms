@extends('admin.layouts.app')
@push('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a>Appearance</a>
            </li>
            <li class="breadcrumb-item active">Themes</li>
            </ol>
        </nav>
    <div class="row">
        <div class="col-md-5">
            <div class="card postion-relative">
                <!-- Loader Overlay -->
                <div class="loader-overlay d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only"></span>
                    </div> <b>Loading...</b>
                </div>
                <div class="card-header overflow-hidden p-2">
                    <img src="{{asset('assets/img/theme/theme-bg-1.png')}}" width="100%" height="250px" alt="">
                </div>
                <div class="card-body">
                    <h5 class="my-3">Prospiq</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, doloribus.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <b>Author: <a href="{{route('home')}}">Prospiq Thechologies</a></b> <span>Version: <b>1.0.1</b></span>
                    </div>
                </div>
                <div class="card-footer bg-light p-5">
                    <button class="btn btn-primary" disabled><i class="bx bx-check"></i> Activated</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush
