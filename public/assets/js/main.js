    const radialChart = new RadialBarChart('#radialBar-chart-2', [], []);
    const drainRadial = new RadialBarChart('#drainase-chart-2', [], []);
    const barChart = new BarChart('#sales-report-chart', [], []);
    const drainChart = new BarChart('#drainase-report-chart', [], []);
    const baseUrl = window.Laravel.baseUrl;
    let villageTable;
    let table;
    let roadMapInstance;
    let articleTable;

function showAlert(message, type = 'success') {
    $('#content-alert').html(message);
    $('#modal-alert').modal('show');
    setTimeout(function() {
        $('#modal-alert').modal('hide');
    }, 2500);
}

function customSort(order, badge) {
    return function (data, type) {
        if (type === 'sort') {
            return order[data] ?? 999;
        }
        if (type === 'display') {
            return `<span class="badge bg-${badge[data] ?? 'secondary'} text-capitalize">${data}</span>`;
        }
        return data;
    };
}

function loadVillageTable() {
    villageTable = $('#village-table').DataTable({
        ajax: {
            url: '/village-data',
            dataSrc: 'data'
        },
        columns: [
            { data: 'kecamatan', visible: false },
            { data: 'kelurahan', title: 'Kelurahan' },
            { data: 'kelurahan_lat', title: 'Lat' },
            { data: 'kelurahan_long', title: 'Long' }
        ],
        order: [[0, 'asc']], // urut berdasarkan kecamatan
        displayLength: 10,
        drawCallback: function (settings) {
            const api = this.api();
            const rows = api.rows({ page: 'current' }).nodes();
            let lastGroup = null;

            api.column(0, { page: 'current' }).data().each(function (group, i) {
                if (lastGroup !== group) {
                    $(rows).eq(i).before(`
                        <tr class="group bg-light fw-bold text-dark">
                            <td colspan="4">${group}</td>
                        </tr>
                    `);
                    lastGroup = group;
                }
            });
        }
    });

    /*$('#village-table tbody').on('click', 'tr.group', function () {
        const currentOrder = table.order()[0];
        if (currentOrder[0] === 0 && currentOrder[1] === 'asc') {
            table.order([0, 'desc']).draw();
        } else {
            table.order([0, 'asc']).draw();
        }
    });*/
}

