<div>
    <x-admin.card>
        <canvas id="trendingWordChart"></canvas>
    </x-admin.card>
</div>

@push('scripts')
    <script type="text/javascript">
        var bar = document.getElementById('trendingWordChart');
        new Chart(bar, {
            type: 'doughnut',
            data: {
                labels: {{ Js::from($name) }},
                datasets: [{
                    label: `{{ __('Top 10 Trending Words Of Week') }}`,
                    data: {{ Js::from($wordsCount) }},
                    borderWidth: 1,
                    backgroundColor: [
                        '#f06548',
                        '#0ab39c',
                        '#299cdb',
                        '#f7b84b',
                        '#405189',
                    ],
                    hoverOffset: 4
                }]
            },
        });
    </script>
@endpush
