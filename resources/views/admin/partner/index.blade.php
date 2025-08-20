@extends('layouts.admin')

@section('title', 'Daftar Partner')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-3">Partner List</h2>
    <p class="text-muted mb-4">Manage partners who collaborate with your company.</p>

    <div class="mb-4 text-end">
    <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Add Partner
    </a>
</div>

    </div>

    <div class="table-responsive">
    <table class="table table-bordered table-striped text-center align-middle" style="background: white; border-radius: 10px; overflow: hidden;">
    <thead class="table-primary">
        <tr>
            <th>Name</th>
            <th>Logo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($partners as $partner)
        <tr>
            <td>{{ $partner->name }}</td>
            <td>
                @if ($partner->logo)
                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo" width="100" style="object-fit: contain; max-height: 80px;">
                @else
                    <span class="text-muted">No Logo</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.partners.show', $partner->id) }}" class="btn btn-info btn-sm mb-1">Show</a>
                <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


    </div>
</div>
@endsection
