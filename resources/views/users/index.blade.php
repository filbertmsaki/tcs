<x-app-layout>
    @push('scripts')
        <script>
            (function() {
                "use strict";
                var datatable_url = "{{ route('users.index') }}";
                var table;
                var datatable;
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
                table = document.querySelector('#users-table');
                datatable = $(table).DataTable({
                    processing: true,
                    serverSide: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    pageLength: 25,
                    paging: true,
                    ajax: {
                        url: datatable_url,
                        data: function(d) {},
                        error: function(xhr, errorType, exception) {
                            // Reload the page on error
                            // location.reload();
                        }
                    },
                    order: [
                        [1, 'DESC'],
                    ],
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false,
                            orderable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'role',
                            name: 'role'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            type: 'num',
                            render: {
                                _: 'display',
                                sort: 'timestamp'
                            },
                            searchable: false,
                        },
                        {
                            data: 'action',
                            name: 'action',
                            searchable: false,
                            orderable: false
                        }
                    ]
                });
                $(document).on('submit', 'form#users-form', function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var data = form.serialize();
                    form.find('button[type="submit"]').prop('disabled', true);
                    $.ajax({
                        method: 'POST',
                        url: $(this).attr('action'),
                        dataType: 'json',
                        data: data,
                        success: function(response) {
                            $('#users-modal').modal('hide');
                            form.find('button[type="submit"]').prop('disabled', false);
                            datatable.ajax.reload();
                            Lobibox.notify('success', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                icon: 'bx bx-check-circle',
                                sound: false,
                                msg: response.message
                            });
                            $('#users-modal').modal('hide');
                        },
                        error: function(xhr) {
                            var error = JSON.parse(xhr.responseText);
                            form.find('button[type="submit"]').prop('disabled', false);
                            Lobibox.notify('error', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                icon: 'bx bx-x-circle',
                                sound: false,
                                msg: "Sorry, " + error.message
                            });
                            $('#users-modal').modal('hide');
                        }
                    });
                });
                $(document).on('click', '.view-edit-button', function(e) {
                    e.preventDefault();
                    let dataUrl = $(this).attr('href');
                    let dataType = $(this).data('type');
                    $.ajax({
                        method: 'GET',
                        url: dataUrl,
                        success: function(response) {
                            if (dataType == 'view') {
                                disableFormElements();
                                $('#view-edit-modal-title').text('View User');
                                $('#edit-button').addClass('d-none');
                            } else {
                                enableFormElements();
                                $('#view-edit-modal-title').text('Eidt User');
                                $('#edit-button').removeClass('d-none');
                            }
                            $("#view-edit-first_name").val(response.data.first_name);
                            $("#view-edit-middle_name").val(response.data.middle_name);
                            $("#view-edit-last_name").val(response.data.last_name);
                            $("#view-edit-phone").val(response.data.phone);
                            $("#view-edit-email").val(response.data.email);
                            $("#view-edit-title").val(response.data.title);
                            $(`#view-edit-role_id option[value='${response.data.role_id}']`).prop(
                                'selected', true);
                            $(`#view-edit-status option[value='${response.data.status}']`).prop(
                                'selected', true);
                            var formUrl = $('#view-edit-users-form').attr('action');
                            let last = formUrl.split("/").pop();
                            let url = formUrl.replace(last, response.data.id);
                            $('#view-edit-users-form').attr('action', url);
                            $('#view-edit-users-modal').modal('show');
                        },
                        error: function(xhr) {
                            var error = JSON.parse(xhr.responseText);
                            Lobibox.notify('error', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                icon: 'bx bx-x-circle',
                                sound: false,
                                msg: "Sorry, " + error.message
                            });
                        }
                    });
                });

                function disableFormElements() {
                    $('#view-edit-users-form :input').prop('disabled', true);
                }
                // Function to enable all form elements
                function enableFormElements() {
                    $('#view-edit-users-form :input').prop('disabled', false);
                }
                $(document).on('submit', 'form#view-edit-users-form', function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var data = form.serialize();
                    form.find('button[type="submit"]').prop('disabled', true);
                    $.ajax({
                        method: 'POST',
                        url: $(this).attr('action'),
                        dataType: 'json',
                        data: data,
                        success: function(response) {
                            $('#edit-users-modal').modal('hide');
                            form.find('button[type="submit"]').prop('disabled', false);
                            datatable.ajax.reload();
                            Lobibox.notify('success', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                icon: 'bx bx-check-circle',
                                sound: false,
                                msg: response.message
                            });
                            $('#view-edit-users-modal').modal('hide');
                            form[0].reset();
                        },
                        error: function(xhr) {
                            var error = JSON.parse(xhr.responseText);
                            form.find('button[type="submit"]').prop('disabled', false);
                            Lobibox.notify('error', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                icon: 'bx bx-x-circle',
                                sound: false,
                                msg: "Sorry, " + error.message
                            });
                            form[0].reset();
                            $('#view-edit-users-modal').modal('hide');
                        }
                    });
                });
                $(document).on('click', '.delete_button', function(e) {
                    e.preventDefault();
                    const deleteDataLink = $(this).attr('href');
                    const token = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        text: "Are you sure you want to delete this data?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                "url": deleteDataLink,
                                "type": "POST",
                                data: {
                                    _token: token,
                                    _method: "DELETE",
                                },
                                success: function(response) {
                                    datatable.ajax.reload();
                                    Lobibox.notify('success', {
                                        pauseDelayOnHover: true,
                                        continueDelayOnInactiveTab: false,
                                        position: 'top right',
                                        icon: 'bx bx-check-circle',
                                        sound: false,
                                        msg: response.message
                                    });
                                },
                                error: function(xhr) {
                                    var error = JSON.parse(xhr.responseText);
                                    Lobibox.notify('error', {
                                        pauseDelayOnHover: true,
                                        continueDelayOnInactiveTab: false,
                                        position: 'top right',
                                        icon: 'bx bx-x-circle',
                                        sound: false,
                                        msg: "Sorry, " + error.message
                                    });
                                }
                            });
                        }
                    });
                });
            })();
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
                        Claim
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        User
                    </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                data-bs-target="#users-modal"><i class="bx bx-plus mr-1"></i>Create
                User</button>
            <div class="modal fade" id="users-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3 needs-validation" id="users-form" action="{{ route('users.store') }}"
                                method="POST" novalidate>
                                @csrf
                                <div class="col-md-4">
                                    <label for="first_name" class="form-label required">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        placeholder="Enter first name" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" name="middle_name" id="middle_name"
                                        placeholder="Enter middle name">
                                </div>
                                <div class="col-md-4">
                                    <label for="last_name" class="form-label required">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label required">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label required">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="role_id" class="form-label required">Role</label>
                                    <select id="role_id" name="role_id" class="form-select" required>
                                        <option value="">Choose role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="form-label required">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="form-label required">Status</label>
                                    <select id="status" name="status" class="form-select" required>
                                        <option value="">Choose role</option>
                                        @foreach (UserStatusEnum::cases() as $role)
                                            <option value="{{ $role->value }}">{{ $role->description() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3 float-end">
                                        <button type="reset" class="btn btn-light px-4">
                                            Reset
                                        </button>
                                        <button type="submit" id="users-submit" class="btn btn-primary px-4">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">User lists</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="users-table" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="view-edit-users-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="view-edit-modal-title">User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" id="view-edit-users-form"
                        action="{{ route('users.update', ':id') }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="col-md-4">
                            <label for="first_name" class="form-label required">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="view-edit-first_name"
                                placeholder="Enter first name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" id="view-edit-middle_name"
                                placeholder="Enter middle name">
                        </div>
                        <div class="col-md-4">
                            <label for="last_name" class="form-label required">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="view-edit-last_name"
                                placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label required">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="view-edit-phone"
                                placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label required">Email Address</label>
                            <input type="email" class="form-control" name="email" id="view-edit-email"
                                placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="role_id" class="form-label required">Role</label>
                            <select id="view-edit-role_id" name="role_id" class="form-select" required>
                                <option value="">Choose role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="title" class="form-label required">Title</label>
                            <input type="text" class="form-control" name="title" id="view-edit-title"
                                placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label required">Status</label>
                            <select id="view-edit-status" name="status" class="form-select" required>
                                <option value="">Choose role</option>
                                @foreach (UserStatusEnum::cases() as $role)
                                    <option value="{{ $role->value }}">{{ $role->description() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3 float-end">
                                <button type="reset" class="btn btn-light px-4">
                                    Reset
                                </button>
                                <button type="submit" id="edit-button" class="btn btn-primary px-4">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
