@extends('layouts.app') {{-- Pastikan kamu pakai layout yang sesuai --}}

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>List of Partners</h2>
        <a href="{{ route('partners.create') }}" class="btn btn-primary">+ Add Partner</a>
    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($partners as $index => $partner)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $partner->name }}</td>
                    <td class="text-center">
                        @if ($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" width="80">
                        @else
                            <span class="text-muted">No Logo</span>
                        @endif
                    </td>
            
                    <td class="text-center">
                        <a href="{{ route('partners.show', $partner->id) }}" class="btn btn-sm btn-info">Details</a>
                        <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this partner?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No partner data yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
