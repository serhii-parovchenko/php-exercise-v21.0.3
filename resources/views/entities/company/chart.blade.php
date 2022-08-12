<div class="container">
    <canvas id="quotes"></canvas>
</div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        let labels = {{ Js::from($labels) }};
        let openData = {{ Js::from($openData) }};
        let closeData = {{ Js::from($closeData) }};

        const data = {
            labels: labels.reverse(),
            datasets: [
                {
                    label: 'Open prices',
                    data: openData.reverse(),
                    borderColor: 'rgb(255,0,0)',
                    backgroundColor: 'rgb(255, 0, 0)',
                },
                {
                    label: 'Close prices',
                    data: closeData.reverse(),
                    borderColor: 'rgb(0, 0, 255)',
                    backgroundColor: 'rgb(0, 0, 255)',
                }
            ],
        };
        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'The historical chart for the open and close prices.'
                    }
                },
            },
        };

        const myChart = new Chart(document.getElementById('quotes'), config);
    </script>
@endsection
