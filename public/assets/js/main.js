    const radialChart = new RadialBarChart('#radialBar-chart-2', [], []);
    const barChart = new BarChart('#sales-report-chart', [], []);
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
            { data: 'type', title: 'Jenis' },
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
            { data: 'population', title: 'Kepadatan Penduduk',

                render: function (data, type, row) {
                    let badgeClass = 'secondary';

                    switch (data) {
                        case 'Tinggi':
                            badgeClass = 'danger';
                            break;
                        case 'Sedang':
                            badgeClass = 'warning';
                            break;
                        case 'Rendah':
                            badgeClass = 'success';
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
            { data: 'null', title: '<i class="ti ti-settings-bolt"></i>',
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
        ]
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
            } else {
                roadMapInstance = new RoadMap("mapid", roads);
                roadMapInstance.init();
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
        showAlert('Gagal memuat data chart', 'danger');
        console.error("Gagal memuat data chart:", error);
    }
}

$(document).ready(function() {

    if($('#chart-year').length > 0){
        radialChart.render();
        barChart.render();
        loadChartData();
    }

    if($('#mapping-table').length > 0){
        loadTable();
    }

    if($('#map-year').length > 0){
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

    $('#chart-year').on('change', function () {
        const chartYear = $(this).val();
        loadChartData({
            tahun : year
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

        let badgeClass = 'secondary';
        let badgeStatus = 'secondary';
        let badgePaving = 'secondary';
        let badgePopulation = 'secondary';

        switch (road.condition) {
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

        switch (road.status) {
            case 'Usulan':
                badgeStatus = 'red-900';
                break;
            case 'Valid':
                badgeStatus = 'warning';
                break;
            case 'Perencanaan':
                badgeStatus = 'danger';
                break;
            case 'Eksisting':
                badgeStatus = 'success';
                break;
        }

        switch (road.paving) {
            case 'Aspal':
                badgePaving = 'success';
                break;
            case 'Beton':
                badgePaving = 'warning';
                break;
            case 'Tanah':
                badgePaving = 'danger';
                break;
        }

        switch (road.population) {
            case 'Tinggi':
                badgePopulation = 'danger';
                break;
            case 'Sedang':
                badgePopulation = 'warning';
                break;
            case 'Rendah':
                badgePopulation = 'success';
                break;
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
            <p class="fs-4"><strong>Kondisi:</strong> <span class="badge bg-${badgeClass} text-capitalize">${road.condition} </span></p>
            <p class="fs-4"><strong>Perkerasan:</strong> <span class="badge bg-${badgePaving} text-capitalize">${road.paving}</span></p>
            <p class="fs-4"><strong>Status:</strong> <span class="badge bg-${badgeStatus} text-capitalize">${road.status}</span></p>
        `);

        $('#detailMapRight').html(`
            <p class="fs-4"><strong>Kecamatan:</strong> ${road.district}</p>
            <p class="fs-4"><strong>Lokasi:</strong> ${road.location}</p>
            <p class="fs-4"><strong>Kepadatan:</strong> <span class="badge bg-${badgePopulation} text-capitalize">${road.population}</span></p>
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
});
