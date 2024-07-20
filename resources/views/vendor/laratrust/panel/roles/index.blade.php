<x-app-layout>
    @push('styles')
        <style>
            .button-disabled {
                cursor: not-allowed !important;
            }
        </style>
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
                        Role
                    </li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <h6 class="mb-0 text-uppercase">Role lists</h6>
    <hr />
    <div class="card">
        <div class="card-header">
            <a href="{{ route('users.roles.create') }}" class="btn btn-sm btn-primary"><i
                    class="bx bx-plus mr-1"></i>Create
                Role</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="" class="table table-sm mb-0">
                    <thead>
                        <tr>
                            <th class="th">Id</th>
                            <th class="th">Display Name</th>
                            <th class="th">Name</th>
                            <th class="th"># Permissions</th>
                            <th class="th"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $role->display_name }}
                                </td>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    {{ $role->permissions_count }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if (\Laratrust\Helper::roleIsEditable($role))
                                            <a href="{{ route('users.roles.edit', $role->getKey()) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                        @else
                                            <a href="{{ route('users.roles.show', $role->getKey()) }}"
                                                class="btn btn-sm btn-primary">Details</a>
                                        @endif
                                        <form action="{{ route('users.roles.destroy', $role->getKey()) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete the record?');">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="{{ \Laratrust\Helper::roleIsDeletable($role) ? 'btn btn-sm btn-danger' : 'btn btn-sm btn-secondary button-disabled' }} ml-4"
                                                @if (!\Laratrust\Helper::roleIsDeletable($role)) disabled @endif>Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $roles->links('laratrust::panel.pagination') }}
            </div>
        </div>
    </div>
</x-app-layout>
