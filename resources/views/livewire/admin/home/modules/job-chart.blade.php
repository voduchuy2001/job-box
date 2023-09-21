<div>
    <x-admin.card>
        <canvas id="jobChart"></canvas>
    </x-admin.card>
</div>


@push('scripts')
    <script type="text/javascript">
        var bar = document.getElementById('jobChart');
        var labels = {{ Js::from($labels) }};
        new Chart(bar, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Current Year Jobs',
                    backgroundColor: '#405189',
                    data: {{ Js::from($currentYearJobs) }},
                    borderWidth: 1
                }, {
                    label: 'Previous Year Jobs',
                    backgroundColor: 'lightgray',
                    data: {{ Js::from($previousYearJobs) }},
                    borderWidth: 1
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
