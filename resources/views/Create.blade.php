@extends('layout')

@section('content')
<style>
    body {
        background-color: #fff0f5;
    }
    .sweet-card {
        border: 2px solid #ffe4e1;
        border-radius: 24px;
        background: #ffffff;
        box-shadow: 0 10px 25px rgba(255, 182, 193, 0.25);
        transition: transform 0.2s ease;
    }
    .sweet-header {
        background: linear-gradient(135deg, #ffb6c1 0%, #ffc0cb 50%, #ffd1dc 100%);
        border-top-left-radius: 22px;
        border-top-right-radius: 22px;
        color: white;
    }
    .form-control-sweet {
        border: 1.5px solid #ffc0cb;
        border-radius: 14px;
        padding: 12px 16px;
        background-color: #fffafb;
    }
    .form-control-sweet:focus {
        border-color: #ff69b4;
        box-shadow: 0 0 0 0.25rem rgba(255, 105, 180, 0.2);
        background-color: #ffffff;
    }
    .btn-sweet {
        background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%);
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 50px;
        padding: 10px 24px;
        transition: all 0.2s ease;
    }
    .btn-sweet:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 117, 140, 0.4);
        color: white;
    }
    .btn-sweet-secondary {
        background-color: #fff0f5;
        border: 1.5px solid #ffb6c1;
        color: #d87093;
        font-weight: 500;
        border-radius: 50px;
        padding: 10px 20px;
        transition: all 0.2s ease;
    }
    .btn-sweet-secondary:hover {
        background-color: #ffb6c1;
        color: white;
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="sweet-card overflow-hidden">
                
                {{-- Card Header --}}
                <div class="sweet-header text-center py-4">
                    <div class="mb-2 fs-1">🌸</div>
                    <h3 class="fw-bold mb-0">Create a New Post</h3>
                    <small style="opacity: 0.9;">เขียนและสร้างโพสต์ใหม่สุดน่ารัก ✨</small>
                </div>

                <div class="card-body p-4 p-md-5">
                    {{-- Error Alert --}}
                    @if($errors->any())
                        <div class="alert rounded-4 border-0 shadow-sm mb-4" style="background-color: #ffe6e6; color: #d9534f;" role="alert">
                            <div class="d-flex align-items-center mb-2 fw-bold">
                                <span class="me-2">💖</span> เกิดข้อผิดพลาดในการทำรายการ
                            </div>
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold" style="color: #6c5ce7;">Title 🎀</label>
                            <input 
                                type="text" 
                                id="title" 
                                name="title" 
                                class="form-control form-control-sweet" 
                                placeholder="ใส่หัวข้อโพสต์..."
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label fw-semibold" style="color: #6c5ce7;">Content 📝</label>
                            <textarea 
                                id="content" 
                                name="content" 
                                class="form-control form-control-sweet" 
                                rows="5" 
                                placeholder="พิมพ์เนื้อหาที่ต้องการสร้างที่นี่..."
                                required></textarea>
                        </div>

                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <a href="{{ route('index') }}" class="btn btn-sweet-secondary">
                                ← Back to Posts
                            </a>
                            <button type="submit" class="btn btn-sweet shadow-sm">
                                Create Post ✨
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection