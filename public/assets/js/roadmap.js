class RoadMap {
    constructor(mapId, roadData = null) {
        this.mapId = mapId;
        this.roadData = roadData;
        this.map = null;
        this.legend = null;
        this.isInitialized = false;
    }

    init() {
        this.initMap();
        this.addBaseTile();
        this.addLegend();
        this.renderAllPolylines();
        this.setupFilter();
        this.isInitialized = true;
    }

    updateData(newData) {
        this.roadData = newData;
        if (this.isInitialized) {
            this.clearMapLayers();
            this.renderAllPolylines();
        }
    }

    initMap() {
        this.map = L.map(this.mapId).setView([0.6461, 117.2578], 12);
    }

    addBaseTile() {
        // Opsi tile bawaan (OpenStreetMap)
        const osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors',
            maxZoom: 25
        });

        // Opsi satelit dari Esri
        const esri = L.tileLayer.provider('Esri.WorldImagery');

        esri.addTo(this.map);

        // Simpan baseLayers jika butuh switcher
        this.baseLayers = {
            "OpenStreetMap": osm,
            "Esri Satellite": esri
        };

        // Tambahkan layer control (opsional)
        L.control.layers(this.baseLayers).addTo(this.map);
    }

    getColorByCondition(condition) {
        switch (condition) {
            case "Baik": return '#4CAF50';
            case "Rusak Ringan": return '#FFB300';
            case "Rusak Sedang": return '#E64A19';
            case "Rusak Berat": return '#D50000';
            default: return '#6c757d';
        }
    }

    parseCoordinates(polylineData) {
        if (Array.isArray(polylineData)) return polylineData;
        try {
            return JSON.parse(polylineData);
        } catch (e) {
            console.warn("Gagal parsing polyline:", polylineData);
            return null;
        }
    }

    renderAllPolylines() {
        this.roadData.forEach(road => this.drawRoad(road));
    }

    drawRoad(road) {
        const coordinates = this.parseCoordinates(road.polyline);
        if (!coordinates || coordinates.length <= 1) return;

        const color = this.getColorByCondition(road.condition);

        const polyline = L.polyline(coordinates, {
            color: color,
            weight: 4,
            opacity: 0.8
        }).addTo(this.map);

        const popupContent = `
            <strong>${road.name ?? 'Jalan Tanpa Nama'}</strong><br>
            Panjang: ${road.length} m<br>
            Lebar: ${road.width} m<br>
            Kondisi: ${road.condition}<br>
            Perkerasan: ${road.paving}
        `;
        // polyline.bindPopup(popupContent);

        polyline.on('click', () => {
            // Isi data ke modal
            $('#detailMapLeft').html(`
                <p class="fs-4"><strong>Jalan:</strong> ${road.name} </p>
                <p class="fs-4"><strong>Kondisi:</strong> ${road.condition}</p>
                <p class="fs-4"><strong>Perkerasan:</strong> ${road.paving}</p>
            `);
            $('#detailMapRight').html(`
                <p class="fs-4"><strong>Lokasi:</strong> ${road.location}</p>
                <p class="fs-4"><strong>Panjang:</strong> ${road.length} m</p>
                <p class="fs-4"><strong>Lebar:</strong> ${road.width} m</p>
            `);
            $('#roadDetailModal').modal('show');
        });
    }

    addLegend() {
        this.legend = L.control({ position: 'bottomleft' });
        this.legend.onAdd = () => {
            const div = L.DomUtil.create('div', 'info legend');
            const kondisi = ['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat'];
            kondisi.forEach(k => {
                const color = this.getColorByCondition(k);
                div.innerHTML += `
                    <i style="background:${color}; width: 14px; height: 14px; display: inline-block; margin-right: 6px; border-radius: 2px;"></i> <b style="color:#fff" >${k}</b> <br>
                `;
            });
            return div;
        };
        this.legend.addTo(this.map);
    }

    clearMapLayers() {
        this.map.eachLayer(layer => {
            if (layer instanceof L.Polyline || layer instanceof L.Marker || layer instanceof L.CircleMarker) {
                this.map.removeLayer(layer);
            }
        });
        this.addBaseTile();
    }

    setupFilter() {
        const form = document.getElementById("map-filter");
        if (!form) return;

        form.addEventListener("submit", (e) => {
            e.preventDefault();

            // Ambil semua input filter
            const location = (document.querySelector('#location')?.value ?? '').trim().toLowerCase();
            const condition = (document.querySelector('#condition')?.value ?? '').trim().toLowerCase();
            const type = (document.querySelector('#type')?.value ?? '').trim().toLowerCase();
            const paving = (document.querySelector('#paving')?.value ?? '').trim().toLowerCase();
            const status = (document.querySelector('#status')?.value ?? '').trim().toLowerCase();

            this.clearMapLayers();

            this.roadData.forEach(road => {
                try {
                    const roadLocation = (road.location ?? '').trim().toLowerCase();
                    const roadCondition = (road.condition ?? '').trim().toLowerCase();
                    const roadType = (road.type ?? '').trim().toLowerCase();
                    const roadPaving = (road.paving ?? '').trim().toLowerCase();
                    const roadStatus = (road.status ?? '').trim().toLowerCase();

                    const matchLocation = !location || roadLocation === location;
                    const matchCondition = !condition || roadCondition === condition;
                    const matchType = !type || roadType === type;
                    const matchPaving = !paving || roadPaving === paving;
                    const matchStatus = !status || roadStatus === status;

                    if (matchLocation && matchCondition && matchType && matchPaving && matchStatus) {
                        this.drawRoad(road);
                    }
                } catch (err) {
                    console.warn("Gagal memfilter road:", road, err);
                }
            });
        });
    }
}
