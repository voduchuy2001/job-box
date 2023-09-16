@props([
    'id' => null,
])

<div id="{{ $id }}"
     style="height: 100vh;"
     wire:ignore></div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/libs/leaflet/leaflet.css') }}" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/libs/leaflet/leaflet.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener('livewire:initialized', () => {
            let map = L.map('{{ $id }}').setView([10.762622, 106.660172], 13);
            let marker;
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            const onMapClick = (e) => {
                if (marker) {
                    map.removeLayer(marker);
                }

                marker = L.marker(e.latlng).addTo(map);
                marker.bindPopup("You clicked the map at " + e.latlng.toString()).openPopup();
                @this.longitude = e.latlng.lng;
                @this.latitude = e.latlng.lat;
            };

            map.on('click', onMapClick);
        });
    </script>
@endpush