function loadTable(mappingYear = '') {
    table = $('#mapping-table').DataTable({
        destroy: true, // penting untuk reset table jika dipanggil ulang
        ajax: {
            url: '/mappings-data',
            data: { tahun: mappingYear } // kirim filter sebagai parameter GET
        },
        columns: [
            { data: 'prior', width: '40px', title: '#' },
            { data: 'name', width: '220px', title: 'Nama' },
            { data: 'location', width: '120px', title: 'Lokasi' },
            { data: 'district', width: '120px', title: 'Kecamatan' },
            { data: 'length', width: '90px', title: 'Panjang' },
            { data: 'width', width: '90px', title: 'Lebar' },
            { data: 'type', width: '120px', title: 'Jenis' },
            { data: 'condition', width: '120px', title: 'Kondisi',
                render: customSort({
                        'Rusak Berat': 0,
                        'Rusak Sedang': 1,
                        'Rusak Ringan': 2,
                        'Baik': 3
                    }, {
                        'Baik': 'success',
                        'Rusak Ringan': 'warning',
                        'Rusak Sedang': 'danger',
                        'Rusak Berat': 'red-900'
                    }
                )
            },
            { data: 'paving', width: '120px', title: 'Perkerasan',
                render: customSort({
                        'Tanah': 0,
                        'Beton': 1,
                        'Aspal': 2
                    },
                    {
                        'Tanah': 'danger',
                        'Beton': 'warning',
                        'Aspal': 'success'
                    }
                )
            },
            { data: 'population', width: '120px', title: 'Kepadatan Penduduk',
                render: customSort({
                        'Tinggi': 0,
                        'Sedang': 1,
                        'Rendah': 2
                    },
                    {
                        'Tinggi': 'danger',
                        'Sedang': 'warning',
                        'Rendah': 'success'
                    }
                )
            },
            { data: 'status', width: '120px', title: 'Status',
                render: customSort({
                        'Eksisting': 0,
                        'Valid': 1,
                        'Usulan': 2,
                        'Perencanaan': 3
                    },
                    {
                        'Eksisting': 'success',
                        'Valid': 'warning',
                        'Usulan': 'danger',
                        'Perencanaan' : 'red-900',
                    }
                )
            },
            { data: 'proposal_source', width: '120px', title: 'Sumber Usulan' },
            { data: 'proposal_year', width: '120px', title: 'Tahun Usulan' },
            { data: 'planning_year', width: '120px', title: 'Tahun Perencanaan' },
            { data: 'execution_year', width: '120px', title: 'Tahun Eksekusi' },
            { data: 'null', width: '90px', title: '<i class="ti ti-settings-bolt"></i>',
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    // edit = window.user ? `<a href="/pengaduan/${row.id}" style="cursor: pointer;" class="edit btn btn-icon btn-link-warning" id="${row.id}"><i class="ti ti-map-pin-cog"></i></a>` : '';
                    action = window.user && row.budget === null && row.planning === null  ? `<a href="/pengaduan/action/${row.id}" style="cursor: pointer;" class="edit btn btn-icon btn-link-primary" id="${row.id}"><i class="ti ti-map-star"></i></a>` : '';
                    return `
                        <input type="hidden" id="photo-${row.id}" value='${row.photo}'>
                        <input type="hidden" id="budget-${row.id}" value='${row.budget}'>
                        <input type="hidden" id="planning-${row.id}" value='${row.planning}'>
                        <a style="cursor: pointer;" class="detail btn btn-icon btn-link-info" data-id="${row.id}"><i class="ti ti-chart-treemap"></i></a>
                        ${action}
                    `;
                }
            }
        ],
        order: [[10, 'asc']],
        "dom": '<"top"f>rt<"bottom"lp>',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="ti ti-file-spreadsheet"></i> Excel',
                className: 'btn btn-outline-info btn-sm',
                title: 'Data Mapping',
                exportOptions: {
                    columns: ':visible:not(:last-child)',
                    modifier: {
                        search: 'applied',
                        order: 'applied'
                    }
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="ti ti-file-text"></i> PDF',
                className: 'btn btn-outline-primary btn-sm',
                title: 'Data Mapping',
                orientation: 'landscape',
                pageSize: 'A4',
                exportOptions: {
                    columns: ':visible:not(:last-child)',
                    modifier: {
                        search: 'applied',
                        order: 'applied'
                    }
                }
            }
        ],
        "initComplete": function( settings, json ) {
            var filterDiv = $('#mapping-table_filter');
            var lengthDiv = $('#mapping-table_length');
            var input = filterDiv.find('input');
            var select = lengthDiv.find('select');

            filterDiv.find('label').contents().unwrap();
            lengthDiv.find('label').contents().unwrap();
            input.removeClass('form-control-sm').addClass('form-control');
            select.removeClass().addClass('form-control');

            $('#mapping-table_length').appendTo('#mapping-table-length');
            $('#mapping-table_filter').appendTo('#mapping-table-filter');
            $('#mapping-table_paginate').appendTo('#mapping-table-paginate');

            $('#mapping-table tfoot th').each(function () {
                var title = $(this).text();
                if(title){
                    $(this).html('<input type="search" placeholder="Pencarian '+title+'" class="form-control form-control-sm" />');
                }
            });

            table.buttons().container().appendTo('#mapping-table-export');

            // Apply search per kolom
            this.api().columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change clear input', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
        },
        language: { search: '', searchPlaceholder: "Pencarian...", lengthMenu: "_MENU_" },
    });
}

function loadArticle(articleYear = '') {
    articleTable = $('#article-table').DataTable({
        destroy: true,
        ajax: {
            url: '/articles-data',
            data: { tahun: articleYear }
        },
        columns: [
            { data: 'title', title: 'Judul' },
            { data: 'content', title: 'Deskripsi',
                render: function (data, type, row) {
                    const maxLength = 20;
                    return data.length > maxLength ? data.substr(0, maxLength) + '…' : data;
                }
            },
            { data: null, title: '<i class="ti ti-settings-bolt"></i>',
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    edit = window.user ? `<a href="/artikel/${row.id}" style="cursor: pointer;" class="article-edit btn btn-icon btn-link-warning" id="${row.id}"><i class="ti ti-edit"></i></a>` : '';
                    return `
                        <img class="d-none img-fluid card-img-top" id="img-${row.slug}" src="${baseUrl}/public/${row.img}" alt="${row.title}">
                        <h5 class="d-none card-title" id="title-${row.slug}"">${row.title}</h5>
                        <input type="hidden" id="content-${row.slug}" value="${row.content}">
                        <a style="cursor: pointer" class="article btn btn-icon btn-link-info" id="${row.slug}"><i class="ti ti-eye"></i></a>
                        ${edit}
                    `;
                }
            }
        ]
    });
}

