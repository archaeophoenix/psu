<x-layout>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Pengaduan Usulan Perbaikan/Pembangunan</h5>
                </div>
                <form class="validate-me" enctype="multipart/form-data" id="validate-me" method="POST" action="{{ route('proposal.store') }}" data-validate>
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kecamatan</label>
                                            <input type="hidden" id="polyline-coordinates" class="form-control" name="polyline">
                                            <select name="district_id" id="district_id" class="form-control select2" required>
                                                <option value="" disabled selected>Pilih Kecamatan</option>
                                                @foreach ($districts as $district)
                                                    <option slot='{!! json_encode($district['villages']) !!}' value="{{ $district['id'] }}">{{ $district['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kelurahan / Desa</label>
                                            <select name="village_id" id="village_id" class="form-control select2" required></select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Jalan</label>
                                            <input type="text" name="name" class="form-control" placeholder="Jl Pendidikan" data-bouncer-target="#file-error-msg" required>
                                            <small id="file-error-msg" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Sumber Usulan</label>
                                            <input name="proposal_source" type="text" class="form-control" placeholder="DISPERKIM KUTAI TIMUR" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Panjang</label>
                                            <input type="text" class="form-control" name="length" placeholder="1500" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Lebar</label>
                                            <input type="text" class="form-control" name="width" placeholder="8" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kondisi</label>
                                            <select class="form-control" name="condition" required>
                                                <option value="" disabled selected>Pilih Jenis Kondisi</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Rusak Ringan">Rusak Ringan</option>
                                                <option value="Rusak Sedang">Rusak Sedang</option>
                                                <option value="Rusak Berat">Rusak Berat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kepadatan Penduduk</label>
                                            <select class="form-control" name="population" required>
                                                <option value="" disabled selected>Pilih Kepadatan Penduduk</option>
                                                <option value="Tinggi">Tinggi</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Rendah">Rendah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Yang Diadukan</label>
                                            <select class="form-control" name="type" required>
                                                <option value="" disabled selected>Pilih Yang Diadukan</option>
                                                <option value="Jalan">Jalan</option>
                                                <option value="Drainase">Drainase</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Perkerasan</label>
                                            <select class="form-control" name="paving" required>
                                                <option value="" disabled selected>Pilih Jenis Perkerasan</option>
                                                <option value="Aspal">Aspal</option>
                                                <option value="Beton">Beton</option>
                                                <option value="Tanah">Tanah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="" disabled selected>Pilih Status</option>
                                                <option value="Eksisting">Eksisting</option>
                                                <option value="Valid">Valid</option>
                                                <option value="Usulan">Usulan</option>
                                                <option value="Perencanaan">Perencanaan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Gambar</label>
                                            <input type="file" multiple class="form-control img-input" name="photo[]" accept="image/*" {{ isset($article) ? '' : 'required' }}>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Peta Perencanaan</label>
                                        <div id="mapid2" style="height: 400px; margin-bottom: 20px; position: relative;" class="leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0"></div>
                                        <div style="margin-bottom: 20px;">
                                            <button type="button" class="btn btn-outline-warning" onclick="undoLastPoint()"><i class="ti ti-history"></i> Undo Titik Terakhir</button>
                                            <button type="button" class="btn btn-outline-danger" onclick="resetMap()"><i class="ti ti-refresh-dot"></i> Reset Semua Titik</button>
                                            <button type="button" class="btn btn-outline-success" onclick="finishDrawing()"><i class="ti ti-map-pin-check"></i> Selesai Menggambar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="preview" style="margin-top: 10px; display: flex; flex-wrap: wrap;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-outline-dark">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>
