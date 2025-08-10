<div class="modal fade bd-example-modal-lg " data-backdrop="static" id="roadDetailModal" tabindex="-1" aria-labelledby="roadModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roadModalLabel">Detail Jalan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body" style="background: #eee;">
                <div class="row">
                    <div class="card-group" style="background: #8ec3a0; padding: 18px; border-radius: 10px;">
                        <div class="card">
                            <div class="col-md-12">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators" id="carouselIndicators"></div>
                                    <div class="carousel-inner" style="border-radius: 8px;" id="carouselInner"></div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
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
                    <div class="col-md-3" style="visibility: hidden;"></div>
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="col-md-12" id="roadType">
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
                            <div class="col-md-12" id="riverType">
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
                    <div class="col-md-3" style="visibility: hidden;"></div>
                    <hr style="visibility: hidden">
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="card" id="planning">
                                {{-- <img src="assets/images/gambar.jpg" class="img-fluid" alt="..." style="max-height: 160px;"> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="card" id="budget">
                                {{-- <img src="assets/images/anggaran.jpg" class="img-fluid" alt="..." style="max-height: 160px;"> --}}
                            </div>
                        </div>
                    </div>
                    <hr style="visibility: hidden">
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="card" style="background: #a99880; padding-top: 14px; border-radius: 8px;">
                                <a id="planning_download" target="_blank"><p class="text-center align-middle"><strong>RENCANA DESAIN</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-download"></i></p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-group">
                            <div class="card" style="background: #aee2f0; padding-top: 14px; border-radius: 8px;">
                                <a id="budget_download" target="_blank"><p class="text-center align-middle"><strong>ESTIMASI BIAYA</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-download"></i></p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
