<x-layout>

    <x-slot:title>{{ $title }}</x-slot>

    <span class=" anchor" id="beranda"></span>
    <div class="page-header">
        <div class="col-md-12 bg-container" style="background-image: url('assets/images/bg.svg');background-repeat:no-repeat; background-position:center; width:100%;">
            <div class="row bg-content">
                <div class="col-md-12 col-xl-6 d-none d-sm-none d-md-block">
                    <div class="card">
                        <div class="card-body">
                            Si Peta PSU adalah Sistem Informasi Perencanaan dan Pengelolaan Infrastruktur Jalan dan Drainase yang bertujuan untuk meningkatkan efisiensi dan transparansi dalam perencanaan infrastruktur di wilayah perkotaan.
                        </div>
                    </div>
                </div>

                @foreach ($counts as $count)
                <div class="col-md-6 col-xl-3 d-none d-sm-none d-md-block">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-1">{{ $count['total'] }}</h3>
                                    <p class="text-muted mb-0 text-capitalize">{{ $count['type'] }}</p>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fas {{ $count['type'] == 'Jalan' ? 'fa-road text-secondary' : 'fa-water text-primary' }} f-36"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="row">

        <span class="anchor" id="peta"></span>
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
                                            <optgroup label="{{ $kelurahanGroup->first()['kecamatan'] }}">
                                                @foreach ($kelurahanGroup as $kelurahan)
                                                    <option slot="{{ $kelurahan['kelurahan_lat'] }} - {{ $kelurahan['kelurahan_long'] }}" value="{{ $kelurahan['kelurahan'] }}">
                                                        {{ $kelurahan['kelurahan'] }}
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
                                        <option value="" selected>Semua Jenis Pengerasan</option>
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
                                <button type="submit" class="btn btn-info" role="button"><i class="ti ti-report-search"></i> Cari</button>
                            </div>
                        </div>
                    </form>
                    <div id="mapid" class="leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; outline: none;"></div>
                </div>
            </div>
        </div>

        <span class="anchor" id="statis"></span>
        <div class="col-md-12 col-xl-12">
            <h5 class="mb-3">Daftar Perencanaan Jalan</h5>
            <div class="card tbl-card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control" id="mapping-year">
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="dt-responsive table-responsive">
                        <table id="mapping-table" class="table table-striped table-bordered nowrap"></table>
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

        <span class="anchor" id="laporan"></span>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Pengaduan Masyarakat Usulan Perbaikan/Pembangunan</h5>
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
                                                <select name="kelurahan" class="select2 form-control" required>
                                                    <option value="" disabled selected>Pilih Kelurahan / Desa</option>
                                                    @foreach ($villages as $kecamatan => $kelurahanGroup)
                                                        <optgroup label="{{ $kelurahanGroup->first()['kecamatan'] }}">
                                                            @foreach ($kelurahanGroup as $kelurahan)
                                                                <option slot="{{ $kelurahan['kelurahan_lat'] }} - {{ $kelurahan['kelurahan_long'] }}" value="{{ $kelurahan['kelurahan'] }}">
                                                                    {{ $kelurahan['kelurahan'] }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
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
                                        {{-- <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Gambar</label>
                                                <input type="file" class="form-control" id="inputGroupFile01" required>
                                            </div>
                                        </div> --}}
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

        <span class="anchor" id="info"></span>
        <div class="card-group">
            <div class="card">
                <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                    @foreach ($articles as $idx => $articleGroup)
                        <div class="carousel-item {{ $idx == 0 ? 'active' : '' }}">
                            <div class="row">

                                @foreach ($articleGroup as $article)
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <img class="img-fluid card-img-top" id="img-{{ $article['slug'] }}" src="{{ $article['img'] }}" alt="{{ $article['title'] }}">
                                            <div class="card-body">
                                                <h5 class="card-title" id="title-{{ $article['slug'] }}"">{{ $article['title'] }}</h5>
                                                <p class="card-text">{{ Str::limit($article['content'], 50) }}</p>
                                                <input type="hidden" id="content-{{ $article['slug'] }}" value="{{ $article['content'] }}">
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">
                                                    <a style="cursor: pointer" class="article" id="{{ $article['slug'] }}">Selanjutnya</a>
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <x-modal-road></x-modal-road>
    <x-modal></x-modal>

</x-layout>
