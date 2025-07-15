<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/plugins/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard-default.js"></script>
<script src="assets/js/plugins/popper.min.js"></script>
<script src="assets/js/plugins/simplebar.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/fonts/custom-font.js"></script>
<script src="assets/js/pcoded.js"></script>
<script src="assets/js/plugins/feather.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/js/plugins/bouncer.min.js"></script>
<script src="assets/js/pages/form-validation.js"></script>
<script src="assets/js/plugins/datepicker-full.min.js"></script>
<script src="assets/js/radialbarchart.js"></script>
<script src="assets/js/barchart.js"></script>
<script src="assets/js/select2.js"></script>
<script src="assets/js/roadmap.js"></script>
<script src="assets/js/map.js"></script>
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
    font_change("Public-Sans");
</script>
<script>
    let table;

    function loadTable(mappingYear = '') {
        table = $('#mapping-table').DataTable({
            destroy: true, // penting untuk reset table jika dipanggil ulang
            ajax: {
                url: '/mappings-data',
                data: { tahun: mappingYear } // kirim filter sebagai parameter GET
            },
            columns: [
                { data: 'name', title: 'Name' },
                { data: 'location', title: 'Lokasi' },
                { data: 'length', title: 'Panjang' },
                { data: 'width', title: 'Lebar' },
                { data: 'condition', title: 'Kondisi',
                    render: function (data, type, row) {
                        let badgeClass = 'secondary';

                        switch (data) {
                            case 'Baik':
                                badgeClass = 'success';
                                break;
                            case 'Rusak Ringan':
                                badgeClass = 'warning';
                                break;
                            case 'Rusak Sedang':
                                badgeClass = 'danger';
                                break;
                            case 'Rusak Berat':
                                badgeClass = 'red-900';
                                break;
                        }
                        return `<span class="badge bg-${badgeClass} text-capitalize">${data}</span>`;
                    }
                },
                { data: 'proposal_source', title: 'Sumber Usulan' },
                { data: 'proposal_year', title: 'Tahun Usulan' },
                { data: 'planning_year', title: 'Tahun Perencanaan' },
                { data: 'execution_year', title: 'Tahun Eksekusi' },
                { data: 'paving', title: 'Perkerasan',

                    render: function (data, type, row) {

                        let badgeClass = 'secondary';

                        switch (data) {
                            case 'Aspal':
                                badgeClass = 'success';
                                break;
                            case 'Beton':
                                badgeClass = 'warning';
                                break;
                            case 'Tanah':
                                badgeClass = 'danger';
                                break;
                        }
                        return `<span class="badge bg-${badgeClass} text-capitalize">${data}</span>`;
                    }
                },
                { data: 'status', title: 'Status',
                    render: function (data, type, row) {

                        let badgeClass = 'secondary';

                        switch (data) {
                            case 'Usulan':
                                badgeClass = 'red-900';
                                break;
                            case 'Valid':
                                badgeClass = 'warning';
                                break;
                            case 'Perencanaan':
                                badgeClass = 'danger';
                                break;
                            case 'Eksisting':
                                badgeClass = 'success';
                                break;
                        }
                        return `<span class="badge bg-${badgeClass} text-capitalize">${data}</span>`;
                    }
                },
                { data: null, title: '<i class="ti ti-settings-bolt"></i>',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        return `
                            <a href="#" class="" data-id="${row.id}"><i class="ti ti-map-pin-cog"></i></a>
                            <a href="#" class="" data-id="${row.id}"><i class="ti ti-chart-treemap"></i></a>
                        `;
                    }
                }
            ]
        });
    }

    document.addEventListener("DOMContentLoaded", function() {

        async function loadRoadMap(filters = {}) {
            try {
                const params = new URLSearchParams(filters).toString();
                const response = await fetch(`/mappings-map?${params}`);
                const data = await response.json();

                if (data && data.roads) {
                    const roads = data.roads;
                    const roadMap = new RoadMap("mapid", roads);
                    roadMap.init();
                } else {
                    console.error("Data jalan tidak ditemukan");
                }
            } catch (error) {
                console.error("Gagal memuat data jalan:", error);
            }
        }

        async function loadChartData(filters = {}) {
            try {
                const params = new URLSearchParams(filters).toString();
                const response = await fetch(`chart-data?${params}`);
                const data = await response.json();

                radialChart.update(
                    data.radial,
                    ['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat']
                );

                barChart.update(
                    [
                        { name: 'Jalan', data: data.bar.jalan },
                        { name: 'Drainase', data: data.bar.drainase }
                    ],
                    data.bar.bulan
                );

            } catch (error) {
                console.error("Gagal memuat data chart:", error);
            }
        }


        const roads = JSON.parse(document.querySelector('#roads').value);
        const roadMap = new RoadMap("mapid", roads);
        roadMap.init();

        const radialChart = new RadialBarChart('#radialBar-chart-2', [], []);
        const barChart = new BarChart('#sales-report-chart', [], []);

        radialChart.render();
        barChart.render();

        $('#map-year').on('change', function () {
            const chartYear = $(this).val();
            loadChartData({
                tahun : year
            });
        });

        loadChartData();

        $('#chart-year').on('change', function () {
            const chartYear = $(this).val();
            loadChartData({
                tahun : year
            });
        });

    });

    $(document).ready(function() {
        loadTable();

        $('.article').on('click', function() {
            var slug = $(this).attr('id');

            $('#title').html($('#title-' + slug).html());
            $('#content').html($('#content-' + slug).val());
            $('#img').attr('src', $('#img-' + slug).attr('src'));
            $('#customer-modal').modal('show');

        });

        $('.select2').select2({
            theme: 'bootstrap-5'
        });

        $('#mapping-year').on('change', function () {
            const mappingYear = $(this).val();
            loadTable(mappingYear);
        });
    });
</script>
