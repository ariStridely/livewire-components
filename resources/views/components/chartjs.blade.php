@props([
    'config' => '{}'
])

<canvas 
    x-data="{
        chart: null,
        
        updateChart() {
            if (this.chart) {
                this.chart.destroy();
            }       

            var ctx = document.getElementById('myChart').getContext('2d');
            var config = JSON.parse(event.detail.chart);
            {{-- console.log(config); --}}
            this.chart = new Chart(ctx, config);
            console.log(this.chart)
        }
    }
    "
    {{-- x-init='
        console.log("init");
    
        ctx = document.getElementById("myChart").getContext("2d");
        
        chart = new Chart(ctx, {!! $config !!});
    ' --}}
    x-on:chart-update.window="updateChart(event);"
    id="myChart" 
    class="h-full w-full"
></canvas>

@once
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');

            const myChart = new Chart(ctx, {
                "data": {
                    "datasets": {
                        "Nuovo Nissan Juke Kiiro, con The Batman al cinema. ": [
                            null,
                            1735,
                            15736,
                            5739,
                            5710,
                            5715,
                            5718,
                            5783,
                            12426,
                            10478,
                            5025,
                            5020,
                            5001,
                            4994,
                            5017,
                            5027,
                            5011,
                            4986,
                            5013,
                            4992,
                            4770,
                            4983,
                            5023,
                            5225,
                            4477
                        ],
                        "all": [
                            null,
                            1735,
                            15736,
                            5739,
                            5710,
                            5715,
                            5718,
                            5783,
                            12426,
                            10478,
                            5025,
                            5020,
                            5001,
                            4994,
                            5017,
                            5027,
                            5011,
                            4986,
                            5013,
                            4992,
                            4770,
                            4983,
                            5023,
                            5225,
                            4477
                        ]
                    },
                    "labels": [
                        "07/03/2022",
                        "08/03/2022",
                        "09/03/2022",
                        "10/03/2022",
                        "11/03/2022",
                        "12/03/2022",
                        "13/03/2022",
                        "14/03/2022",
                        "15/03/2022",
                        "16/03/2022",
                        "17/03/2022",
                        "18/03/2022",
                        "19/03/2022",
                        "20/03/2022",
                        "21/03/2022",
                        "22/03/2022",
                        "23/03/2022",
                        "24/03/2022",
                        "25/03/2022",
                        "26/03/2022",
                        "27/03/2022",
                        "28/03/2022",
                        "29/03/2022",
                        "30/03/2022",
                        "31/03/2022"
                    ]
                },
                "type": "bar"
            });
        </script>
    @endpush
@endonce