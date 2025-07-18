<x-layout>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12"></div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        @foreach ($counts as $count)
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">Total {{ $count['status'] }}</h6>
                    <h4 class="mb-3">
                        <span class="badge bg-{{ $statusColor[$count['status']] }} border border-{{ $statusColor[$count['status']] }}">
                            <i class="ti ti-{{ $statusIcon[$count['status']] }}"></i> {{ $count['total'] }}
                        </span>
                    </h4>
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-md-12 col-xl-12">
            <h5 class="mb-3">Data Desa/Kelurahan</h5>
            <div class="card tbl-card">
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="village-table" class="table table-striped table-bordered nowrap"></table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-12">
            <h5 class="mb-3">Statistik Jalan/Drainase</h5>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" id="chart-year">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-xl-6">
                            <div id="sales-report-chart"></div>
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <div id="radialBar-chart-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-layout>
