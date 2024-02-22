<x-app-layout>
    <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
        <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
            <dl>
                @php
                    $totalMinutes = $sumMinutes; // Replace this with your variable $sumMinutes
                    $days = floor($totalMinutes / (24 * 60));
                    $hours = floor(($totalMinutes - $days * 24 * 60) / 60);
                    $minutes = $totalMinutes % 60;
                @endphp
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">All duty time</dt>
                <dd id="allDutyTime" class="leading-none text-3xl font-bold text-gray-900 dark:text-white">{{ $sumMinutes }} total
                    minutes
                    ({{ $days }} days, {{ $hours }} hours, {{ $minutes }} minutes )</dd>
            </dl>
        </div>

        <div class="grid grid-cols-2 py-3">
            <dl>
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Start date</dt>
                <dd id="startDate" class="leading-none text-xl font-bold text-green-500 dark:text-green-400">{{ $startDate }}</dd>
            </dl>
            <dl>
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">End date</dt>
                <dd id="endDate" class="leading-none text-xl font-bold text-red-600 dark:text-red-500">{{ $endDate }}</dd>
            </dl>
        </div>

        <div id="bar-chart"></div>
        <input type="text" id="dateRangePicker" placeholder="Select Date Range" class="input mt-10">
    </div>
    <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 mt-10">

        <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
            <dl>
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">All accepted reports</dt>
                <dd class="leading-none text-4xl font-bold text-green-500 dark:text-green-400">{{ $fullSumCircle }}</dd>
            </dl>
        </div>

        <h2 class="mt-5 mb-5 text-lg font-semibold text-gray-900 dark:text-white">Top admins:</h2>
        <ol class="space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">
            @foreach ($top5 as $key => $admin)
                <li>
                    <span class="font-semibold text-gray-900 dark:text-white">{{$key}}</span> | <span class="font-semibold text-gray-900 dark:text-white">{{ $admin }}</span> reports
                </li>
            @endforeach
        </ol>
        <div class ="py-6 flex justify-center items-center">
            <div class="py-6" id="pie-chart"></div>
        </div>
    </div>


    <script>
        window.addEventListener("load", function() {
            flatpickr("#dateRangePicker", {
                mode: "range",
                dateFormat: "Y-m-d",

                onClose: function(selectedDates, dateStr, instance) {
                    if (selectedDates[0] && selectedDates[1]) {
                        let startUnixTime = selectedDates[0] ? selectedDates[0].getTime() / 1000 : null;
                        let endUnixTime = selectedDates[1] ? selectedDates[1].getTime() / 1000 : null;
                        let diffDays = Math.round((selectedDates[1] - selectedDates[0]) / (1000 * 60 * 60 * 24));

                        
                        if (diffDays > 7) {
                            alert("Too long range ,please select a date range within 7 days.");
                            return;
                        }

                        let url = `/adminstat?start_date=${startUnixTime+5000}&end_date=${endUnixTime+5000}`;

                        console.log('apad?');
                        window.location.href = url;
                    }
                }
            });


            var chartData = {!! json_encode($chartData) !!};

            var dates = Object.keys(chartData);
            var series = [];

            dates.forEach(function(date) {
                var identifiers = Object.keys(chartData[date]);
                identifiers.forEach(function(identifier) {
                    var data = chartData[date][identifier] || 0;
                    var existingSeries = series.find(function(seriesItem) {
                        return seriesItem.name === identifier;
                    });

                    if (existingSeries) {

                        existingSeries.data.push(data);
                    } else {

                        series.push({
                            name: identifier,
                            data: [data]
                        });
                    }
                });
            });




            var options = {
                series: series,
                chart: {
                    type: 'bar',
                    height: 800,
                    width: '100%',
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '80%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: dates,
                    tickPlacement: 'on',
                    labels: {
                        style: {
                            colors: '#ffffff'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Minutes'
                    },
                    labels: {
                        style: {
                            colors: '#ffffff',

                        }
                    },



                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " total minutes (" + convertMinutesToDHM(val) + ")";
                        }
                    }
                },
                zoom: {
                    enabled: true,
                    type: 'x',
                    autoScaleYaxis: false,
                    zoomedArea: {
                        fill: {
                            color: '#90CAF9',
                            opacity: 0.4
                        },
                        stroke: {
                            color: '#0D47A1',
                            opacity: 0.4,
                            width: 1
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#bar-chart"), options);
            chart.render();

            const seriesCData = {!! $seriesCData !!};
            const labelsCData = {!! $labelsCData !!};
            const getChartOptions = () => {
                return {
                    series: seriesCData,
                    
                    chart: {
                        height: 900,
                        width: 900,
                        type: "pie",
                    },
                    stroke: {
                        colors: ["white"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            labels: {
                                show: true,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    labels: labelsCData,
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    }
                    
                }
            }

            if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
                chart.render();
            }




        });

        function convertMinutesToDHM(minutes) {
            if (isNaN(minutes) || minutes < 0) {
                return "Invalid input";
            }


            var hours = Math.floor((minutes % 1440) / 60);
            var remainingMinutes = minutes % 60;

            return hours + " hours, " + remainingMinutes + " minutes";
        }
    </script>


</x-app-layout>
