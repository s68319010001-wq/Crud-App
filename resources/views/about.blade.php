@extends('layout')

@section('content')
<!-- โหลด Google Font น่ารักๆ และ Bootstrap Icons -->
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    body {
        background-color: #fff0f5;
        font-family: 'Mitr', sans-serif;
    }
    .sweet-card {
        background: #ffffff;
        border: 2px solid #ffe4e1;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(255, 182, 193, 0.3);
        transition: all 0.3s ease;
    }
    .sweet-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(255, 182, 193, 0.4);
    }
    .sweet-header {
        background: linear-gradient(135deg, #ffb6c1 0%, #ffc0cb 50%, #ffd1dc 100%);
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(255, 182, 193, 0.4);
    }
    .badge-sweet {
        background-color: #fff0f5;
        color: #ff69b4;
        border: 1px solid #ffb6c1;
    }
    .profile-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border: 4px solid #ffb6c1;
        box-shadow: 0 4px 10px rgba(255, 182, 193, 0.4);
    }
</style>

<div class="container my-5" style="max-width: 850px;">

    {{-- Error Alert --}}
    @if($errors->any())
        <div class="alert rounded-4 border-0 shadow-sm mb-4" style="background-color: #ffe6e6; color: #d9534f;" role="alert">
            <div class="d-flex align-items-center mb-2 fw-bold">
                <i class="bi bi-heartbreak-fill me-2 fs-5"></i> เกิดข้อผิดพลาดในการดำเนินรายการ
            </div>
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Header Banner --}}
    <div class="sweet-header text-white p-4 p-md-5 mb-4 position-relative overflow-hidden">
        <h1 class="fw-bold display-6 mb-2">🌸 About CRUD Application</h1>
        <p class="fs-5 mb-0" style="opacity: 0.95;">
            ระบบ CRUD สำหรับจัดการข้อมูล เพิ่ม แสดง แก้ไข และลบข้อมูลได้อย่างสะดวกสบาย ✨
        </p>
    </div>

    <div class="row g-4 mb-4">
        {{-- What is CRUD --}}
        <div class="col-md-6">
            <div class="sweet-card p-4 h-100">
                <h4 class="fw-bold mb-3" style="color: #ff69b4;">
                    <i class="bi bi-stars me-2"></i>CRUD คืออะไร?
                </h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent border-0 px-0">
                        <span class="badge rounded-pill me-2 px-3 py-2" style="background-color: #a8e6cf; color: #1b5e20;">C</span>
                        <strong>Create</strong> — เพิ่มข้อมูลใหม่ ✨
                    </li>
                    <li class="list-group-item bg-transparent border-0 px-0">
                        <span class="badge rounded-pill me-2 px-3 py-2" style="background-color: #dcedc1; color: #33691e;">R</span>
                        <strong>Read</strong> — แสดงข้อมูล 🌸
                    </li>
                    <li class="list-group-item bg-transparent border-0 px-0">
                        <span class="badge rounded-pill me-2 px-3 py-2" style="background-color: #ffd3b6; color: #e65100;">U</span>
                        <strong>Update</strong> — แก้ไขข้อมูล 🎀
                    </li>
                    <li class="list-group-item bg-transparent border-0 px-0">
                        <span class="badge rounded-pill me-2 px-3 py-2" style="background-color: #ffaaa5; color: #b71c1c;">D</span>
                        <strong>Delete</strong> — ลบข้อมูล 💖
                    </li>
                </ul>
            </div>
        </div>

        {{-- Technology --}}
        <div class="col-md-6">
            <div class="sweet-card p-4 h-100">
                <h4 class="fw-bold mb-3" style="color: #ff69b4;">
                    <i class="bi bi-magic me-2"></i>Technology
                </h4>
                <div class="d-flex flex-wrap gap-2 pt-2">
                    <span class="badge badge-sweet fs-6 px-3 py-2 rounded-pill"><i class="bi bi-heart-fill me-1"></i> Laravel</span>
                    <span class="badge badge-sweet fs-6 px-3 py-2 rounded-pill"><i class="bi bi-heart-fill me-1"></i> PHP</span>
                    <span class="badge badge-sweet fs-6 px-3 py-2 rounded-pill"><i class="bi bi-heart-fill me-1"></i> MySQL</span>
                    <span class="badge badge-sweet fs-6 px-3 py-2 rounded-pill"><i class="bi bi-heart-fill me-1"></i> Blade</span>
                    <span class="badge badge-sweet fs-6 px-3 py-2 rounded-pill"><i class="bi bi-heart-fill me-1"></i> HTML</span>
                    <span class="badge badge-sweet fs-6 px-3 py-2 rounded-pill"><i class="bi bi-heart-fill me-1"></i> CSS</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Developer --}}
    <div class="sweet-card p-4 mb-4">
        <h4 class="fw-bold mb-4" style="color: #ff69b4;">
            <i class="bi bi-person-heart me-2"></i>Developer
        </h4>

        <form action="{{ route('store') }}" method="POST">
            @csrf
            
            <div class="p-3 rounded-4 mb-4 d-flex flex-column flex-sm-row align-items-center gap-4" style="background-color: #fff5f8; border: 1px dashed #ffb6c1;">
                <!-- รูปโปรไฟล์ผู้พัฒนา (เปลี่ยน URL รูปภาพตรงนี้ได้เลย) -->
                <img src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed=Kritsanapong" alt="Developer Avatar" class="profile-img rounded-circle flex-shrink-0">
                
                <div>
                    <p class="fs-6 mb-2 text-secondary">
                        <strong style="color: #ff1493;">ชื่อ-นามสกุล:</strong> นาย กฤษณพงศ์ ล่องบุตรศรี
                    </p>
                    <p class="fs-6 mb-0 text-secondary">
                        <strong style="color: #ff1493;">รหัสนักศึกษา:</strong> 68319010001
                    </p>
                </div>
            </div>

            <div class="d-flex justify-content-start">
                <a href="{{ route('index') }}" class="btn rounded-pill px-4 text-white shadow-sm" style="background-color: #ffb6c1; border: none;">
                    <i class="bi bi-arrow-left-heart-fill me-1"></i> Back
                </a>
            </div>
        </form>
    </div>

</div>
@endsection