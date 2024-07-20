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
                        Roles Assignment
                    </li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <h6 class="mb-0 text-uppercase">Roles Assignment lists</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="" class="table table-sm mb-0">
                    <thead>
                        <tr>
                            <th class="th">Id</th>
                            <th class="th">Name</th>
                            <th class="th"># Roles</th>
                            @if (config('laratrust.panel.assign_permissions_to_user'))
                                <th class="th"># Permissions</th>
                            @endif
                            <th class="th">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $user->name ?? 'The model doesn\'t have a `name` attribute' }}
                                </td>
                                <td>
                                    {{ $user->roles_count }}
                                </td>
                                @if (config('laratrust.panel.assign_permissions_to_user'))
                                    <td>
                                        {{ $user->permissions_count }}
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ route('users.roles-assignment.edit', ['roles_assignment' => $user->getKey(), 'model' => $modelKey]) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($modelKey)
                    {{ $users->appends(['model' => $modelKey])->links('laratrust::panel.pagination') }}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
