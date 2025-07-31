@csrf
<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" value="{{ old('name', $user->name ?? '') }}" name="name" class="form-control" required placeholder="Name">
            </div>
            <div class="form-group">
                <label class="form-label">UserName</label>
                <input type="text" value="{{ old('username', $user->username ?? '') }}" name="username" class="form-control" required placeholder="Name">
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" value="{{ old('email', $user->email ?? '') }}" name="email" class="form-control" required pattern="^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Masukkan email valid, contoh: user@email.com" placeholder="user@email.com">
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" required class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="form-control" placeholder="Ulangi password">
            </div>
            <div class="form-group">
                <label class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="active" {{ old('status', $user->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $user->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-outline-primary me-2">
        {{ isset($article) ? 'Update' : 'Simpan' }}
    </button>
    <button type="reset" class="btn btn-outline-secondary">Reset</button>
</div>
