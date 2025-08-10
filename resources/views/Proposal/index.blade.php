<x-layout>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <h5 class="mb-3">Daftar Perencanaan Jalan</h5>
            <div class="card tbl-card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <a class="btn btn-outline-primary" role="button" href="{{ route('proposal.create') }}"><i class="ti ti-route-2"></i> Buat Pengaduan</a>
                            {{-- <button class="btn btn-outline-success" role="button" href="/pengaduan/create"><i class="ti ti-report-analytics"></i> Buat Laporan</button> --}}
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control" id="mapping-year">
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group" id="mapping-table-length"></div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group" id="mapping-table-filter"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="mapping-table" class="table table-striped table-bordered nowrap"></table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">&nbsp;</div>
                        <div class="col-sm-4">
                            <div class="form-group" id="mapping-table-paginate"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal-road></x-modal-road>

</x-layout>
