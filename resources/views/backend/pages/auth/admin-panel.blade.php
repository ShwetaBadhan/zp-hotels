<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Login | Zp Grand Hotels')</title>

    <link rel="shortcut icon" href="{{ url('backend/assets/img/favicon/favicon.ico') }}">
    <link href="{{ url('backend/assets/css/vendor/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/css/vendor/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/css/vendor/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body data-lh-mode="light">
    <main class="wrapper sb-default">
        <section class="auth-section anim">
            <div class="lh-login-page">
                <div class="container-fluid no-gutters">
                    <div class="row">
                        <div class="offset-lg-6 col-lg-6">
                            <div class="content-detail">
                                <div class="main-info">
                                    <div class="hero-container">
                                     <form class="login-form" method="POST" action="{{ route('admin.login') }}"> {{-- ✅ Use admin.login --}}
    @csrf
    
    <div class="imgcontainer">
        <a href="{{ route('admin-panel') }}">
            <img src="{{ url('backend/assets/img/logo/full-logo.png') }}" alt="logo" class="logo">
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="input-control">
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autofocus>
        
        <span class="password-field-show">
            <input type="password" name="password" class="password-field" placeholder="Enter Password" required>
            <span data-toggle=".password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
        </span>
        
        <label class="label-container">Remember me
            <input type="checkbox" name="remember">
            <span class="checkmark"></span>
        </label>
        
        <div class="login-btns">
            <button type="submit">Login as Admin</button>
        </div>
    </div>
</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="{{ url('backend/assets/js/vendor/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ url('backend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('backend/assets/js/main.js') }}"></script>
</body>
</html>