<div>
    <x-admin.card>
        <div class="row">
            <div class="col-lg-2 mb-2">
                <select wire:model.live="status" class="form-select-sm">
                    <option value="accepted">{{ __('Accepted') }}</option>
                    <option value="rejected">{{ __('Rejected') }}</option>
                </select>
            </div>
        </div>

        <canvas id="appliedJobChart"></canvas>
    </x-admin.card>
</div>

@push('scripts')
    <script type="text/javascript">
        var line = document.getElementById('appliedJobChart');
        var labels = {{ Js::from($labels) }};
        var data = {{ Js::from($counts) }};

        var appliedJobChart = new Chart(line, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: `{{ __('Total Number Of Job Applications By Year') }}`,
                    backgroundColor: '#405189',
                    data: data,
                    borderWidth: 2,
                    hoverOffset: 4,
                    borderColor: '#405189'
                }]
            },
        });

        document.addEventListener('refreshAppliedJobChart', (event) => {
            appliedJobChart.data.labels = event.detail[0].labels;
            appliedJobChart.data.datasets[0].data = event.detail[0].counts;
            appliedJobChart.update();
        })
    </script>
@endpush
