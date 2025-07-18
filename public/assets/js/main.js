// if($('#chart-year').length > 0){
    const radialChart = new RadialBarChart('#radialBar-chart-2', [], []);
    const barChart = new BarChart('#sales-report-chart', [], []);
// }

// if($('#village-table').length > 0){
    let villageTable;
// }

// if($('#mapping-table').length > 0){
    let table;
// }

// if($('#map-year').length > 0){
    let roadMapInstance;
// }
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
                    return `
                        <img class="d-none img-fluid card-img-top" id="img-${row.slug}" src="${row.img}" alt="{{ $article['title'] }}">
                        <h5 class="d-none card-title" id="title-${row.slug}"">${row.title}</h5>
                        <input type="hidden" id="content-${row.slug}" value="${row.content}">
                        <a style="cursor: pointer" class="article" id="${row.slug}"><i class="ti ti-eye"></i></a>
                        <a style="cursor: pointer" class="article-edit" id="${row.slug}"><i class="ti ti-edit"></i></a>
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
                // ✅ Re-render data baru
                roadMapInstance.updateData(roads);
            } else {
                // ✅ Buat instance baru dan init
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

    $('.select2').select2({
        theme: 'bootstrap-5'
    });

    $('#mapping-year').on('change', function () {
        const mappingYear = $(this).val();
        loadTable(mappingYear);
    });
});
