class RoadMap {
    constructor(mapId, roadData = null) {
        this.mapId = mapId;
        this.roadData = roadData;
        this.map = null;
        this.legend = null;
        this.isInitialized = false;
        this.baseLayers = null;
        this.layers = null;
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

    invalidate() {
        if (this.map) {
            this.map.invalidateSize();
        }
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
        if(this.layers){
            this.map.removeControl(this.layers);
        }
        this.layers = L.control.layers(this.baseLayers).addTo(this.map);
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
            weight: 8,
            opacity: 0.9
        }).addTo(this.map);

        const popupContent = `
            <strong>${road.name ?? 'Jalan Tanpa Nama'}</strong><br>
            Panjang: ${road.length} m<br>
            Lebar: ${road.width} m<br>
            Kondisi: ${road.condition}<br>
            Perkerasan: ${road.paving}
        `;
        polyline.bindPopup(popupContent);

        polyline.on('click', () => {

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

        polyline.on('mouseover', function (e) {
            this.openPopup(e.latlng);
        });
        polyline.on('mouseout', function () {
            this.closePopup();
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
                    const roadLocation = (road.village_id ?? '').trim().toLowerCase();
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

            const slot = $('#location option:selected').attr('slot');
            const polyline = slot ? slot.split(',') : '';
            if(polyline.length){
                const lat = parseFloat(polyline[0]);
                const lng = parseFloat(polyline[1]);
                this.map.setView([lat, lng], 12);
            }
        });
    }
}
