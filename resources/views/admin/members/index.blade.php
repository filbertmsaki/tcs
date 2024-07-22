<x-app-layout>
    @push('scripts')
        <script>
            $(function() {
                'use strict';

                $(function() {
                    var datatable_url = "{{ route('members.index') }}";

                    var table = document.querySelector('#dataTableExample');
                   var datatable = $(table).DataTable({
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
                            data: function(d) {}
                        },
                        order: [
                            [6, 'DESC'],
                        ],
                        columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'membership_no',
                            name: 'membership_no'
                        }, {
                            data: 'fullname',
                            name: 'fullname'
                        }, {
                            data: 'phone',
                            name: 'phone'
                        }, {
                            data: 'email',
                            name: 'email'
                        }, {
                            data: 'gender',
                            name: 'gender',

                        }, {
                            data: 'created_at',
                            name: 'created_at',
                            type: 'num',
                            render: {
                                _: 'display',
                                sort: 'timestamp'
                            },
                            searchable: false,
                        }, {
                            data: 'action',
                            name: 'action',
                            searchable: false,
                            orderable: false
                        }]
                    });
                });

            });
        </script>
    @endpush
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Members
                </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>membership_no </th>
                                        <th>Full Name</th>
                                        <th>Phone </th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