async function loadRoadMap(filters = {}) {
    try {
        const params = new URLSearchParams(filters).toString();
        const data = await $.get(`/mappings-map?${params}`);

        if (data && data.data.length !== 0) {
            const roads = data.data;

            if (roadMapInstance && roadMapInstance.isInitialized) {
                roadMapInstance.updateData(roads);

                roadMapInstance.setupFilter();
                document.getElementById("map-filter").dispatchEvent(new Event("submit"));
            } else {
                roadMapInstance = new RoadMap("mapid", roads);
                roadMapInstance.init();

                roadMapInstance.setupFilter();
                document.getElementById("map-filter").dispatchEvent(new Event("submit"));
            }
        } else {
            showAlert('Data jalan tidak ditemukan', 'danger');
        }
    } catch (error) {
        showAlert('Gagal memuat data jalan', 'danger');
        console.error("Gagal memuat data jalan:", error);
    }
}

async function loadChartData(filters = {}) {
    try {
        const params = new URLSearchParams(filters).toString();
        const data = await $.get(`chart-data?${params}`);
        const condition = ['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat'];

        radialChart.update(data.radial.static, condition);
        drainRadial.update(data.radial.dinamic, condition);

        barChart.update(data.bar.jalan, data.bar.bulan);
        drainChart.update(data.bar.drainase, data.bar.bulan);

    } catch (error) {
        showAlert('Gagal memuat data chart', 'danger');
        console.error("Gagal memuat data chart:", error);
    }
}

