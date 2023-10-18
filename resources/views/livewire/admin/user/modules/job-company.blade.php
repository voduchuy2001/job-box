<div>
    <x-admin.card>
        <canvas id="companyJobChart"></canvas>
    </x-admin.card>
</div>


@push('scripts')
    <script type="text/javascript">
        var pie = document.getElementById('companyJobChart');
        new Chart(pie, {
            type: 'pie',
            data: {
                labels: ['Accepted', 'Rejected'],
                datasets: [{
                    label: `{{ __('Application Acceptance Rate') }}`,
                    data: [{{ Js::from($acceptPercentage) }}, {{ Js::from($rejectPercentage) }}],
                    borderWidth: 1,
                    hoverOffset: 4
                }]
            },
        });
    </script>
@endpush