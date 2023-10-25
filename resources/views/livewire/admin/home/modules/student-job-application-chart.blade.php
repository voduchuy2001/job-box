<div>
    <div class="row">
        <div class="col-lg-6">
            <x-admin.card>
                <canvas id="studentAcceptedJobApplicationChart"></canvas>
            </x-admin.card>
        </div>

        <div class="col-lg-6">
            <x-admin.card>
                <canvas id="studentRejectedJobApplicationChart"></canvas>
            </x-admin.card>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        var line = document.getElementById('studentAcceptedJobApplicationChart');
        var labels = {{ Js::from($acceptedStudentJobLabels) }};
        var data = {{ Js::from($acceptedStudentJobCounts) }};

        var studentAcceptedJobApplicationChart = new Chart(line, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: `{{ __('Total Number Of Accepted Job Applications By Course') }}`,
                    backgroundColor: '#405189',
                    data: data,
                    borderWidth: 2,
                    hoverOffset: 4,
                    borderColor: '#405189'
                }]
            },
        });
    </script>

    <script type="text/javascript">
        var line = document.getElementById('studentRejectedJobApplicationChart');
        var labels = {{ Js::from($rejectedStudentJobLabels) }};
        var data = {{ Js::from($rejectedStudentJobCounts) }};

        var studentRejectedJobApplicationChart = new Chart(line, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: `{{ __('Total Number Of Rejected Job Applications By Course') }}`,
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
