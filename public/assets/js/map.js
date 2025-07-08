var map2 = L.map('mapid2').setView([0.6461, 117.2578], 11); // Pusat Kutai Timur
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 20,
    attribution: '© OpenStreetMap'
}).addTo(map2);
// Inisialisasi array koordinat dan polyline
var latlngs = [];
var markers = [];
var polyline = null;
// Update polyline dan input hidden
function updatePolyline() {
    // polyline.setLatLngs(latlngs);
    document.getElementById('polyline-coordinates').value = JSON.stringify(latlngs.map(p => [p.lat, p.lng]) // konversi ke array biasa sebelum simpan
    );
    if (latlngs.length > 1) {
        if (polyline) {
            // Jika polyline sudah ada, perbarui koordinatnya
            polyline.setLatLngs(latlngs);
        } else {
            // Jika polyline belum ada, buat yang baru dengan warna merah
            polyline = L.polyline(latlngs, {
                color: 'red'
            }).addTo(map2);
        }
    }
}
// Klik di peta: tambahkan titik
map2.on('click', function(e) {
    var latlng = L.latLng(e.latlng.lat, e.latlng.lng); // ⬅️ gunakan L.latLng
    latlngs.push(latlng); // array of LatLng
    var marker = L.marker(latlng).addTo(map2);
    markers.push(marker);
    updatePolyline(); // ⬅️ menggambar ulang garis
});
// Fungsi Undo
function undoLastPoint() {
    if (latlngs.length > 0) {
        latlngs.pop();
        var lastMarker = markers.pop();
        map2.removeLayer(lastMarker);
        updatePolyline();
    }
}
// Fungsi Reset
function resetMap() {
    latlngs = [];
    markers.forEach(marker => map2.removeLayer(marker));
    markers = [];
    polyline.setLatLngs([]); // Hapus garis dari peta
    document.getElementById('polyline-coordinates').value = '';
}
// Fungsi Selesai
function finishDrawing() {
    alert('Polyline telah selesai. Klik Simpan untuk menyimpan koordinat.');
}
