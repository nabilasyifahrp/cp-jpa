@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Partner Details</h1>

    <div class="card shadow-sm p-4">
        <div class="mb-3">
            <h5><strong>Name:</strong></h5>
            <p>{{ $partner->name }}</p>
        </div>

        <div class="mb-3">
            <h5><strong>Logo:</strong></h5>
            <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" width="200" class="img-thumbnail">
        </div>

        <div class="mb-3">
            <h5><strong>Description:</strong></h5>
            <p>{{ $partner->description }}</p>
        </div>

        <a href="{{ route('partners.index') }}" class="btn btn-secondary mt-3">← Back to List</a>
    </div>
</div>
@endsection
