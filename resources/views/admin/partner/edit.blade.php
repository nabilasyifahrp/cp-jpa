@extends('layouts.admin')

@section('title', 'Edit Partner')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-primary text-center">Partner Edit</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-white p-4 rounded shadow-sm border border-light">
                <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Partner Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Logo (Optional)</label>
                        <input type="file" name="logo" class="form-control">
                    </div>

                    @if ($partner->logo)
                        <div class="mb-3 text-center">
                            <label class="form-label">Current Logo:</label><br>
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="4" class="form-control" required>{{ $partner->description }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">← Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
