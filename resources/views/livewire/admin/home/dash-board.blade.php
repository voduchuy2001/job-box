<div>
    @include('admin.partials.page-title')

    <div class="row">
        <div class="col-lg-6">
            <x-admin.card>
                <canvas id="barChart"></canvas>
            </x-admin.card>
        </div>
        <div class="col-lg-6">
            <x-admin.card>
                <canvas id="lineChart"></canvas>
            </x-admin.card>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            var bar = document.getElementById('barChart');
            new Chart(bar, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var line = document.getElementById('lineChart');
            new Chart(line, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</div>
