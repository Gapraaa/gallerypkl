<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gallery->title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <img src="{{ asset('storage/' . $gallery->image_path) }}" class="card-img-top" alt="{{ $gallery->title }}">
            <div class="card-body">
                <h1 class="card-title">{{ $gallery->title }}</h1>
                <p class="card-text">{{ $gallery->description }}</p>
                @if ($gallery->date)
                    <p class="card-text"><small class="text-muted">Date: {{ $gallery->date->format('Y-m-d') }}</small></p>
                @endif
                <a href="{{ route('galleries.index') }}" class="btn btn-secondary">Back to Gallery</a>
                <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?');">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
