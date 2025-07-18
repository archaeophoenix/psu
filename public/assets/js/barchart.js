class BarChart {
    constructor(selector, series = [], categories = []) {
        this.selector = selector;
        this.series = series;
        this.categories = categories;
        this.chart = null;
    }

    render() {
        const options = {
            chart: {
                type: 'bar',
                height: 430,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '30%',
                    borderRadius: 4
                }
            },
            stroke: {
                show: true,
                width: 15,
                colors: ['transparent']
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                show: true,
                fontFamily: `'Public Sans', sans-serif`,
                offsetX: 10,
                offsetY: 10,
                labels: {
                    useSeriesColors: false
                },
                markers: {
                    width: 10,
                    height: 10,
                    radius: '50%',
                    offsexX: 2,
                    offsexY: 2
                },
                itemMargin: {
                    horizontal: 15,
                    vertical: 5
                }
            },
            colors: ['#aee2f0', '#ffc000'],
            series: this.series,
            xaxis: {
                categories: this.categories
            }
        };

        this.chart = new ApexCharts(document.querySelector(this.selector), options);
        this.chart.render();
    }

    update(series = [], categories = []) {
        this.chart.updateOptions({
            series,
            xaxis: { categories }
        });
    }
}
