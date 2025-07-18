class RadialBarChart {
    constructor(selector, series = [], labels = []) {
        this.selector = selector;
        this.series = series;
        this.labels = labels;
        this.chart = null;
    }

    render() {
        const options = {
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
                        background: 'transparent'
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
            colors: ['#aee2f0', '#92c4a1', '#ffc000', '#9e6166'],
            series: this.series,
            labels: this.labels,
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
                formatter: (seriesName, opts) => {
                    return seriesName + ': ' + opts.w.globals.series[opts.seriesIndex];
                },
                itemMargin: {
                    horizontal: 1
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        show: false
                    }
                }
            }]
        };

        this.chart = new ApexCharts(document.querySelector(this.selector), options);
        this.chart.render();
    }

    update(series = [], labels = []) {
        this.chart.updateOptions({
            series,
            labels
        });
    }
}
