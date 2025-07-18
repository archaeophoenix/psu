<x-layout>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <h5 class="mb-3">Daftar Artikel</h5>
            <div class="card tbl-card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-4">
                            <a class="btn btn-primary" role="button" href="/form-artikel"><i class="ti ti-route-2"></i> Buat Artikel</a>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control" id="article-year">
                                @foreach ($years as $year)
                                    <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="dt-responsive table-responsive">
                        <table id="article-table" class="table table-striped table-bordered nowrap"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>

</x-layout>
