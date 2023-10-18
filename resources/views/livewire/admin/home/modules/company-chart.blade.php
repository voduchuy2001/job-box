<div>
    <x-admin.card>
        <canvas id="companyChart"></canvas>
    </x-admin.card>
</div>

@push('scripts')
    <script type="text/javascript">
        var bar = document.getElementById('companyChart');
        var labels = {{ Js::from($companyNames) }};
        new Chart(bar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: `{{ __('Top 10 Companies With The Highest Number Of Job Postings') }}`,
                    backgroundColor: '#405189',
                    data: {{ Js::from($jobCounts) }},
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
