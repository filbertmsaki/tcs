<x-app-layout>
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">All Members</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <h3 class="mb-0">{{ number_format($totalMembers) }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Paid Members</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <h3 class="mb-0">{{ number_format($paidMembers) }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Not Paid Members</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <h3 class="mb-0">{{ number_format($notPaidMembers) }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- row -->



    </div>
</x-app-layout>
