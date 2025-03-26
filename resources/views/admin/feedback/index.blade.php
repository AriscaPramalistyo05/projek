@extends('admin.adminmaster')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h3>Data Feedback dan Blog</h3>
            </div>
            <div class="col-auto">
                <!-- Button trigger modal for Feedback -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createFeedbackModal">
                    Add Feedback
                </button>

                <!-- Button trigger modal for Blog -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createBlogModal">
                    Add Blog
                </button>
            </div>
        </div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="feedback-tab" data-toggle="tab" href="#feedback" role="tab"
                    aria-controls="feedback" aria-selected="true">Feedback</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="blog-tab" data-toggle="tab" href="#blog" role="tab" aria-controls="blog"
                    aria-selected="false">Blog</button>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content mt-3" id="myTabContent">
            <!-- Feedback Tab -->
            <div class="tab-pane fade show active" id="feedback" role="tabpanel" aria-labelledby="feedback-tab">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Komentar</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td>{{ $feedback->name }}</td>
                                    <td>{{ $feedback->comment }}</td>
                                    <td>
                                        <a href="{{ route('admin.blog.editfd', ['id' => $feedback->id]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.blog.destroyfd', ['id' => $feedback->id]) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this feedback?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Blog Tab -->
            <div class="tab-pane fade" id="blog" role="tabpanel" aria-labelledby="blog-tab">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->content }}</td>
                                    <td>{{ $blog->date->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.blog.destroy', ['id' => $blog->id]) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal for Feedback -->
        <div class="modal fade" id="createFeedbackModal" tabindex="-1" role="dialog"
            aria-labelledby="createFeedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createFeedbackModalLabel">Add Feedback</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="createFeedbackForm" action="{{ route('admin.feedback.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="create-name">Nama</label>
                                <input type="text" class="form-control" id="create-name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="create-comment">Komentar</label>
                                <textarea class="form-control" id="create-comment" name="comment" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal for Blog -->
        <div class="modal fade" id="createBlogModal" tabindex="-1" role="dialog"
            aria-labelledby="createBlogModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createBlogModalLabel">Add Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="createBlogForm" action="{{ route('admin.blog.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
