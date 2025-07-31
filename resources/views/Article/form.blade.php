@csrf
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Judul Artikel</label>
                <input type="text" name="title" class="form-control"
                    value="{{ old('title', $article->title ?? '') }}"
                    placeholder="Judul Artikel"
                    data-bouncer-target="#title-error-msg"
                    required>
                <small id="title-error-msg" class="form-text text-danger"></small>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="content" class="form-control"
                        cols="30" rows="10"
                        placeholder="Deskripsi Artikel"
                        required>{{ old('content', $article->content ?? '') }}</textarea>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control img-input" name="img" accept="image/*" {{ isset($article) ? '' : 'required' }}>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="preview" style="margin-top: 10px; display: flex; flex-wrap: wrap;">
                        @if(isset($article) && $article->img)
                            <img src="{{ asset($article->img) }}" alt="Preview Image" class="img-fluid img-preview" style=" width: 150px; margin: 10px; border: 1px solid #ccc; borderRadius: 8px; objectFit: cover">
                        @endif
                    </div>
                </div>
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
