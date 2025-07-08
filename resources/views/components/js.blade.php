<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/plugins/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard-default.js"></script>
<script src="assets/js/plugins/popper.min.js"></script>
<script src="assets/js/plugins/simplebar.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/fonts/custom-font.js"></script>
<script src="assets/js/pcoded.js"></script>
<script src="assets/js/plugins/feather.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/js/map-road.js"></script>
<script src="assets/js/map.js"></script>
<script>
    layout_change('light');
    change_box_container('false');
    layout_rtl_change('false');
    preset_change("preset-1");
    font_change("Public-Sans");
</script>
<script>
    $('#simpletable').DataTable();

    var options_radialbar_2 = {
        chart: {
            height: 350,
            type: 'radialBar'
        },
        plotOptions: {
            radialBar: {
                offsetY: -30,
                startAngle: 0,
                endAngle: 270,
                hollow: {
                    margin: 5,
                    size: '30%',
                    background: 'transparent',
                    image: undefined
                },
                dataLabels: {
                    name: {
                        show: false
                    },
                    value: {
                        show: false
                    }
                }
            }
        },
        colors: ['#1890ff', '#52c41a', '#faad14', '#ff4d4f'],
        series: [76, 67, 61, 90],
        labels: ['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat'],
        legend: {
            show: true,
            floating: true,
            fontSize: '14px',
            position: 'left',
            offsetX: 0,
            offsetY: 0,
            labels: {
                useSeriesColors: true
            },
            markers: {
                size: 0
            },
            formatter: function (seriesName, opts) {
                return seriesName + ':  ' + opts.w.globals.series[opts.seriesIndex];
            },
            itemMargin: {
                horizontal: 1
            }
        },
        responsive: [ {
            breakpoint: 480,
            options: {
                legend: {
                    show: false
                }
            }
        } ]
    };
    var chart_radialbar_2 = new ApexCharts(document.querySelector('#radialBar-chart-2'), options_radialbar_2);
    chart_radialbar_2.render();
</script>
