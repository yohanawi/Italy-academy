@extends('layout._default')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <div class="page-title d-flex flex-column me-3">
                <h1 class="d-flex text-white fw-bold my-1 fs-3">Edit Blog</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <li class="breadcrumb-item text-white opacity-75">
                        <a href="{{ route('dashboard') }}" class="text-white text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-white opacity-75">
                        <a href="{{ route('admin.blogs.index') }}" class="text-white text-hover-primary">Blogs</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-white opacity-75">Edit</li>
                </ul>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-5">
                <!--begin::Main column-->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <!--begin::Title-->
                            <div class="mb-5">
                                <label class="required form-label">Blog Title</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" placeholder="Enter blog title"
                                    value="{{ old('title', $blog->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Title-->

                            <!--begin::Description-->
                            <div class="mb-5">
                                <label class="required form-label">Blog Content</label>
                                <textarea name="description" id="kt_blog_description" class="form-control @error('description') is-invalid @enderror"
                                    rows="10">{{ old('description', $blog->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Description-->

                            <!--begin::Current Thumbnail-->
                            @if ($blog->thumbnail)
                                <div class="mb-3">
                                    <label class="form-label">Current Featured Image</label>
                                    <div>
                                        <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="img-fluid rounded"
                                            style="max-height: 200px;">
                                    </div>
                                </div>
                            @endif
                            <!--end::Current Thumbnail-->

                            <!--begin::Thumbnail-->
                            <div class="mb-5">
                                <label class="form-label">Change Featured Image</label>
                                <input type="file" name="thumbnail"
                                    class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*"
                                    onchange="previewImage(event, 'thumbnail-preview')">
                                @error('thumbnail')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-3" id="thumbnail-preview"></div>
                            </div>
                            <!--end::Thumbnail-->
                        </div>
                    </div>
                </div>
                <!--end::Main column-->

                <!--begin::Sidebar-->
                <div class="col-lg-4">
                    <!--begin::Status Card-->
                    <div class="card mb-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Publish</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Status-->
                            <div class="mb-5">
                                <label class="required form-label">Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>
                                        Draft</option>
                                    <option value="published"
                                        {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>Published
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Status-->

                            <!--begin::Published Date-->
                            <div class="mb-5">
                                <label class="form-label">Published Date</label>
                                <input type="date" name="published_date"
                                    class="form-control @error('published_date') is-invalid @enderror"
                                    value="{{ old('published_date', $blog->published_date ? $blog->published_date->format('Y-m-d') : date('Y-m-d')) }}">
                                @error('published_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Published Date-->

                            <!--begin::Popular-->
                            <div class="mb-5">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular"
                                        {{ old('is_popular', $blog->is_popular) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_popular">
                                        Mark as Popular
                                    </label>
                                </div>
                            </div>
                            <!--end::Popular-->

                            <!--begin::Stats-->
                            <div class="mb-5">
                                <div class="border rounded p-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Views:</span>
                                        <span class="fw-bold">{{ number_format($blog->views) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Created:</span>
                                        <span class="fw-bold">{{ $blog->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Stats-->

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Blog
                                </button>
                                <a href="{{ route('admin.blogs.index') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Status Card-->

                    <!--begin::Author Info Card-->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Author Information</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Author Name-->
                            <div class="mb-5">
                                <label class="form-label">Author Name</label>
                                <input type="text" name="author_name"
                                    class="form-control @error('author_name') is-invalid @enderror" placeholder="John Doe"
                                    value="{{ old('author_name', $blog->author_name) }}">
                                @error('author_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Author Name-->

                            <!--begin::Author Position-->
                            <div class="mb-5">
                                <label class="form-label">Author Position</label>
                                <input type="text" name="author_position"
                                    class="form-control @error('author_position') is-invalid @enderror"
                                    placeholder="Content Writer"
                                    value="{{ old('author_position', $blog->author_position) }}">
                                @error('author_position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Author Position-->

                            <!--begin::Current Author Photo-->
                            @if ($blog->author_profile_photo)
                                <div class="mb-3">
                                    <label class="form-label">Current Author Photo</label>
                                    <div>
                                        <img src="{{ asset('storage/' . $blog->author_profile_photo) }}"
                                            class="img-fluid rounded-circle" style="max-height: 100px;">
                                    </div>
                                </div>
                            @endif
                            <!--end::Current Author Photo-->

                            <!--begin::Author Photo-->
                            <div class="mb-5">
                                <label class="form-label">Change Author Photo</label>
                                <input type="file" name="author_profile_photo"
                                    class="form-control @error('author_profile_photo') is-invalid @enderror"
                                    accept="image/*" onchange="previewImage(event, 'author-preview')">
                                @error('author_profile_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-3" id="author-preview"></div>
                            </div>
                            <!--end::Author Photo-->
                        </div>
                    </div>
                    <!--end::Author Info Card-->
                </div>
                <!--end::Sidebar-->
            </div>
        </form>
    </div>
    <!--end::Container-->
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#kt_blog_description'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'blockQuote', 'insertTable', '|',
                        'undo', 'redo'
                    ]
                },
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        }
                    ]
                },
                language: 'en',
            })
            .catch(error => {
                console.error(error);
            });

        // Image preview function
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const preview = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML =
                        `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">`;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
