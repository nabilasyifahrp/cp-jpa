@extends('layouts.app')

@section('content')
<section class="section-contact">
    <div class="container py-5">
        <div class="row g-4">
            {{-- Kolom Informasi Kantor --}}
            <div class="col-lg-5">
                <h2 class="mb-4">Contact Us</h2>
                <p class="text-muted">
                Please contact us for inquiries, cooperation, or other information via the form on the side or directly to our office.
                </p>

                <ul class="list-unstyled mt-4">
                    <li class="mb-3">
                        <i class="bi bi-geo-alt-fill me-2 text-primary"></i>
                        <strong>Address:</strong> Jl. Merdeka No.123, Jakarta Pusat
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-telephone-fill me-2 text-primary"></i>
                        <strong>telephone:</strong> (021) 123-4567
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-envelope-fill me-2 text-primary"></i>
                        <strong>Email:</strong> info@namaperusahaan.com
                    </li>
                </ul>
            </div>

            {{-- Kolom Form Kontak --}}
            <div class="col-lg-7">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="mb-3">Contact Form</h4>

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" required>
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" class="form-control" id="message" rows="4" required>{{ old('message') }}</textarea>
                                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Send a  Message
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
