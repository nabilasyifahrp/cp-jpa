@extends('layouts.app')

@section('title', 'Detail Partner')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold mb-5">Detail Partner</h2>

    <div class="card shadow-lg rounded p-4 mx-auto" style="max-width: 700px;">
        <div class="text-center mb-4">
            @if ($partner->logo)
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo Partner" class="img-fluid rounded" style="max-height: 200px;">
            @else
                <p class="text-muted">Tidak ada logo</p>
            @endif
        </div>

        <div class="mb-3">
            <h5 class="fw-bold">Partner Name</h5>
            <p>{{ $partner->name }}</p>
        </div>

        <div class="mb-3">
            <h5 class="fw-bold">Description</h5>
            <p>{{ $partner->description ?? '-' }}</p>
        </div>

        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">← Kembali</a>
    </div>
</div>
@endsection
