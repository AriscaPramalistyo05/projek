@extends('admin.adminmaster')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Add Entry</h1>
        </div>
    </div>

    <form action="{{ route('admin.blog.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="create-category">Category</label>
            <select class="form-control" id="create-category" name="category" required>
                <option value="feedback">Feedback</option>
                <option value="blog">Blog</option>
            </select>
        </div>

        <div id="feedback-fields">
            <div class="form-group">
                <label for="create-name">Nama</label>
                <input type="text" class="form-control" id="create-name" name="name">
            </div>
            <div class="form-group">
                <label for="create-comment">Komentar</label>
                <textarea class="form-control" id="create-comment" name="comment" rows="5"></textarea>
            </div>
        </div>

        <div id="blog-fields" style="display: none;">
            <div class="form-group">
                <label for="create-title">Title</label>
                <input type="text" class="form-control" id="create-title" name="title">
            </div>
            <div class="form-group">
                <label for="create-content">Content</label>
                <textarea class="form-control" id="create-content" name="content" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="create-date">Date</label>
                <input type="text" class="form-control" id="create-date" name="date">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
