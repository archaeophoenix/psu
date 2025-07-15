const roads = JSON.parse(document.querySelector('#roads').value);
document.addEventListener("DOMContentLoaded", function() {
    var map = L.map('mapid').setView([0.6461, 117.2578], 12);
     // Base map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    }).addTo(map);
     // Membuat kontrol legend
    var legend = L.control({
        position: 'bottomleft'
    });
    legend.onAdd = function(map) {
        var div = L.DomUtil.create('div', 'info legend');
        var kondisi = ['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat'];
        // Loop untuk membuat item legend
        kondisi.forEach(function(k, index) {
            var color = getColorByCondition(k);
            div.innerHTML += `
                <i style="background:${color}; width: 14px; height: 14px; display: inline-block; margin-right: 6px; border-radius: 2px;"></i> ${k} <br>
            `;
        });
        return div;
    };
     // Tambahkan ke peta
    legend.addTo(map);
    roads.forEach(function(road) {
        try {
            if (road.polyline) {
                const coordinates = JSON.parse(road.polyline);
                if (coordinates && coordinates.length > 1) {
                     // Warna berdasarkan kondisi
                    let color = '#6c757d'; // default
                    color = getColorByCondition(road.condition);
                    const polyline = L.polyline(coordinates, {
                        color: color,
                        weight: 4,
                        opacity: 0.8
                    }).addTo(map);
                     // Info popup saat diklik
                    const popupContent = `
                        <strong>${road.name ?? 'Jalan Tanpa Nama'}</strong>
                        <br> Panjang: ${road.length} m
                        <br> Lebar: ${road.width} m
                        <br> Kondisi: ${road.condition}
                        <br> Perkerasan: ${road.paving}
                    `;
                    polyline.bindPopup(popupContent);
                    //  // Tambahkan marker di titik tengah jalur
                    // const midpointIndex = Math.floor(coordinates.length / 2);
                    // const midpoint = coordinates[midpointIndex];
                    //  // const marker = L.marker(midpoint).addTo(map);
                    // var marker = L.circleMarker(midpoint, {
                    //     radius: 6,
                    //     fillColor: color,
                    //     color: '#000',
                    //     weight: 1,
                    //     opacity: 1,
                    //     fillOpacity: 0.8
                    // }).addTo(map);
                    // marker.bindPopup(popupContent);
                }
            }
        } catch (e) {
            console.warn("Gagal parsing polyline:", road.polyline);
        }
    });

    // Fungsi untuk mendapatkan warna berdasarkan kondisi
    function getColorByCondition(kondisi) {
        switch (kondisi) {
            case "Baik":
                 return '#4CAF50'; // hijau
            case "Rusak Ringan":
                 return '#FFB300'; // kuning
            case "Rusak Sedang":
                 return '#E64A19'; // oranye
            case "Rusak Berat":
                 return '#D50000'; // merah
            default:
                 return '#6c757d'; // abu-abu netral (jika tak dikenal)
        }
    }

    function parseCoordinates(polylineData) {
        if (Array.isArray(polylineData)) {
            return polylineData;
        }
        try {
            return JSON.parse(polylineData);
        } catch (e) {
            console.warn("Gagal parsing polyline:", polylineData);
            return null;
        }
    }
     // Filter berdasarkan input
    document.getElementById("map-filter").addEventListener("submit", function(e) {
        e.preventDefault(); // cegah reload halaman
        const kecamatan = document.querySelector('[name="kecamatan"]').value.toLowerCase();
        const perkerasan = document.querySelector('[name="perkerasan"]').value.toLowerCase();
        const kerusakan = document.querySelector('[name="kerusakan"]').value.toLowerCase();
        const tahun = document.querySelector('[name="tahun"]').value;
         // Hapus semua layer sebelumnya
        map.eachLayer(layer => {
            if (layer instanceof L.Polyline || layer instanceof L.Marker || layer instanceof L.CircleMarker) {
                map.removeLayer(layer);
            }
        });
        roads.forEach(function(road) {
            try {
                if (!road.polyline) return;
                 // const matchKec = !kecamatan || (road.kecamatan?.toLowerCase().includes(kecamatan));
                const matchKec = true;
                const matchPerkerasan = !perkerasan || road.paving === perkerasan;
                const matchKerusakan = !kerusakan || road.condition === kerusakan;
                const matchTahun = !tahun || (road.proposal_year == tahun);
                if (matchKec && matchPerkerasan && matchKerusakan && matchTahun) {
                    const coordinates = parseCoordinates(road.polyline);
                    if (!coordinates || coordinates.length <= 1) return;
                    if (coordinates.length <= 1) return;
                    const color = getColorByCondition(road.condition);
                    const polyline = L.polyline(coordinates, {
                        color: color,
                        weight: 4,
                        opacity: 0.8
                    }).addTo(map);
                    const popupContent = `
                        <strong>${road.name ?? 'Jalan Tanpa Nama'}</strong>
                        <br>Panjang: ${road.length} m
                        <br> Lebar: ${road.width} m
                        <br> Kondisi: ${road.condition}
                        <br> Perkerasan: ${road.paving}
                    `;

                    polyline.bindPopup(popupContent);
                    // const midpointIndex = Math.floor(coordinates.length / 2);
                    // const midpoint = coordinates[midpointIndex];
                    // var marker = L.circleMarker(midpoint, {
                    //     radius: 6,
                    //     fillColor: color,
                    //     color: '#000',
                    //     weight: 1,
                    //     opacity: 1,
                    //     fillOpacity: 0.8
                    // }).addTo(map);
                    // marker.bindPopup(popupContent);
                }
            } catch (err) {
                console.log(err);
                console.warn("Gagal parsing polyline:", road.polyline);
            }
        });
    });
});
