@extends('layout')
@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Welcome to the Dashboard</h1>
            <h3 class="mt-3">
                Hi, {{ auth()->user()->name }}
            </h3>
            <p class="lead">คุณได้เข้าสู่ระบบเรียบร้อยแล้ว</p>
        </div>
    </div>

</div>
@endsection