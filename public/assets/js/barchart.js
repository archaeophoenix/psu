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
                height: 500,
                type: 'bar',
                stacked: true
            },
            plotOptions: {
                bar: {
                    horizontal: false
                }
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            fill: {
                opacity: 1
            },

            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40
            },
            colors: ['#9e6166', '#ffc000', '#92c4a1', '#aee2f0'],
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
