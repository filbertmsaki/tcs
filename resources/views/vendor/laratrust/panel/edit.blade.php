<x-app-layout>
    @section('title', $model ? "Edit {$type}" : "New {$type}")
    @push('scripts')
        <script>
            var forms = document.querySelectorAll(".needs-validation");
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener(
                    "submit",
                    function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                    },
                    false
                );
            });
            $(document).ready(function() {
                var displayNameInput = $('#display_name');
                var nameInput = $('#name');

                displayNameInput.on('input', function() {
                    nameInput.val(toKebabCase($(this).val()));
                });

                function toKebabCase(str) {
                    return str &&
                        str
                        .match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g)
                        .map(x => x.toLowerCase())
                        .join('-')
                        .trim();
                }
            });
        </script>
    @endpush
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        Users Management
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $model ? "Edit {$type}" : "New {$type}" }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ $model ? "Edit {$type}" : "New {$type}" }}</h5>
            <hr />
            <div class="form-body mt-4">
                <form id="laratrustForm" class="needs-validation"
                    action="{{ $model ? route("users.{$type}s.update", $model->getKey()) : route("users.{$type}s.store") }}"
                    method="POST" novalidate>
                    @csrf
                    @if ($model)
                        @method('PUT')
                    @endif
                    <div class="row g-3 ">
                        <div class="col-md-6">
                            <label for="name" class="form-label required">Name/Code</label>
                            <input type="text" id="name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="this-will-be-the-code-name" value="{{ $model->name ?? old('name') }}"
                                readonly autocomplete="off" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="display_name" class="form-label required">Display Name</label>
                            <input type="text" class="form-control @error('display_name') is-invalid @enderror"
                                id="display_name" name="display_name" placeholder="Edit user profile" autocomplete="off"
                                value="{{ $model->display_name ?? old('display_name') }}" />
                            @error('display_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label required">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                name="description" placeholder="Some description for the {{ $type }}">{{ $model->description ?? old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-3 mt-3">
                        @if ($type == 'role')
                            <span class="block text-gray-700">Permissions</span>
                            <div class="flex flex-wrap justify-start mb-4">
                                @foreach ($permissions as $permission)
                                    <label class="inline-flex items-center mr-6 my-2 text-sm" style="flex: 1 0 20%;">
                                        <input type="checkbox" class="form-checkbox h-4 w-4" name="permissions[]"
                                            value="{{ $permission->getKey() }}" {!! $permission->assigned ? 'checked' : '' !!}>
                                        <span
                                            class="ml-2">{{ $permission->display_name ?? $permission->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="row g-3 mt-3">
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3 float-end">
                                <a href="{{ route("users.{$type}s.index") }}" class="btn btn-light px-4">
                                    Cancel
                                </a>
                                <button class="btn btn-primary px-4" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
