<div>
    <x-admin.card>
        <canvas id="authenticationLogChart"></canvas>
    </x-admin.card>
</div>

@push('scripts')
    <script type="text/javascript">
        var line = document.getElementById('authenticationLogChart');
        var labels = {{ Js::from($labels) }};
        var data = {{ Js::from($authenticationLogs) }};

        var appliedJobChart = new Chart(line, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: `{{ __('Authentication Logs') }}`,
                    backgroundColor: '#405189',
                    data: data,
                    borderWidth: 2,
                    hoverOffset: 4,
                    borderColor: '#405189'
                }]
            },
        });
    </script>
@endpush
