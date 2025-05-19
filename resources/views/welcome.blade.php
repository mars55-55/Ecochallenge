@extends('layouts.guest')
@section('content')
    <style>
        .eco-btn {
            font-size: 1rem;
            padding: 0.55rem 1.5rem;
            border-radius: 24px;
            font-weight: 600;
            border: none;
            outline: none;
            background: #fff;
            color: #21a038;
            box-shadow: 0 2px 8px rgba(33,160,56,0.08);
            transition: background 0.16s, color 0.16s, box-shadow 0.16s, transform 0.13s;
            text-decoration: none;
        }
        .eco-btn-success {
            background: #21a038;
            color: #fff;
        }
        .eco-btn-success:hover, .eco-btn-success:focus {
            background: #18862e;
            color: #fff;
            box-shadow: 0 4px 16px rgba(33,160,56,0.13);
            transform: translateY(-2px) scale(1.03);
            text-decoration: none;
        }
        .eco-btn-primary {
            background: #11998e;
            color: #fff;
        }
        .eco-btn-primary:hover, .eco-btn-primary:focus {
            background: #0e7c71;
            color: #fff;
            box-shadow: 0 4px 16px rgba(17,153,142,0.13);
            transform: translateY(-2px) scale(1.03);
            text-decoration: none;
        }
        .eco-btn:active {
            transform: scale(0.97);
        }
        .eco-icon {
            background: #e8fbe8;
            border-radius: 50%;
            width: 110px;
            height: 110px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px auto;
            font-size: 3.5rem;
            color: #21a038;
            box-shadow: 0 2px 12px rgba(33,160,56,0.10);
        }
    </style>
    <div class="container py-5">
        <h1 class="text-center mb-4 fw-bold">Bienvenidos a Ecochallenge</h1>
        <div class="d-flex justify-content-center gap-3 mb-5">
            @if (Auth::check())
                <a href="{{ route('dashboard') }}" class="eco-btn eco-btn-success">Ir al Panel</a>
            @else
                <a href="{{ route('login') }}" class="eco-btn eco-btn-primary">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="eco-btn eco-btn-success">Registrarse</a>
            @endif
        </div>
        <div class="row text-center mb-5">
            <div class="col-md-4 mb-3">
                <div class="eco-icon">
                    <i class="bi bi-bullseye"></i>
                </div>
                <h5 class="fw-semibold">Misión</h5>
                <p class="text-muted">Motivar hábitos sostenibles con retos y comunidad.</p>
            </div>
            <div class="col-md-4 mb-3">
                <div class="eco-icon">
                    <i class="bi bi-eye"></i>
                </div>
                <h5 class="fw-semibold">Visión</h5>
                <p class="text-muted">Ser la plataforma líder en sostenibilidad personal.</p>
            </div>
            <div class="col-md-4 mb-3">
                <div class="eco-icon">
                    <i class="bi bi-heart"></i>
                </div>
                <h5 class="fw-semibold">Valores</h5>
                <p class="text-muted">Colaboración, compromiso y respeto ambiental.</p>
            </div>
        </div>
        <h2 class="text-center mb-4 fs-4">¿Por qué Elegir Ecochallenge?</h2>
        <section class="eco-section mb-5">
            <h3 class="fs-5 fw-bold mb-2">¿Qué es EcoChallenge?</h3>
            <p class="mb-2">
                EcoChallenge es una plataforma digital donde puedes participar en retos ecológicos, compartir tus logros y aprender junto a una comunidad comprometida.
            </p>
            <ul>
                <li>Retos personalizados para mejorar tus hábitos sostenibles.</li>
                <li>Comparte tus avances y motiva a otros usuarios.</li>
                <li>Colabora y aprende junto a una comunidad activa.</li>
            </ul>
        </section>
        <section class="eco-section mb-5">
            <h3 class="fs-5 fw-bold mb-2">¿Cómo funciona?</h3>
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <h6 class="fw-semibold">1. Elige tus retos</h6>
                    <p class="text-muted">Selecciona entre una variedad de retos ecológicos adaptados a tus intereses y nivel.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="fw-semibold">2. Comparte y aprende</h6>
                    <p class="text-muted">Publica tus logros y motiva a otros miembros de la comunidad.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="fw-semibold">3. Crece con la comunidad</h6>
                    <p class="text-muted">Participa en foros y actividades grupales para seguir aprendiendo.</p>
                </div>
            </div>
        </section>
        <section class="eco-section text-center">
            <h3 class="fs-5 fw-bold mb-2">Únete a la comunidad EcoChallenge</h3>
            <p class="mb-3">Miles de personas ya están cambiando el mundo, un reto a la vez. ¡Súmate y haz la diferencia!</p>
            @if (Auth::check())
                <a href="{{ route('dashboard') }}" class="eco-btn eco-btn-success">Ir al Panel</a>
            @else
                <a href="{{ route('register') }}" class="eco-btn eco-btn-success">Quiero ser parte</a>
                <a href="{{ route('login') }}" class="eco-btn eco-btn-primary ms-2">Iniciar Sesión</a>
            @endif
        </section>
    </div>
@endsection