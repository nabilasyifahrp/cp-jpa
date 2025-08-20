@extends('layouts.admin')

@section('title', 'Hubungi Kami')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold mb-5">Hubungi Kami</h2>

    <div class="row justify-content-center">
        <!-- Kolom Alamat -->
        <div class="col-md-5 mb-4">
            <div style="background-color: #eaf4ff; color: #000;" class="p-4 rounded shadow">
                <h5 class="fw-bold">Alamat Kantor</h5>
                <p>Jl. Contoh Alamat No. 123, Jakarta</p>

                <h5 class="fw-bold mt-4">Email:</h5>
                <p>info@cp-jpa.com</p>

                <h5 class="fw-bold mt-4">Telepon:</h5>
                <p>+62 812-3456-7890</p>
            </div>
        </div>

        <!-- Kolom Form -->
        <div class="col-md-6">
            <div class="bg-white p-4 rounded shadow">
                <h5 class="fw-bold mb-4">Kirim Pesan</h5>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama*</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email*</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telepon*</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pesan*</label>
                        <textarea name="message" rows="4" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
