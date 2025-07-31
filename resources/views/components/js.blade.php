<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}',
        baseUrl: '{{ url('/') }}'
    };
    @auth
        window.user = @json(Auth::user());
    @else
        window.user = null;
    @endauth
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.13.0/leaflet-providers.min.js"></script>
<script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('assets/js/plugins/bouncer.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-validation.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datepicker-full.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('assets/js/radialbarchart.js') }}"></script>
<script src="{{ asset('assets/js/barchart.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/js/roadmap.js') }}"></script>
<script src="{{ asset('assets/js/map.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    $(document).ajaxStart(function() {
        $('#loadStaticBackdrop').modal('show');
    }).ajaxStop(function() {
        $('#loadStaticBackdrop').modal('hide');
    });
</script>
<script>
    layout_change('light');
    change_box_container('false');
    layout_rtl_change('false');
    preset_change("preset-1");
    font_change("Poppins");
</script>
