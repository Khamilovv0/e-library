<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>
    <link rel="icon" type="image/png" href="{{asset('backend/dist/img/metu.png')}}">
    <!-- Google Font: Poppins (более современный шрифт) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
    <link href="{{asset('backend/dist/css/style.css')}}" rel="stylesheet" />
</head>
<body>
<!-- Анимированный фон -->
<div class="bg-pattern" id="bgPattern"></div>

<div class="login-page d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="login-box">
        <div class="login-card card card-outline">
            <div class="card-header text-center">
                <a href="" class="h1"><b>{{config('app.name')}}</b></a>
            </div>
            <div class="card-body p-4">
                <p class="login-box-msg">Введите логин и пароль с PLATONUS</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-4">
                        <input class="form-control"
                               type="text"
                               name="Login"
                               autocomplete="off"
                               placeholder="Логин"
                               required>
                    </div>
                    <div class="input-group mb-4">
                        <input class="form-control"
                               type="password"
                               name="Password"
                               autocomplete="off"
                               placeholder="Пароль"
                               required>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                Войти <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>

<script>
    // Создание анимированного фона с "паутиной"
    document.addEventListener('DOMContentLoaded', function() {
        const bgPattern = document.getElementById('bgPattern');
        const colors = ['rgba(67, 97, 238, 0.1)', 'rgba(72, 149, 239, 0.1)', 'rgba(63, 55, 201, 0.1)'];

        for (let i = 0; i < 20; i++) {
            const line = document.createElement('div');
            line.className = 'line';

            // Случайные параметры
            const width = Math.random() * 300 + 100;
            const height = 1;
            const left = Math.random() * 100;
            const top = Math.random() * 100;
            const rotation = Math.random() * 360;
            const color = colors[Math.floor(Math.random() * colors.length)];
            const delay = Math.random() * 15;

            line.style.width = `${width}px`;
            line.style.height = `${height}px`;
            line.style.left = `${left}%`;
            line.style.top = `${top}%`;
            line.style.transform = `rotate(${rotation}deg)`;
            line.style.background = color;
            line.style.animationDelay = `${delay}s`;

            bgPattern.appendChild(line);
        }
    });
</script>
</body>
</html>
