<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow p-5" style="width: 100%; max-width: 800px;">
        <h1 class="mb-4 text-center">IT9aL Laboratory 13</h1>
        <h3 class="text-center mb-4">Welcome, {{ auth()->user()->name }}!</h3>

        <h1 class="mb-4 text-center">All Posts</h1>

        <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">
            <i class="bi bi-plus-circle"></i> Create New Post
        </a>

        @if ($posts->isEmpty())
            <p class="text-center text-muted">No content available.</p>
        @else
            <div class="list-group">
                @foreach ($posts as $post)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none fw-bold text-dark">{{ $post->title }}</a>
                        </div>
                        <div>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="text-center mt-4">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
