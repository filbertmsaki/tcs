<x-app-layout>
    @section('title', "Edit {$modelKey}")
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
                        {{ "Edit {$modelKey}" }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ "Edit {$modelKey}" }}</h5>
            <hr />
            <div class="form-body mt-4">
                <form class="needs-validation"
                    action="{{ route('users.roles-assignment.update', ['roles_assignment' => $user->getKey(), 'model' => $modelKey]) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3 ">
                        <div class="col-12">
                            <label for="name" class="form-label required">Name</label>
                            <input type="text" id="name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $user->name ?? 'The model doesn\'t have a `name` attribute' }}" readonly
                                autocomplete="off" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <span class="block text-gray-700 mt-4">Roles</span>
                    <div class="flex flex-wrap justify-start mb-4">
                        @foreach ($roles as $role)
                            <label class="inline-flex items-center mr-6 my-2 text-sm" style="flex: 1 0 20%;">
                                <input type="checkbox"
                                    @if ($role->assigned && !$role->isRemovable) class="form-checkbox focus:shadow-none focus:border-transparent text-gray-500 h-4 w-4"
                @else
                class="form-checkbox h-4 w-4" @endif
                                    name="roles[]" value="{{ $role->getKey() }}" {!! $role->assigned ? 'checked' : '' !!}
                                    {!! $role->assigned && !$role->isRemovable ? 'onclick="return false;"' : '' !!}>
                                <span class="ml-2 {!! $role->assigned && !$role->isRemovable ? 'text-gray-600' : '' !!}">
                                    {{ $role->display_name ?? $role->name }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                    @if ($permissions)
                        <span class="block text-gray-700 mt-4">Permissions</span>
                        <div class="flex flex-wrap justify-start mb-4">
                            @foreach ($permissions as $permission)
                                <label class="inline-flex items-center mr-6 my-2 text-sm" style="flex: 1 0 20%;">
                                    <input type="checkbox" class="form-checkbox h-4 w-4" name="permissions[]"
                                        value="{{ $permission->getKey() }}" {!! $permission->assigned ? 'checked' : '' !!}>
                                    <span class="ml-2">{{ $permission->display_name ?? $permission->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    @endif
                    <div class="row g-3 mt-3">
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3 float-end">
                                <a href="{{ route('users.roles-assignment.index', ['model' => $modelKey]) }}"
                                    class="btn btn-light px-4">
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
