<x-app-layout>
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
                        Permission
                    </li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <h6 class="mb-0 text-uppercase">Permission lists</h6>
    <hr />
    <div class="card">

        @if (config('laratrust.panel.create_permissions'))
            <div class="card-header">
                <a href="{{ route('users.permissions.create') }}" class="btn btn-sm btn-primary"><i
                        class="bx bx-plus mr-1"></i>Create
                    Permission</a>
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table id="" class="table table-sm mb-0">
                    <thead>
                        <tr>
                            <th class="th">Id</th>
                            <th class="th">Name/Code</th>
                            <th class="th">Display Name</th>
                            <th class="th">Description</th>
                            <th class="th"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td class="td text-sm leading-5 text-gray-900">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="td text-sm leading-5 text-gray-900">
                                    {{ $permission->name }}
                                </td>
                                <td class="td text-sm leading-5 text-gray-900">
                                    {{ $permission->display_name }}
                                </td>
                                <td class="td text-sm leading-5 text-gray-900">
                                    {{ $permission->description }}
                                </td>
                                <td>
                                    <a href="{{ route('users.permissions.edit', $permission->getKey()) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $permissions->links('laratrust::panel.pagination') }}
            </div>
        </div>
    </div>
</x-app-layout>
