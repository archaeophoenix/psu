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
                <form class="validate-me" id="validate-me" action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data" data-validate>
                    @include('article.form')
                </form>
            </div>
        </div>
    </div>

</x-layout>
