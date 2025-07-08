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
                <div class="col-md-6 col-xl-3 d-none d-sm-none d-md-block">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-1">357</h3>
                                    <p class="text-muted mb-0">Jalan</p>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fas fa-road text-secondary f-36"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 d-none d-sm-none d-md-block">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-1">420</h3>
                                    <p class="text-muted mb-0">Drainase</p>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fas fa-water text-primary f-36"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <span class="anchor" id="peta"></span>
        <div class="col-md-12 col-xl-12">
            <h5 class="mb-3">Peta</h5>
            <div class="card tbl-card">
                <div class="card-body">
                    <div id="mapid" class="leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; --darkreader-inline-outline: initial; outline: none;" data-darkreader-inline-outline=""></div>
                </div>
            </div>
        </div>

        <span class="anchor" id="statis"></span>
        <div class="col-md-12 col-xl-12">
            <h5 class="mb-3">Daftar Perencanaan Jalan</h5>
            <div class="card tbl-card">
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Lokasi</th>
                                    <th>Panjang</th>
                                    <th>Lebar</th>
                                    <th>Kondisi</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <a href="#" class="text-muted">Jl Penghubung GG anggelona ke GG Syamsudin DS Margomulyo </a> </td>
                                    <td> 41.89 </td>
                                    <td> 4.00 </td>
                                    <td>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="fas fa-circle text-success f-10 m-r-5"></i>Rusak Ringan
                                        </span>
                                    </td>
                                    <td>  Margomulyo </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="text-muted">Jl Penghubung GG anggelona ke GG Syamsudin DS Margomulyo </a> </td>
                                    <td> 84.80 </td>
                                    <td> 4.00 </td>
                                    <td>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="fas fa-circle text-success f-10 m-r-5"></i>Rusak Ringan
                                        </span>
                                    </td>
                                    <td>  Margomulyo </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="text-muted">Blok e DS Tanjung Labu </a> </td>
                                    <td> 206.35 </td>
                                    <td> 4.00 </td>
                                    <td>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="fas fa-circle text-success f-10 m-r-5"></i> Rusak Ringan
                                        </span>
                                    </td>
                                    <td>  Tanjung </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="text-muted">Jl Penghubung blok C ke blok e </a> </td>
                                    <td> 212.60 </td>
                                    <td> 0.00 </td>
                                    <td>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="fas fa-circle text-success f-10 m-r-5"></i> Rusak Sedang
                                        </span>
                                    </td>
                                    <td>  Tanjung </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="text-muted">Blok E DS Tanjung Labu </a> </td>
                                    <td> 291.47 </td>
                                    <td> 0.00 </td>
                                    <td>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="fas fa-circle text-success f-10 m-r-5"></i> Rusak Sedang
                                        </span>
                                    </td>
                                    <td>  Tanjung </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="text-muted">jl Penghubung kantor desa Margo mulyo </a> </td>
                                    <td> 204.30 </td>
                                    <td> 6.00 </td>
                                    <td>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="fas fa-circle text-success f-10 m-r-5"></i>Rusak Sedang
                                        </span>
                                    </td>
                                    <td>  Margomulyo </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="text-muted">jl Penghubung antar desa (DS Margomulyo ke DS Pulung Sari </a> </td>
                                    <td> 765.49 </td>
                                    <td> 6.00 </td>
                                    <td>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="fas fa-circle text-success f-10 m-r-5"></i>Rusak Ringan
                                        </span>
                                    </td>
                                    <td>  Margomulyo </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="text-muted">Jl Penghubung GG anggelona ke GG Syamsudin DS Margomulyo </a> </td>
                                    <td> 55.20 </td>
                                    <td> 0.00 </td>
                                    <td>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="fas fa-circle text-success f-10 m-r-5"></i>Rusak Sedang
                                        </span>
                                    </td>
                                    <td>  Margomulyo </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="text-muted">GG Syamsudin GG Margomulyo </a> </td>
                                    <td> 215.35 </td>
                                    <td> 4.00 </td>
                                    <td>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="fas fa-circle text-success f-10 m-r-5"></i>Rusak Ringan
                                        </span>
                                    </td>
                                    <td>  Margomulyo </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="text-muted">GG anggelona DS Margomulyo </a> </td>
                                    <td> 51.04 </td>
                                    <td> 4.00 </td>
                                    <td>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="fas fa-circle text-success f-10 m-r-5"></i>Rusak Ringan
                                        </span>
                                    </td>
                                    <td>  Margomulyo </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-12">
            <h5 class="mb-3">Statistik Jalan/Drainase</h5>
            <div class="card">
                <div class="card-body">
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Jalan</label>
                                            <input type="text" name="name" class="form-control" value="Anshan">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">sumber Usulan</label>
                                            <input type="text" class="form-control" value="Handgun">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Panjang</label>
                                            <input type="text" class="form-control" value="New York">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Lebar</label>
                                            <input type="text" class="form-control" value="956754">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kondisi</label>
                                            <select class="form-control">
                                                <option disabled selected>Pilih Jenis Kondisi</option>
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
                                            <select class="form-control">
                                                <option disabled selected>Pilih Yang Diadukan</option>
                                                <option value="1">Jalan</option>
                                                <option value="2">Drainase</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Jenis Pengaduan</label>
                                            <select class="form-control">
                                                <option disabled selected>Pilih Jenis Pengaduan</option>
                                                <option value="1">Jalan</option>
                                                <option value="2">Drainase</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Pengerasan</label>
                                            <select class="form-control">
                                                <option disabled selected>Pilih Jenis Pengerasan</option>
                                                <option value="1">Aspal</option>
                                                <option value="2">Beton</option>
                                                <option value="3">Tanah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">&nbsp;</label>
                                            <p>
                                                <span class="text-danger">*</span> Recommended resolution is 640*640 with file size
                                            </p>
                                            <label class="btn btn-outline-secondary" for="flupld">
                                                <i class="ti ti-upload me-2"></i> Click to Upload </label>
                                            <input type="file" id="flupld" class="d-none">
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
                </div>
            </div>
        </div>

        <span class="anchor" id="info"></span>
        <div class="card-group">
            <div class="card">
                <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <img class="img-fluid card-img-top" src="../assets/images/light-box/l3.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">
                                                <a data-bs-toggle="modal" data-bs-target="#customer-modal">Selanjutnya</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <img class="img-fluid card-img-top" src="../assets/images/light-box/l3.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">
                                                <a data-bs-toggle="modal" data-bs-target="#customer-modal">Selanjutnya</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <img class="img-fluid card-img-top" src="../assets/images/light-box/l3.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">
                                                <a data-bs-toggle="modal" data-bs-target="#customer-modal">Selanjutnya</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <img class="img-fluid card-img-top" src="../assets/images/light-box/l3.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">
                                                <a data-bs-toggle="modal" data-bs-target="#customer-modal">Selanjutnya</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <img class="img-fluid card-img-top" src="../assets/images/light-box/l3.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">
                                                <a data-bs-toggle="modal" data-bs-target="#customer-modal">Selanjutnya</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <img class="img-fluid card-img-top" src="../assets/images/light-box/l3.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">
                                                <a data-bs-toggle="modal" data-bs-target="#customer-modal">Selanjutnya</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    <div class="modal fade" id="customer-modal" data-bs-keyboard="false" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="mb-0">Customer Details</h5>
                    <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="modal">
                        <i class="ti ti-x f-20"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body position-relative">
                                    <div class="text-center mt-3">
                                        <div class="chat-avtar d-inline-flex mx-auto">
                                            <img class=" img-fluid " src="../assets/images/light-box/l3.jpg" alt="User image">
                                        </div>
                                        <hr class="my-3 border border-secondary-subtle">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">

                            <div class="card">
                                <div class="card-header">
                                    <h5>Card Title</h5>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">Hello, I’m Aaron Poole Manufacturing Director based in international company, Void jiidki me na fep juih ced gihhiwi launke cu mig tujum peodpo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
