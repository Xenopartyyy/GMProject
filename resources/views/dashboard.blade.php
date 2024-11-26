@extends('layout.utamadashboard')

@section('kontendashboard')

<h1 class="text-3xl font-semibold mb-6 text-center">Dashboard Web Katalog GM</h1>

<div>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>

<script>
// Data random untuk 5 brand
const data = {
  labels: [
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};

// Opsi untuk chart
const config = {
    type: 'doughnut',
    data: data,
};

const myChart = new Chart(document.getElementById('myChart'), config);
</script>
@endsection
