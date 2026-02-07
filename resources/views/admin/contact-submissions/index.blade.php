<x-default-layout>

    @section('title')
        Contact Submissions
    @endsection

    <!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <div class="page-title d-flex flex-column me-3">
                <h1 class="d-flex text-white fw-bold my-1 fs-3">Contact Submissions</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <li class="breadcrumb-item text-white opacity-75">
                        <a href="{{ route('dashboard') }}" class="text-white text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-white opacity-75">Contact Submissions</li>
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
                    <!--begin::Search-->
                    <form method="GET" class="d-flex align-items-center position-relative me-3">
                        <i class="fas fa-search position-absolute ms-5"></i>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="form-control form-control-solid w-250px ps-13" placeholder="Search submissions...">
                    </form>
                    <!--end::Search-->
                </div>
                <div class="card-toolbar">
                    <!--begin::Status Filter-->
                    <div class="d-flex align-items-center gap-2">
                        <select name="status" class="form-select form-select-solid w-150px"
                            onchange="window.location.href='{{ route('admin.contact-submissions.index') }}?status=' + this.value + '&search={{ request('search') }}'">
                            <option value="">All Status</option>
                            <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                            <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                            <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied
                            </option>
                        </select>
                    </div>
                    <!--end::Status Filter-->
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

                <!--begin::Status Badges-->
                <div class="d-flex gap-3 mb-5">
                    <a href="{{ route('admin.contact-submissions.index') }}"
                        class="badge badge-light-primary fs-6 px-4 py-3 {{ !request('status') ? 'badge-primary' : '' }}">
                        All ({{ $counts['all'] }})
                    </a>
                    <a href="{{ route('admin.contact-submissions.index', ['status' => 'new']) }}"
                        class="badge badge-light-warning fs-6 px-4 py-3 {{ request('status') == 'new' ? 'badge-warning' : '' }}">
                        New ({{ $counts['new'] }})
                    </a>
                    <a href="{{ route('admin.contact-submissions.index', ['status' => 'read']) }}"
                        class="badge badge-light-info fs-6 px-4 py-3 {{ request('status') == 'read' ? 'badge-info' : '' }}">
                        Read ({{ $counts['read'] }})
                    </a>
                    <a href="{{ route('admin.contact-submissions.index', ['status' => 'replied']) }}"
                        class="badge badge-light-success fs-6 px-4 py-3 {{ request('status') == 'replied' ? 'badge-success' : '' }}">
                        Replied ({{ $counts['replied'] }})
                    </a>
                </div>
                <!--end::Status Badges-->

                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-50px">ID</th>
                                <th class="min-w-150px">Name</th>
                                <th class="min-w-150px">Email</th>
                                <th class="min-w-100px">Phone</th>
                                <th class="min-w-200px">Subject</th>
                                <th class="min-w-100px">Status</th>
                                <th class="min-w-100px">Date</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @forelse($submissions as $submission)
                                <tr>
                                    <td>{{ $submission->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-40px me-3">
                                                <div class="symbol-label bg-light-primary text-primary fw-bold fs-6">
                                                    {{ strtoupper(substr($submission->name, 0, 1)) }}
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="text-gray-800 fw-bold">{{ $submission->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $submission->email }}"
                                            class="text-gray-600 text-hover-primary">
                                            {{ $submission->email }}
                                        </a>
                                    </td>
                                    <td>{{ $submission->phone ?? '-' }}</td>
                                    <td>
                                        <span class="text-gray-800">{{ Str::limit($submission->subject, 40) }}</span>
                                    </td>
                                    <td>
                                        @if ($submission->status === 'new')
                                            <span class="badge badge-light-warning">New</span>
                                        @elseif ($submission->status === 'read')
                                            <span class="badge badge-light-info">Read</span>
                                        @else
                                            <span class="badge badge-light-success">Replied</span>
                                        @endif
                                    </td>
                                    <td>{{ $submission->created_at->format('M d, Y H:i') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.contact-submissions.show', $submission) }}"
                                            class="btn btn-sm btn-light-primary">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form action="{{ route('admin.contact-submissions.destroy', $submission) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this submission?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-10">
                                        <div class="text-gray-600 fs-4">No contact submissions found</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!--end::Table-->

                <!--begin::Pagination-->
                <div class="d-flex justify-content-center mt-5">
                    {{ $submissions->links() }}
                </div>
                <!--end::Pagination-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</x-default-layout>
