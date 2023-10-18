<div>
    <x-admin.card>
        <canvas id="userChart"></canvas>
    </x-admin.card>
</div>

@push('scripts')
    <script type="text/javascript">
        var bar = document.getElementById('userChart');
        var labels = {{ Js::from($labels) }};
        new Chart(bar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: `{{ __('Number Of Jobs Monthly') }}`,
                    backgroundColor: '#405189',
                    data: {{ Js::from($data) }},
                    borderWidth: 1,
                    hoverOffset: 4,
                }]
            },
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
