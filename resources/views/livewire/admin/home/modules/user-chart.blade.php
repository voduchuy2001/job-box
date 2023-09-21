<div>
    <x-admin.card>
        <canvas id="userChart"></canvas>
    </x-admin.card>
</div>

@push('scripts')
    <script type="text/javascript">
        var bar = document.getElementById('userChart');
        var labels = ['Jan', ' Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        new Chart(bar, {
            type: 'bar',
            data: {
                labels: {{ Js::from($labels) }},
                datasets: [{
                    label: 'This Year User',
                    backgroundColor: '#405189',
                    data: {{ Js::from($thisYearUsers) }},
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
