class RadialBarChart {
    constructor(selector, series = [], labels = []) {
        this.selector = selector;
        this.series = series;
        this.labels = labels;
        this.chart = null;
    }

    // Hitung persentase
    getPercentageSeries() {
        const total = this.series.reduce((a, b) => a + b, 0);
        return this.series.map(v => total ? ((v / total) * 100).toFixed(1) : 0);
    }

    // Hitung total semua value asli
    getTotal() {
        return this.series.reduce((a, b) => a + b, 0);
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
                        name: { show: false },
                        value: { show: false },
                        total: {
                            show: true,
                            label: 'Total',
                            formatter: () => this.getTotal()
                        }
                    }
                }
            },
            colors: ['#1890ff', '#52c41a', '#faad14', '#ff4d4f'],
            series: this.getPercentageSeries(),
            labels: this.labels,
            legend: {
                show: true,
                floating: true,
                fontSize: '14px',
                position: 'left',
                labels: {
                    useSeriesColors: true
                },
                markers: { size: 0 },
                formatter: (seriesName, opts) => {
                    const originalValue = this.series[opts.seriesIndex];
                    const total = this.getTotal();
                    const percentValue = total ? ((originalValue / total) * 100).toFixed(1) : 0;
                    return `${seriesName}: ${percentValue}% (${originalValue})`;
                }
            }
        };

        this.chart = new ApexCharts(document.querySelector(this.selector), options);
        this.chart.render();
    }

    update(series = [], labels = []) {
        this.series = series;
        this.labels = labels;

        this.chart.updateOptions({
            series: this.getPercentageSeries(),
            labels: this.labels,
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        total: {
                            formatter: () => this.getTotal()
                        }
                    }
                }
            }
        });
    }
}
