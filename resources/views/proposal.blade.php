<x-layout>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Home</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Home</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Pengaduan Masyarakat Usulan Perbaikan/Pembangunan</h5>
                </div>
                <form action="#" class="validate-me" id="validate-me" method="POST" data-validate>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kelurahan / Desa</label>
                                            <input type="hidden" id="polyline-coordinates" class="form-control" name="polyline">
                                            <select class="form-control" required>
                                                <option value="" disabled selected>Pilih Kelurahan / Desa</option>
                                                <option value="1">Aspal</option>
                                                <option value="2">Beton</option>
                                                <option value="3">Tanah</option>
                                            </select>
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
                                            <input type="text" class="form-control" placeholder="DISPERKIM KUTAI TIMUR" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Panjang</label>
                                            <input type="text" class="form-control" placeholder="1500" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Lebar</label>
                                            <input type="text" class="form-control" placeholder="8" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kondisi</label>
                                            <select class="form-control" required>
                                                <option value="" disabled selected>Pilih Jenis Kondisi</option>
                                                <option value="1">Baik</option>
                                                <option value="2">Rusak Ringan</option>
                                                <option value="3">Rusak Sedang</option>
                                                <option value="4">Rusak Berat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Yang Diadukan</label>
                                            <select class="form-control" required>
                                                <option value="" disabled selected>Pilih Yang Diadukan</option>
                                                <option value="1">Jalan</option>
                                                <option value="2">Drainase</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Pengerasan</label>
                                            <select class="form-control" required>
                                                <option value="" disabled selected>Pilih Jenis Pengerasan</option>
                                                <option value="1">Aspal</option>
                                                <option value="2">Beton</option>
                                                <option value="3">Tanah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Gambar</label>
                                            <input type="file" class="form-control" id="inputGroupFile01" required>
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
                                            <button type="button" class="btn btn-warning" onclick="undoLastPoint()">↩️ Undo Titik Terakhir</button>
                                            <button type="button" class="btn btn-danger" onclick="resetMap()">🔄 Reset Semua Titik</button>
                                            <button type="button" class="btn btn-success" onclick="finishDrawing()">✅ Selesai Menggambar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-light">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>
