@extends('admin.layouts.app')

@push('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb" class="d-flex align-items-center justify-content-between mb-5">
            <ol class="breadcrumb breadcrumb-style1 m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Members</li>
            </ol>
            <div class="breadcrumb-item">
                <span id="liveClock" class="text-muted" style="font-size: 0.9rem;"></span>
            </div>
        </nav>

    <div class="card postion-relative">
        <!-- Loader Overlay -->
        <div class="loader-overlay d-none">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only"></span>
            </div> <b>Loading...</b>
        </div>
        <div class="card-header">
            <form action="{{route('admin.members.index')}}" method="POST" id="frmSearch">
                @csrf
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex items-center">
                        {!! page_size_dropdown() !!}
                        <div class="col-md-3">
                            <input class="form-control border-radius-5" type="text" name="name" placeholder="Search..." style="min-width: 150px;">
                        </div>
                    </div>
                    <div class="">
                        <a href="{{route('admin.members.create')}}" class="btn btn-sm btn-primary"><i class="bx bx-plus"></i> Create</a>
                        <button type="submit" class="btn btn-sm btn-dark text-white"><i class="bx bx-sync"></i> Reload</button>
                            <button type="button" class="btn btn-sm btn-danger" disabled="" id="deleteMultiple">
                                <i class="bx bx-trash"></i> Delete
                              </button>
                    </div>
                </div>
            </form>
        </div>
        <form action="{{route('admin.members.delete')}}" id="frmList" method="POST">
            @csrf
            <div id="ajax_content">
                @include('admin.members._list')
            </div>
        </form>
    </div>
</div>
@endpush
