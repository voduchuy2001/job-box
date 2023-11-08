<div>
    <x-admin.card>
        <canvas id="jobChart"></canvas>
    </x-admin.card>
</div>

@push('scripts')
    <script type="text/javascript">
        var line = document.getElementById('jobChart');
        var labels = {{ Js::from($labels) }};
        new Chart(line, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: `{{ __('Current Year Jobs') }}`,
                    backgroundColor: '#405189',
                    data: {{ Js::from($currentYearJobs) }},
                    borderWidth: 2,
                    hoverOffset: 4,
                    borderColor: '#405189',
                }, {
                    label: `{{ __('Previous Year Jobs') }}`,
                    backgroundColor: '#DEDEDF',
                    data: {{ Js::from($previousYearJobs) }},
                    borderWidth: 2,
                    hoverOffset: 4,
                    borderColor: '#DEDEDF'
                }]
            },
        });
    </script>
@endpush
