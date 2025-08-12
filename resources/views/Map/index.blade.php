<x-layout>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <h5 class="mb-3">Peta</h5>
            <div class="card tbl-card">
                <div class="card-body">
                    <form id="map-filter">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" id="map-year">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select name="location" id="location" class="select2 form-control">
                                        <option value="" selected>Pilih semua Kelurahan / Desa</option>
                                        @foreach ($villages as $kecamatan => $kelurahanGroup)
                                            <optgroup label="{{ $kelurahanGroup['name'] }}">
                                                @foreach ($kelurahanGroup['villages'] as $kelurahan)
                                                    <option slot="{{ $kelurahan['polyline'] }}" value="{{ $kelurahan['id'] }}">
                                                        {{ $kelurahan['name'] }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" name="condition" id="condition">
                                        <option value="" selected>Semua Kondisi</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak Ringan">Rusak Ringan</option>
                                        <option value="Rusak Sedang">Rusak Sedang</option>
                                        <option value="Rusak Berat">Rusak Berat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" name="type" id="type">
                                        <option value="Jalan" selected>Jalan</option>
                                        <option value="Drainase">Drainase</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" name="paving" id="paving">
                                        <option value="" selected>Semua Jenis Perkerasan</option>
                                        <option value="Aspal">Aspal</option>
                                        <option value="Beton">Beton</option>
                                        <option value="Tanah">Tanah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" name="status" id="status">
                                        <option value="" selected>Semua Status</option>
                                        <option value="Usulan">Usulan</option>
                                        <option value="Valid">Valid</option>
                                        <option value="Perencanaan">Perencanaan</option>
                                        <option value="Eksisting">Eksisting</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-outline-info" role="button"><i class="ti ti-report-search"></i> Cari</button>
                            </div>
                        </div>
                    </form>
                    <div id="mapid" class="leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; outline: none;"></div>
                </div>
            </div>
        </div>
    </div>

    <x-modal-road></x-modal-road>

</x-layout>
