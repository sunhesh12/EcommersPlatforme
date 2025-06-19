@extends('app.layouts.admin')

@section('content')
<h1 class="text-3xl font-semibold mb-4">Welcome to Admin Dashboard</h1>
<p class="text-gray-600">This is your admin panel content.</p>

<div class="dashBoardMainContainer">
    <h2>Dashboard Overview</h2>

    <!-- Stat Cards -->
    <div class="dashboard-grid mt-4">
        <div class="card p-3 bg-primary text-white">
            <p>Total Products</p>
            <h3>150</h3>
        </div>
        <div class="card p-3 bg-success text-white">
            <p>Total Orders</p>
            <h3>320</h3>
        </div>
        <div class="card p-3 bg-warning text-white">
            <p>Customers</p>
            <h3>89</h3>
        </div>
        <div class="card p-3 bg-dark text-white">
            <p>Brands</p>
            <h3>12</h3>
        </div>
    </div>


    <!-- chart in dashboard -->

    <div class="chart-container">
        <!-- <div class="col-md-6" style="display: flex;"> -->
            <div>
                <h2 class="mt-6">Sales by Category</h2>
                <div class="bg-white rounded-lg shadow chart">
                    <canvas id="categoryChart" style="width: 50%; height: 300px;"></canvas>
                </div>
            </div>

            <div>
                <h2 class="mt-6">Sales Overview</h2>
                <div class="bg-white rounded-lg shadow chart">
                    <canvas id="salesChart" style="width: 50%; height: 300px;"></canvas>
                </div>
            </div>
        <!-- </div> -->


    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');

    const salesChart = new Chart(ctx, {
        type: 'line', // You can use 'bar', 'pie', etc.
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Monthly Sales (Rs)',
                data: [120000, 150000, 100000, 180000, 200000, 170000],
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#0d6efd',
                pointRadius: 4,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rs. ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    new Chart(document.getElementById('categoryChart'), {
        type: 'pie',
        data: {
            labels: ['Laptops', 'Accessories', 'Monitors', 'Software'],
            datasets: [{
                data: [45, 25, 20, 10],
                backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545']
            }]
        }
    });
</script>

@endsection