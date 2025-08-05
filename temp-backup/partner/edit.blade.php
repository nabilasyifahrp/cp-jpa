@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Partner</h1>

    <form action="{{ route('partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $partner->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Logo Lama</label><br>
            <img src="{{ asset('storage/' . $partner->logo) }}" width="100">
        </div>

        <div class="mb-3">
            <label>New logo (if you want to change it)</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $partner->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
