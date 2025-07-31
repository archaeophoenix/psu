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
                    <h5>Form Pengguna</h5>
                </div>
                <form class="validate-me" id="validate-me" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" data-validate>
                    @include('user.form')
                </form>
            </div>
        </div>
    </div>

</x-layout>
