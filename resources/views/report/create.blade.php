@extends('layouts.app') <!-- chắc chắn file này tồn tại -->

@section('title', 'Submit Feedback / Report')

@section('content')
<div class="container mt-4">
    <h2>Submit Feedback / Report</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="attachments" class="form-label">Attachments (up to 3 images)</label>
            <input type="file" name="attachments[]" id="attachments" class="form-control" multiple accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
</div>
@endsection
