@extends('layouts.app-service')
@section('title', $service->title)
@section('content')
    <style>
        body {
            background: #fdfdfd;
        }

        .service-content {
            margin-top: 20px;
            padding: 20px;

        }

        .title {
            color: #0a2c6b;
        }

        .icon-button {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #0028B2;
            color: #fdfdfd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: none;
        }

        .icon-button:hover {
            background-color: #0a2c6b;
        }

        .break-word {
            word-break: break-word;
            overflow-wrap: break-word;
        }
    </style>

    <div class="container" style="background: #fdfdfd">
        <div class="service-content">
            @if (session('success'))
                <div class="alert alert-success fade show auto-dismiss" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="title text-center border-bottom border-3 pb-2 mb-5 break-word">{{ $service->title }}</h1>
            <p class="text-justify small">{!! $service->description !!}</p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alert = document.querySelector('.auto-dismiss');
            if (alert) {
                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 3000);
            }
        });
    </script>
@endsection
