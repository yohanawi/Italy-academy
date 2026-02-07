@extends('layout._default')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <div class="page-title d-flex flex-column me-3">
                <h1 class="d-flex text-white fw-bold my-1 fs-3">Blog Management</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <li class="breadcrumb-item text-white opacity-75">
                        <a href="{{ route('dashboard') }}" class="text-white text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-white opacity-75">Blogs</li>
                </ul>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h2 class="fw-bold">All Blogs</h2>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Blog
                    </a>
                </div>
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-50px">ID</th>
                                <th class="min-w-150px">Title</th>
                                <th class="min-w-100px">Author</th>
                                <th class="min-w-100px">Status</th>
                                <th class="min-w-100px">Published Date</th>
                                <th class="min-w-80px">Views</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @forelse($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($blog->thumbnail)
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="{{ asset('storage/' . $blog->thumbnail) }}"
                                                        alt="{{ $blog->title }}">
                                                </div>
                                            @endif
                                            <div>
                                                <a href="{{ route('admin.blogs.show', $blog) }}"
                                                    class="text-gray-800 text-hover-primary fw-bold">
                                                    {{ $blog->title }}
                                                </a>
                                                @if ($blog->is_popular)
                                                    <span class="badge badge-success badge-sm ms-2">Popular</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $blog->author_name ?? ($blog->author->name ?? 'Unknown') }}</td>
                                    <td>
                                        @if ($blog->status === 'published')
                                            <span class="badge badge-light-success">Published</span>
                                        @else
                                            <span class="badge badge-light-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $blog->published_date ? $blog->published_date->format('M d, Y') : '-' }}</td>
                                    <td>{{ number_format($blog->views) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.blogs.edit', $blog) }}"
                                            class="btn btn-sm btn-light-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-10">
                                        <div class="text-gray-600 fs-4">No blogs found</div>
                                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mt-5">
                                            <i class="fas fa-plus"></i> Create Your First Blog
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!--end::Table-->

                <!--begin::Pagination-->
                <div class="d-flex justify-content-center mt-5">
                    {{ $blogs->links() }}
                </div>
                <!--end::Pagination-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
@endsection
