if ($('#mapid2').length > 0) {
    var baseLayerOSM = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: '© OpenStreetMap'
    });

    var baseLayerEsri = L.tileLayer.provider('Esri.WorldImagery');

    var map2 = L.map('mapid2', {
        center: [0.6461, 117.2578],
        zoom: 25,
        layers: [baseLayerEsri] // default layer
    });

    // Control layer toggle
    var baseMaps = {
        "OpenStreetMap": baseLayerOSM,
        "Esri World Imagery": baseLayerEsri
    };
    L.control.layers(baseMaps).addTo(map2);

    var latlngs = [];
    var markers = [];
    var polyline = null;

    map2.on('click', function (e) {
        var latlng = L.latLng(e.latlng.lat, e.latlng.lng);
        latlngs.push(latlng);
        var marker = L.marker(latlng).addTo(map2);
        markers.push(marker);
        updatePolyline();
    });
}

// Update polyline dan input hidden
function updatePolyline() {
    document.getElementById('polyline-coordinates').value = JSON.stringify(latlngs.map(p => [p.lat, p.lng]));
    if (latlngs.length > 1) {
        if (polyline) {
            polyline.setLatLngs(latlngs);
        } else {
            polyline = L.polyline(latlngs, {
                color: 'red'
            }).addTo(map2);
        }
    }
}

// Undo
function undoLastPoint() {
    if (latlngs.length > 0) {
        latlngs.pop();
        var lastMarker = markers.pop();
        map2.removeLayer(lastMarker);
        updatePolyline();
    }
}

// Reset
function resetMap() {
    latlngs = [];
    markers.forEach(marker => map2.removeLayer(marker));
    markers = [];
    if (polyline) polyline.setLatLngs([]);
    document.getElementById('polyline-coordinates').value = '';
}

// Finish
function finishDrawing() {
    alert('Polyline telah selesai. Klik Simpan untuk menyimpan koordinat.');
}

$('#village_id').on('change', function () {
    const slot = $('#village_id option:selected').attr('slot');
    const polyline = slot ? slot.split(',') : '';
    if(polyline.length){
        const lat = parseFloat(polyline[0]);
        const lng = parseFloat(polyline[1]);
        map2.setView([lat, lng], 15);
    }
});
