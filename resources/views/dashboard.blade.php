<x-app-layout>
    <x-slot name="header">
        <div class="row">
{{--            <div class="col-md-6">--}}
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
{{--            </div>--}}
{{--            <div class="col-md-6 text-right">--}}
{{--                <a href="{{route('dashboard.export')}}" class="btn btn-success"> Export CSV</a>--}}
{{--            </div>--}}
        </div>
    </x-slot>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var labels = {{ Js::from($labels) }};
        var data_earned = {{ Js::from($data_earned) }};
        var data_spent = {{ Js::from($data_spent) }};
        var data_profit = {{ Js::from($data_profit) }};

        var barChartData_earned = {
            labels: labels,
            datasets: [{
                label: 'Earned',
                backgroundColor: '#2E8B57',
                data: data_earned
            }]
        };

        var barChartData_spent = {
            labels: labels,
            datasets: [{
                label: 'Spent',
                backgroundColor: '#FF5C5C',
                data: data_spent
            }]
        };

        var barChartData_profit = {
            labels: labels,
            datasets: [{
                label: 'Profit',
                backgroundColor: '#7EC8E3',
                data: data_profit
            }]
        };

        window.onload = function () {
            var ctx1 = document.getElementById("canvas1").getContext("2d");
            window.myBar = new Chart(ctx1, {
                type: 'bar',
                data: barChartData_earned,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#2E8B57',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Monthly amount earned'
                    }
                }
            });

            var ctx2 = document.getElementById("canvas2").getContext("2d");
            window.myBar = new Chart(ctx2, {
                type: 'bar',
                data: barChartData_spent,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#FF5C5C',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Monthly amount spent'
                    }
                }
            });

            var ctx3 = document.getElementById("canvas3").getContext("2d");
            window.myBar = new Chart(ctx3, {
                type: 'bar',
                data: barChartData_profit,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#7EC8E3',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Monthly profit'
                    }
                }
            });
        };
    </script>
    <br>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <canvas id="canvas3" height="280" width="800"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <canvas id="canvas1" height="280" width="800"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <canvas id="canvas2" height="280" width="800"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</x-app-layout>
