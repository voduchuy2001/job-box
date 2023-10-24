<div>
    <x-admin.card>
        <div class="row align-items-end justify-content-end">
            <div class="col-lg-2 mb-3">
                <select wire:model.live="course" class="form-select">
                    <option value="course">{{ $course }}</option>
                </select>
            </div>
        </div>

        <canvas id="studentJobApplicationChart"></canvas>
    </x-admin.card>
</div>

@push('scripts')
    <script type="text/javascript">
        var line = document.getElementById('studentJobApplicationChart');
        {{--var labels = {{ Js::from($labels) }};--}}
        {{--var data = {{ Js::from($counts) }};--}}

        var appliedJobChart = new Chart(line, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: `{{ __('Total Number Of Student Applications By Year') }}`,
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
