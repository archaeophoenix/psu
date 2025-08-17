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
                    <h5>Form Pengaduan Masyarakat Usulan Perbaikan/Pembangunan</h5>
                </div>
                <form class="validate-me" enctype="multipart/form-data" id="validate-me" method="POST" action="{{ route('proposal.approve', $mapping['id']) }}" data-validate>
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="row">
                                    <div class="card-group" style="background: #8ec3a0; padding: 18px; border-radius: 10px;">
                                        <div class="card">
                                            <div class="col-md-12">
                                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-indicators" id="carouselIndicators">
                                                        @foreach (json_decode($mapping['photo'], true) as $key => $photo)
                                                            @php
                                                                $activeIndicator = $key === 0 ? 'class="active" aria-current="true"' : '';
                                                            @endphp
                                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" {!! $activeIndicator !!} aria-label="Slide {{ $key + 1 }}"></button>
                                                        @endforeach
                                                    </div>
                                                    <div class="carousel-inner" style="border-radius: 8px;" id="carouselInner">
                                                        @foreach (json_decode($mapping['photo'], true) as $key => $photo)
                                                            @php
                                                                $activeClass = $key === 0 ? 'active' : '';
                                                            @endphp
                                                            <div class="carousel-item {{ $activeClass }}"><img src="{{ asset('public/' . $photo) }}" class="d-block w-100" alt="alt="Road Image {{ $key + 1 }}}"></div>
                                                        @endforeach
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
                                                    <div class="col-md-12" id="detailMapLeft" style="padding-left: 25px; padding-top: 8px;">
                                                        <p class="fs-4"><strong>Jalan:</strong> {{ $mapping['name'] }} </p>
                                                        <p class="fs-4"><strong>Usulan:</strong> {{ $mapping['proposal_source'] }} </p>
                                                        <p class="fs-4"><strong>Kondisi:</strong> <span class="badge bg-{{ $condition[$mapping['condition']] }} text-capitalize">{{ $mapping['condition'] }} </span></p>
                                                        <p class="fs-4"><strong>Perkerasan:</strong> <span class="badge bg-{{ $status[$mapping['status']] }} text-capitalize">{{ $mapping['paving'] }}</span></p>
                                                        <p class="fs-4"><strong>Status:</strong> <span class="badge bg-{{ $paving[$mapping['paving']] }} text-capitalize">{{ $mapping['status'] }}</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-group">
                                            <div class="card">
                                                <div class="row">
                                                    <div class="col-md-12" id="detailMapRight" style="padding-left: 25px; padding-top: 8px;">
                                                        <p class="fs-4"><strong>Kecamatan:</strong> {{  $mapping['village']['district']['name'] }}</p>
                                                        <p class="fs-4"><strong>Lokasi:</strong> {{  $mapping['village']['name'] }}</p>
                                                        <p class="fs-4"><strong>Kepadatan:</strong> <span class="badge bg-{{ $population[$mapping['population']] }} text-capitalize">{{  $mapping['population'] }}</span></p>
                                                        <p class="fs-4"><strong>Panjang:</strong> {{  $mapping['length'] }} m</p>
                                                        <p class="fs-4"><strong>Lebar:</strong> {{  $mapping['width'] }} m</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="visibility: hidden">
                                    <div class="col-md-3" style="visibility: hidden;"></div>
                                    <div class="col-md-6">
                                        <div class="card-group">
                                            @php
                                                $typeColor = $mapping['type'] === 'Jalan' ? '#a99880' : '#aee2f0';
                                                $typeIcon = $mapping['type'] === 'Jalan' ? 'fa-road' : 'fa-water text-primary';
                                            @endphp
                                            <div class="col-md-12" id="roadType">
                                                    <div class="card" style="background: {{ $typeColor }}; border-radius: 8px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-6 text-end">
                                                            <i class="fas {{ $typeIcon }} f-36"></i>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 text-capitalize fs-5">{{ $mapping['type'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="visibility: hidden;"></div>
                                    <hr style="visibility: hidden">
                                    {{-- <div class="col-md-6">
                                        <div class="card-group">
                                            <div class="card" id="planning">
                                                <iframe src="{{ asset('public/' . $mapping['planning']) }}" class="img-fluid" alt="..." style="max-height: 160px;"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-group">
                                            <div class="card" id="budget">
                                                <iframe src="{{ asset('public/' . $mapping['budget']) }}" class="img-fluid" alt="..." style="max-height: 160px;"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="visibility: hidden">
                                    <div class="col-md-6">
                                        <div class="card-group">
                                            <div class="card" style="background: #a99880; padding-top: 14px; border-radius: 8px;">
                                                <a href="{{ asset($mapping['planning']) }}" id="planning_download" target="_blank"><p class="text-center align-middle"><strong>RENCANA DESAIN</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-download"></i></p></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-group">
                                            <div class="card" style="background: #aee2f0; padding-top: 14px; border-radius: 8px;">
                                                <a href="{{ asset($mapping['budget']) }}" id="budget_download" target="_blank"><p class="text-center align-middle"><strong>ESTIMASI BIAYA</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-download"></i></p></a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Rencana Desain</label>
                                            <input name="planning" id="planning" required type="file" class="form-control pdf-input" accept="application/pdf" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Estimasi Biaya</label>
                                            <input name="budget" id="budget" required type="file" class="form-control pdf-input" accept="application/pdf" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6" id="prev-planning"></div>
                                    <div class="col-sm-6" id="prev-budget"></div>
                                </div>
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