$(document).ready(function() {

    if($('#chart-year').length > 0){
        radialChart.render();
        drainRadial.render();
        barChart.render();
        drainChart.render();
        loadChartData();
    }

    if($('#mapping-table').length > 0){
        loadTable();
    }

    if($('#map-year').length > 0 && $('#pills-peta-tab').length == 0){
        loadRoadMap();
    }

    if($('#article-year').length > 0){
        loadArticle();
    }

    if($('#village-table').length > 0){
        loadVillageTable()
    }

    $('#map-year').on('change', function () {
        const year = $(this).val();
        loadRoadMap({
            tahun : year
        });
    });

    $('#article-year').on('change', function () {
        const year = $(this).val();
        loadArticle({
            tahun : year
        });
    });

    $('#chart-year, #chart-district, #chart-type,#chart-status').on('change', function () {
        const year = $('#chart-year').val();
        const district = $('#chart-district').val();
        const type = $('#chart-type').val();
        const status = $('#chart-status').val();
        $('.type-chart').html(type);
        $('#status-chart').html(status);
        loadChartData({
            tahun : year,
            kecamatan : district,
            type: type,
            status: status
        });
    });

    $('.article').on('click', function() {
        var slug = $(this).attr('id');
        $('#title').html($('#title-' + slug).html());
        $('#content').html($('#content-' + slug).val());
        $('#img').attr('src', $('#img-' + slug).attr('src'));
        $('#customer-modal').modal('show');
    });

    $('#article-table').on('click', '.article', function() {
        var slug = $(this).attr('id');
        $('#title').html($('#title-' + slug).html());
        $('#content').html($('#content-' + slug).val());
        $('#img').attr('src', $('#img-' + slug).attr('src'));
        $('#customer-modal').modal('show');
    });

    /*if($('.select2').length > 0){
        new Choices(document.querySelector('.select2'), {
            placeholderValue: 'Pilih Kelurahan / Desa',
            searchPlaceholderValue: 'Pilih Kelurahan / Desa'
        });
    }*/

    $('.select2').select2({
        theme: 'bootstrap-5'
    });

    $('#mapping-year').on('change', function () {
        const mappingYear = $(this).val();
        loadTable(mappingYear);
    });

    $('#mapping-table').on('click', '.detail', function () {
        const id = $(this).data('id');
        const data = $('#mapping-table').DataTable().rows().data().toArray();
        const road = data.find(item => item.id == id);

        const badgeClass = {
            'Baik': 'success',
            'Rusak Ringan': 'warning',
            'Rusak Sedang': 'danger',
            'Rusak Berat': 'red-900'
        }

        const badgePaving = {
            'Aspal': 'success',
            'Beton': 'warning',
            'Tanah': 'danger'
        }

        const badgeStatus = {
            'Usulan': 'danger',
            'Valid': 'warning',
            'Perencanaan': 'red-900',
            'Eksisting': 'success'
        }

        const badgePopulation = {
            'Tinggi': 'danger',
            'Sedang': 'warning',
            'Rendah': 'success'
        }

        $('#budget').html(``);
        $('#planning').html(``);
        $('#carouselInner').html(``);
        $('#budget_download').hide();
        $('#planning_download').hide();
        $('#carouselIndicators').html(``);
        $('#budget_download').removeAttr('href');
        $('#planning_download').removeAttr('href');

        let photos = JSON.parse(road.photo);

        photos.forEach (function(foto, index) {
            let activeIndicator = index === 0 ? 'class="active" aria-current="true"' : '';
            let activeItem = index === 0 ? 'active' : '';

            $('#carouselIndicators').append(`
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${index}" ${activeIndicator} aria-label="Slide ${index + 1}"></button>
            `);
            $('#carouselInner').append(`
                <div class="carousel-item ${activeItem}"><img src="${baseUrl}/public/${foto}" class="d-block w-100" alt="alt="Road Image ${index + 1}"></div>
            `);
        });

        if(road.budget){
            $('#budget').html(`
                <iframe src="${baseUrl}/public/${road.budget}" class="img-fluid" alt="..." style="max-height: 160px;"></iframe>
            `);
            $('#budget_download').attr('href', `${baseUrl}/public/${road.budget}`);
            $('#budget_download').show();
        }

        if(road.planning){
            $('#planning').html(`
                <iframe src="${baseUrl}/public/${road.planning}" class="img-fluid" alt="..." style="max-height: 160px;"></iframe>
            `);
            $('#planning_download').attr('href', `${baseUrl}/public/${road.planning}`);
            $('#planning_download').show();
        }

        if(road.type === 'Jalan'){
            $('#roadType').show();
            $('#riverType').hide();
        } else {
            $('#roadType').hide();
            $('#riverType').show();
        }

        $('#detailMapLeft').html(`
            <p class="fs-4"><strong>Jalan:</strong> ${road.name} </p>
            <p class="fs-4"><strong>Usulan:</strong> ${road.proposal_source} </p>
            <p class="fs-4"><strong>Kondisi:</strong> <span class="badge bg-${badgeClass[road.condition] ?? 'secondary'} text-capitalize">${road.condition} </span></p>
            <p class="fs-4"><strong>Perkerasan:</strong> <span class="badge bg-${badgePaving[road.paving] ?? 'secondary'} text-capitalize">${road.paving}</span></p>
            <p class="fs-4"><strong>Status:</strong> <span class="badge bg-${badgeStatus[road.status] ?? 'secondary'} text-capitalize">${road.status}</span></p>
        `);

        $('#detailMapRight').html(`
            <p class="fs-4"><strong>Kecamatan:</strong> ${road.district}</p>
            <p class="fs-4"><strong>Lokasi:</strong> ${road.location}</p>
            <p class="fs-4"><strong>Kepadatan:</strong> <span class="badge bg-${badgePopulation[road.population] ?? 'secondary'} text-capitalize">${road.population}</span></p>
            <p class="fs-4"><strong>Panjang:</strong> ${road.length} m</p>
            <p class="fs-4"><strong>Lebar:</strong> ${road.width} m</p>
        `);

        $('#roadDetailModal').modal('show');
    });

    $('.img-input').on('change', function () {
        $('#preview').html('');
        let files = this.files;

        if (files.length > 0) {
            $.each(files, function (i, file) {
                if (/^image\//.test(file.type)) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        let img = $('<img>')
                                    .attr('src', e.target.result)
                                    .css({
                                        width: '150px',
                                        margin: '10px',
                                        border: '1px solid #ccc',
                                        borderRadius: '8px',
                                        objectFit: 'cover'
                                    });
                        $('#preview').append(img);
                    };

                    reader.readAsDataURL(file);
                }
            });
        }
    });

    $('#district_id').on('change', function () {
        const slot = $('#district_id option:selected').attr('slot');
        const villageId = slot ? JSON.parse(slot) : '';

        $('#village_id').empty();

        if(villageId.length > 0){

            villageId.forEach(function(item) {
                $('#village_id').append(
                    $('<option>', {
                        value: item.id,
                        text: item.name,
                        slot: item.polyline
                    })
                );
            });

            $('#village_id').select2({
                placeholder: $('#village_id').data('placeholder'),
                allowClear: true,
                theme: 'bootstrap-5'
            });

            $('#village_id').trigger('change');
        }
    });

    $('.pdf-input').on('change', function (e) {
        let id = $(this).attr('id');
        const file = e.target.files[0];
        if (file && file.type === 'application/pdf') {
            const fileURL = URL.createObjectURL(file);
            $('#prev-' + id).html(`
                <iframe src="${fileURL}" width="100%"></iframe>
            `);
        } else {
            alert('File harus PDF');
        }
    });

    $('#pills-peta-tab').on('click', function() {
        if ($('#pills-peta').hasClass('active')) {
            if($('#map-year').length > 0){
                loadRoadMap();
            }
        }
    });
});
