<x-layout>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Artikel</h5>
                </div>
                <form action="#" class="validate-me" id="validate-me" method="POST" data-validate>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Judul</label>
                                            <input type="text" name="name" class="form-control" placeholder="Judul Artikel" data-bouncer-target="#file-error-msg" required>
                                            <small id="file-error-msg" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Gambar</label>
                                            <input type="file" class="form-control" id="inputGroupFile01" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea class="form-control" rows="5" placeholder="DISPERKIM KUTAI TIMUR" required></textarea>
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
