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
                                <select class="form-control">
                                    <option value="2025" selected>2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-info" role="button" href="/form-pengaduan"><i class="ti ti-report-search"></i> Cari</button>
                        </div>
                    </div>

                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article['title'] }}</td>
                                    <td>{{ Str::limit($article['content'], 50) }}</td>
                                    <td>
                                        <ul class="list-inline me-auto mb-0">
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                                <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" class="article" id={{ $article['slug'] }} data-bs-target="#customer-modal">
                                                    <i class="ti ti-eye f-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                                <a href="../application/ecom_product-add.html" class="avtar avtar-xs btn-link-primary">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
