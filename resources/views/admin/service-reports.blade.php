<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services Reports</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
       #myChart {
            width: 100% !important;
            max-width: 800px;
            height: auto;
            margin-left: 400px;
        }

        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    @include('admin/sidebar')
    <h1>Services Popularity</h1>
    <canvas id="myChart" width="100" height="100"></canvas>

    <script>
        // Fetch data from Laravel
        const services = @json($services);
        const counts = @json($counts);

        // Data for the pie chart
        const data = {
            labels: services,
            datasets: [{
                label: 'Service Popularity',
                data: counts,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'pie', // Change type to 'pie'
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>