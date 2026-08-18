@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Admin Dashboard</h2>
            <p class="text-muted mb-0">
                ยินดีต้อนรับ, {{ auth()->user()->name }}
            </p>
        </div>
        <span class="badge bg-danger fs-6">
            Administrator
        </span>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        👥 Users
                    </h5>
                    <p class="card-text">
                        จัดการข้อมูลผู้ใช้งานระบบ
                    </p>
                    <a href="#" class="btn btn-primary">
                        Manage Users
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        📝 Posts
                    </h5>
                    <p class="card-text">
                        จัดการบทความและโพสต์ทั้งหมด
                    </p>
                    <a href="{{ route('index') }}" class="btn btn-success">
                        Manage Posts
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        👤 Profile
                    </h5>
                    <p class="card-text">
                        ข้อมูลผู้ดูแลระบบ
                    </p>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        My Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-header">
            <h5 class="mb-0">System Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <strong>Name</strong>
                    <p>{{ auth()->user()->name }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Email</strong>
                    <p>{{ auth()->user()->email }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Role</strong>
                    <p>
                        <span class="badge bg-danger">
                            Admin
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-end mt-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection