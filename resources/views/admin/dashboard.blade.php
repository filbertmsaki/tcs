<x-app-layout>
    @push('scripts')
        <script>
            $(document).ready(function() {
                var ticksStyle = {
                    fontColor: '#495057',
                    fontStyle: 'bold'
                }
                var mode = 'index'
                var intersect = true
                $.ajax({
                    url: "{{ route('dashboard') }}",
                    type: "GET",
                    success: function(response) {
                        $("#successful_covers").text(response.data.successful_covers);
                        $("#pending_covers").text(response.data.pending_covers);
                        $("#fail_covers").text(response.data.fail_covers);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });

                $.ajax({
                    type: "get",
                    url: "{{ route('weekAnalytics') }}",
                    dataType: "json",
                    success: function(response) {
                        const label = response.label;
                        const this_week_cover_count = response.this_week_cover_count;
                        const last_week_cover_count = response.last_week_cover_count;

                        var ctx = document.getElementById('weekly-sales-analytics').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: label,
                                datasets: [{
                                        label: 'This Week',
                                        data: this_week_cover_count,
                                        lineTension: 0.4,
                                        borderWidth: 3,
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        pointBorderColor: 'rgba(75, 192, 192)',
                                        pointBackgroundColor: 'rgba(75, 192, 192)',
                                    },
                                    {
                                        label: 'Last Week',
                                        data: last_week_cover_count,
                                        tension: 0.4,
                                        borderWidth: 3,
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        pointBorderColor: 'rgba(54, 162, 235)',
                                        pointBackgroundColor: 'rgba(54, 162, 235)',
                                    }
                                ]
                            },
                            options: {
                                maintainAspectRatio: false,
                                plugins: {
                                    tooltip: {
                                        mode: mode,
                                        intersect: intersect,
                                        callbacks: {
                                            label: function(context) {
                                                const label = context.dataset.label || '';
                                                const value = context.parsed.y;
                                                return `${label}: ${value.toLocaleString()}`;
                                            }
                                        }
                                    },
                                    legend: {
                                        display: true
                                    }
                                },
                                hover: {
                                    mode: mode,
                                    intersect: intersect
                                },
                                scales: {
                                    x: {
                                        display: true,
                                        title: {
                                            display: true,
                                            text: 'Day (s)',
                                            font: {
                                                color: '#000000',
                                                size: 10
                                            }
                                        },
                                        ticks: {
                                            color: "black",
                                            font: {
                                                size: 14
                                            }
                                        }
                                    },
                                    y: {
                                        display: true,
                                        title: {
                                            display: true,
                                            text: 'Cover Sold',
                                            font: {
                                                color: '#000000',
                                                size: 10
                                            }
                                        },
                                        ticks: {
                                            beginAtZero: true,
                                            color: "black",
                                            font: {
                                                size: 14
                                            },
                                            callback: function(value) {
                                                if (value >= 1000000) {
                                                    value /= 1000000
                                                    value += 'M'
                                                } else if (value >= 1000) {
                                                    value /= 1000
                                                    value += 'K'
                                                }
                                                return value + ''
                                            }
                                        }
                                    }
                                }
                            }

                        });

                    },
                });



                $.ajax({
                    type: "get",
                    url: "{{ route('productAnalytics') }}",
                    dataType: "json",
                    success: function(response) {
                        const labels = response.label;
                        const product_count = response.productCount;
                        const colors = response.color;

                        var ctx = document.getElementById('cover_products').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: labels,
                                datasets: [{
                                    data: product_count,
                                    backgroundColor: colors,
                                    borderWidth: 1.5
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                plugins: {
                                    tooltip: {
                                        mode: mode,
                                        intersect: intersect,
                                        callbacks: {
                                            label: function(context) {
                                                const label = context.label || '';
                                                const value = context.parsed;
                                                return `${label}: ${value.toLocaleString()}`;
                                            }
                                        }
                                    },
                                    legend: {
                                        position: 'bottom',
                                        display: false,
                                    }
                                }
                            }
                        });

                    },
                });





            });
        </script>
    @endpush
    <div class="row ">
        <div class="col-md-4 col-sm-6">
            <div class="card radius-10 border-start border-0 border-4  border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Successful Covers</p>
                            <h4 class="my-1 text-success" id="successful_covers"></h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                class='bx bx-check'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card radius-10 border-start border-0 border-4 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Pending Covers</p>
                            <h4 class="my-1 text-warning" id="pending_covers"></h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                            <i class='bx bx-time'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card radius-10 border-start border-0 border-4 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Failed Cover</p>
                            <h4 class="my-1 text-danger" id="fail_covers"></h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                            <i class='bx bx-error'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!--end row-->

    <div class="row">
        <div class="col-12 col-lg-8 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Sales Overview</h6>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    <div class="chart-container-1">
                        <canvas id="weekly-sales-analytics"></canvas>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Trending Covers</h6>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-2">
                        <canvas id="cover_products"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end row-->

</x-app-layout>
