<x-layout>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <h5 class="mb-3">Daftar Pengguna</h5>
            <div class="card tbl-card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{ route('user.create') }}" class="btn btn-outline-info" role="button">
                                <i class="ti ti-users-plus f-18"></i> Tambah Pengguna</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover" id="simpletable">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="mb-1">{{ $user['username'] }}</h5>
                                                <h4 class="mb-1">{{ $user['name'] }}</h4>
                                                <p class="text-muted f-12 mb-0">{{ $user['email'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user['role'] }}</td>
                                    <td>{{ $user['status'] }}</td>
                                    <td class="text-center">
                                        <ul class="list-inline me-auto mb-0">
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                title="Edit">
                                                <a href="{{ route('user.edit', $user['id']) }}" class="avtar avtar-xs btn-link-primary"
                                                    data-bs-toggle="modal" data-bs-target="#user-edit_add-modal">
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

    <div class="modal fade" id="user-edit_add-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mb-0">Pengguna</h5>
                    <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                        <i class="ti ti-x f-20"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">UserName</label>
                                <input type="text" name="username" class="form-control" required placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required pattern="^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Masukkan email valid, contoh: user@email.com" placeholder="user@email.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" required class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <div class="flex-grow-1 text-end">
                        <button type="button" class="btn btn-link-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
