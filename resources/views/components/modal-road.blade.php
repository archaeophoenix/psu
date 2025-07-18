<div class="modal fade bd-example-modal-lg " data-backdrop="static" id="roadDetailModal" tabindex="-1"
    aria-labelledby="roadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="left: 38%;">
            <div class="modal-header">
                <h5 class="modal-title" id="roadModalLabel">Detail Jalan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="card-group" style="background: #8ec3a0; padding: 20px; border-radius: 20px;">
                        <div class="card">
                            <div class="col-md-12">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="3" aria-label="Slide 4"></button>
                                    </div>
                                    <div class="carousel-inner" style="border-radius: 4px;">
                                        <div class="carousel-item active">
                                            <img src="assets/images/1.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/2.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/3.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/4.jpg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="visibility: hidden">
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12" id="detailMapLeft" style="padding-left: 25px; padding-top: 8px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12" id="detailMapRight" style="padding-left: 25px; padding-top: 8px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="visibility: hidden">
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="col-md-6">
                                    <div class="card" style="background: #a99880; border-radius: 8px;">
                                    <div class="row align-items-center">
                                        <div class="col-6 text-end">
                                            <i class="fas fa-road f-36"></i>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0 text-capitalize fs-5">Jalan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="background: #aee2f0; border-radius: 8px;">
                                    <div class="row align-items-center">
                                        <div class="col-6 text-end">
                                            <i class="fas fa-water text-primary f-36"></i>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0 text-capitalize fs-5">Drainase</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="visibility: hidden;">
                        <div class="card-group">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="row align-items-center">
                                        <div class="col-6 text-end">
                                            <i class="fas fa-road text-secondary f-36"></i>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-muted mb-0 text-capitalize fs-4">Jalan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="row align-items-center">
                                        <div class="col-6 text-end">
                                            <i class="fas fa-water text-primary f-36"></i>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-muted mb-0 text-capitalize fs-4">Drainase</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="visibility: hidden">
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="card">
                                <img src="assets/images/gambar.jpg" class="img-fluid" alt="..." style="max-height: 160px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="card">
                                <img src="assets/images/anggaran.jpg" class="img-fluid" alt="..." style="max-height: 160px;">
                            </div>
                        </div>
                    </div>
                    <hr style="visibility: hidden">
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="card" style="background: #a99880; padding-top: 14px; border-radius: 8px;">
                                <p class="text-center align-middle"><strong>DOKUMEN PERENCANAAN</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-download"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="card" style="background: #aee2f0; padding-top: 14px; border-radius: 8px;">
                                <p class="text-center align-middle"><strong>DOKUMEN PENGANGGARAN</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-download"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
