<x-default-layout>

    @section('title')
        View Contact Submission
    @endsection

    <!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <div class="page-title d-flex flex-column me-3">
                <h1 class="d-flex text-white fw-bold my-1 fs-3">Contact Submission Details</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <li class="breadcrumb-item text-white opacity-75">
                        <a href="{{ route('dashboard') }}" class="text-white text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-white opacity-75">
                        <a href="{{ route('admin.contact-submissions.index') }}"
                            class="text-white text-hover-primary">Contact Submissions</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-white opacity-75">View</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.contact-submissions.index') }}" class="btn btn-sm btn-light">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-5">
            <!--begin::Main Content-->
            <div class="col-lg-8">
                <!--begin::Message Card-->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Message Details</h3>
                    </div>
                    <div class="card-body">
                        <!--begin::Subject-->
                        <div class="mb-7">
                            <label class="fw-bold text-gray-600 mb-2">Subject:</label>
                            <div class="fs-4 text-gray-800 fw-bold">{{ $contactSubmission->subject }}</div>
                        </div>
                        <!--end::Subject-->

                        <!--begin::Message-->
                        <div class="mb-7">
                            <label class="fw-bold text-gray-600 mb-2">Message:</label>
                            <div class="bg-light-primary p-5 rounded">
                                <p class="text-gray-800 mb-0" style="white-space: pre-wrap;">
                                    {{ $contactSubmission->message }}</p>
                            </div>
                        </div>
                        <!--end::Message-->

                        <!--begin::Submitted Date-->
                        <div class="mb-0">
                            <label class="fw-bold text-gray-600 mb-2">Submitted:</label>
                            <div class="text-gray-800">
                                <i class="fas fa-clock text-primary"></i>
                                {{ $contactSubmission->created_at->format('F d, Y \a\t h:i A') }}
                                <span class="text-muted">({{ $contactSubmission->created_at->diffForHumans() }})</span>
                            </div>
                        </div>
                        <!--end::Submitted Date-->
                    </div>
                </div>
                <!--end::Message Card-->
            </div>
            <!--end::Main Content-->

            <!--begin::Sidebar-->
            <div class="col-lg-4">
                <!--begin::Sender Info Card-->
                <div class="card mb-5">
                    <div class="card-header">
                        <h3 class="card-title">Sender Information</h3>
                    </div>
                    <div class="card-body">
                        <!--begin::Name-->
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-2">
                                <div class="symbol symbol-circle symbol-50px me-3">
                                    <div class="symbol-label bg-light-primary text-primary fw-bold fs-3">
                                        {{ strtoupper(substr($contactSubmission->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div>
                                    <div class="text-gray-800 fw-bold fs-5">{{ $contactSubmission->name }}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Name-->

                        <!--begin::Email-->
                        <div class="mb-5">
                            <label class="fw-bold text-gray-600 mb-2 d-block">
                                <i class="fas fa-envelope text-primary me-2"></i>Email:
                            </label>
                            <a href="mailto:{{ $contactSubmission->email }}" class="text-gray-800 text-hover-primary">
                                {{ $contactSubmission->email }}
                            </a>
                        </div>
                        <!--end::Email-->

                        <!--begin::Phone-->
                        <div class="mb-5">
                            <label class="fw-bold text-gray-600 mb-2 d-block">
                                <i class="fas fa-phone text-primary me-2"></i>Phone:
                            </label>
                            @if ($contactSubmission->phone)
                                <a href="tel:{{ $contactSubmission->phone }}" class="text-gray-800 text-hover-primary">
                                    {{ $contactSubmission->phone }}
                                </a>
                            @else
                                <span class="text-muted">Not provided</span>
                            @endif
                        </div>
                        <!--end::Phone-->

                        <!--begin::Quick Actions-->
                        <div class="separator my-5"></div>
                        <div class="d-grid gap-2">
                            <a href="mailto:{{ $contactSubmission->email }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-reply"></i> Reply via Email
                            </a>
                            @if ($contactSubmission->phone)
                                <a href="tel:{{ $contactSubmission->phone }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-phone"></i> Call
                                </a>
                            @endif
                        </div>
                        <!--end::Quick Actions-->
                    </div>
                </div>
                <!--end::Sender Info Card-->

                <!--begin::Status Card-->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Status Management</h3>
                    </div>
                    <div class="card-body">
                        <!--begin::Current Status-->
                        <div class="mb-5">
                            <label class="fw-bold text-gray-600 mb-2 d-block">Current Status:</label>
                            @if ($contactSubmission->status === 'new')
                                <span class="badge badge-warning fs-6">New</span>
                            @elseif ($contactSubmission->status === 'read')
                                <span class="badge badge-info fs-6">Read</span>
                            @else
                                <span class="badge badge-success fs-6">Replied</span>
                            @endif
                        </div>
                        <!--end::Current Status-->

                        <!--begin::Update Status Form-->
                        <form action="{{ route('admin.contact-submissions.update-status', $contactSubmission) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label fw-bold">Update Status:</label>
                                <select name="status" class="form-select" required>
                                    <option value="new"
                                        {{ $contactSubmission->status === 'new' ? 'selected' : '' }}>
                                        New
                                    </option>
                                    <option value="read"
                                        {{ $contactSubmission->status === 'read' ? 'selected' : '' }}>
                                        Read
                                    </option>
                                    <option value="replied"
                                        {{ $contactSubmission->status === 'replied' ? 'selected' : '' }}>
                                        Replied
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save"></i> Update Status
                            </button>
                        </form>
                        <!--end::Update Status Form-->

                        <!--begin::Delete-->
                        <div class="separator my-5"></div>
                        <form action="{{ route('admin.contact-submissions.destroy', $contactSubmission) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this submission? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Delete Submission
                            </button>
                        </form>
                        <!--end::Delete-->
                    </div>
                </div>
                <!--end::Status Card-->
            </div>
            <!--end::Sidebar-->
        </div>
    </div>
    <!--end::Container-->
</x-default-layout>
