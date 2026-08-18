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
        border-radius: 12px;
        padding: 10px 15px;
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
        padding: 10px 20px;
        transition: all 0.2s ease;
    }
    .btn-sweet:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 117, 140, 0.4);
        color: white;
    }
    .sweet-link {
        color: #fd79a8;
        text-decoration: none;
        font-weight: 500;
    }
    .sweet-link:hover {
        color: #d87093;
        text-decoration: underline;
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="sweet-card overflow-hidden">
                
                {{-- Card Header --}}
                <div class="sweet-header text-center py-4">
                    <div class="mb-2 fs-1">🎀</div>
                    <h4 class="fw-bold mb-0">Create Account</h4>
                    <small style="opacity: 0.9;">สมัครสมาชิกเพื่อเข้าใช้งานระบบ</small>
                </div>

                <div class="card-body p-4">
                    {{-- Success Alert --}}
                    @if(session('success'))
                        <div class="alert rounded-4 border-0 shadow-sm mb-3" style="background-color: #e8f5e9; color: #2e7d32;" role="alert">
                            <div class="d-flex align-items-center">
                                <span class="me-2">✨</span>
                                <span>{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    {{-- Error Alert --}}
                    @if($errors->any())
                        <div class="alert rounded-4 border-0 shadow-sm mb-3" style="background-color: #ffe6e6; color: #d9534f;" role="alert">
                            <div class="d-flex align-items-center mb-1 fw-bold">
                                <span class="me-2">💖</span> เกิดข้อผิดพลาด
                            </div>
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Registration Form --}}
                    <form method="POST" action="{{ route('post.register') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color: #6c5ce7;">Name</label>
                            <input
                                type="text"
                                class="form-control form-control-sweet"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="ชื่อ-นามสกุลของคุณ"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color: #6c5ce7;">Email Address</label>
                            <input
                                type="email"
                                class="form-control form-control-sweet"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="name@example.com"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold" style="color: #6c5ce7;">Password</label>
                            <input
                                type="password"
                                class="form-control form-control-sweet"
                                name="password"
                                placeholder="••••••••"
                                required>
                        </div>

                        <button type="submit" class="btn btn-sweet w-100 shadow-sm">
                            Register ✨
                        </button>
                    </form>

                    {{-- Login Link --}}
                    <div class="text-center mt-4">
                        <a href="{{ route('login') }}" class="sweet-link">
                            Already have an account? Login 🌸
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection