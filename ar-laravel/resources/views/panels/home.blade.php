<x-app-layout>


    <div
        class="w-full mb-5 p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">American Reality RolePlay Stats</h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Leading game server of FIVEM in Hungary for
            3 years. Rank #136 in the world.</p>
        <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel"
                aria-labelledby="stats-tab">
                <dl
                    class="grid max-w-screen-xl grid-cols-2 gap-5 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">{{ $count }}+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Registered players</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">20K+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Discord members</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">{{ $bans }}+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Total bans</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">{{ $vehicles }}+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Owned Vehicles</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">{{ $jobs }}+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Factions</dd>
                    </div>

                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">{{ $transaction }}+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Transactions</dd>
                    </div>

                </dl>
            </div>
        </div>
        <a href="https://discord.gg/arrp"
            class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-7 h-7 me-3 bi bi-discord"
                viewBox="0 0 16 16">
                <path
                    d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612" />
            </svg>
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Join to us!</div>
                <div class="-mt-1 font-sans text-sm font-semibold">Discord</div>
            </div>
        </a>
    </div>

    <div class="p-4 md:p-6 bg-white rounded-lg shadow dark:bg-gray-700">

        <div class="flex justify-center mb-5">
            <div
                class=" max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 transition-all duration-1000 transform">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">All money</h5>

                <p class="mb-3 text-green-500 font-extrabold dark:text-green-500" id="toUpdate"></p>

            </div>
        </div>
        <div class="flex justify-between">
            <div class="w-1/2 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Money</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ key($dailyMoneyPure) }} -
                            {{ key(array_reverse($dailyMoneyPure)) }}</p>
                    </div>
                </div>
                <div class="mt-5 border-gray-200 border-b dark:border-gray-700 pb-3">
                    <div class="grid grid-cols-2 py-3">
                        <dl>
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Current:</dt>
                            <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">
                                {{ key(array_reverse($dailyMoneyPure)) }}</dd>
                        </dl>
                        <dl>
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Amount:</dt>
                            <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500">
                                {{ Number::currency(end($dailyMoneyPure), 'USD') }}</dd>
                        </dl>
                    </div>
                </div>
                <div id="area-chart"></div>

            </div>

            <div class="ml-5 w-1/2 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Bank</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ key($dailyBankPure) }} -
                            {{ key(array_reverse($dailyBankPure)) }}</p>
                    </div>
                </div>
                <div class="mt-5 border-gray-200 border-b dark:border-gray-700 pb-3">
                    <div class="grid grid-cols-2 py-3">
                        <dl>
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Current:</dt>
                            <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">
                                {{ key(array_reverse($dailyBankPure)) }}</dd>
                        </dl>
                        <dl>
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Amount:</dt>
                            <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500">
                                {{ Number::currency(end($dailyBankPure), 'USD') }}</dd>
                        </dl>
                    </div>
                </div>
                <div id="area-chart2"></div>
            </div>
        </div>
    </div>

    <div class="mt-5 w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
        <div class=" bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Daily Max Players</h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ key($maxPLayersData) }} -
                        {{ key(array_reverse($maxPLayersData)) }}</p>
                </div>
            </div>
            <div class="mt-5 pb-3">
                <div class="flex justify-between py-3">
                    <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Min:</dt>
                        <dd class="leading-none text-xl font-bold  text-red-600 dark:text-red-500">
                            {{ $maxPlayers_util['min'] }}</dd>
                    </dl>
                    <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">AVG:</dt>
                        <dd class="leading-none text-xl font-bold text-white dark:text-white">
                            {{ $maxPlayers_util['avg']}}</dd>
                    </dl>
                    <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Max:</dt>
                        <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">
                            {{ $maxPlayers_util['max'] }}</dd>
                    </dl>
                </div>
            </div>
            <div id="area-chart"></div>

        </div>
        <div id="data-labels-chart"></div>

    </div>

    <div class="mt-5 w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
        <div class=" bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Daily New Players</h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ key($newPlayersData) }} -
                        {{ key(array_reverse($newPlayersData)) }}</p>
                </div>
            </div>
            
            <div id="area-chart"></div>

        </div>
        <div id="data-labels-chart-new"></div>

    </div>




    <script>
        const toUpdate = document.getElementById('toUpdate');
        var dailyMoneyData = {!! json_encode($dailyMoneyPure) !!};
        var dailyBankData = {!! json_encode($dailyBankPure) !!};

        var categories = Object.keys(dailyMoneyData);
        var series = [];
        var series2 = [];

        categories.forEach(function(date) {
            var money = dailyMoneyData[date] || 0;
            var bank = dailyBankData[date] || 0;
            series.push(money);
            series2.push(bank);

        });
        var bank = 0;
        var money = 0;

        function update() {
            if (bank > 5) {
                toUpdate.innerHTML = "$ " + numberWithCommas(bank + money);
                showMoneyInfo();
            }

        }

        function showMoneyInfo() {
            toUpdate.classList.remove('hidden');
            toUpdate.classList.remove('opacity-0');
            toUpdate.classList.add('opacity-100');

        }


        function hideMoneyInfo() {
            toUpdate.classList.remove('opacity-100');
            toUpdate.classList.add('opacity-0');

            setTimeout(() => {
                toUpdate.classList.add('hidden');
            }, 300);
        }


        var maxPlayersData = {!! json_encode($maxPLayersData) !!};
        var maxPCategories = Object.keys(maxPlayersData);
        var maxPSeries = [];
        maxPCategories.forEach(function(date) {
            var maxPlayers = maxPlayersData[date] || 0;
            maxPSeries.push(maxPlayers);

        });

        var newPlayersData = {!! json_encode($newPlayersData) !!};
        var newPCategories = Object.keys(newPlayersData);
        var newPSeries = [];
        newPCategories.forEach(function(date) {
            var newPlayer = newPlayersData[date] || 0;
            newPSeries.push(newPlayer);

        });



        window.addEventListener("load", function() {
            let options = {
                chart: {
                    height: 300,
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                    id: "money",
                    group: "society",
                    events: {
                        mouseLeave: function(event, chartContext, config) {
                            hideMoneyInfo();
                        }
                    }

                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: 0
                    },
                },
                series: [{
                    name: "Money",
                    data: series,
                    color: "#1A56DB",
                }, ],
                xaxis: {
                    categories: categories,
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                    labels: {
                        formatter: function(value) {
                            money = value;
                            return "$ " + numberWithCommas(value);
                        }
                    },
                },
            }

            if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("area-chart"), options);
                chart.render();
            }

            let options2 = {
                chart: {
                    height: 300,
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                    id: "bank",
                    group: "society"
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#FF0000",
                        gradientToColors: ["#FF0000"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: 0
                    },
                },
                series: [{
                    name: "Bank",
                    data: series2,
                    color: "#FF0000",
                }, ],
                xaxis: {
                    categories: categories,
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                    labels: {
                        formatter: function(value) {
                            bank = value;
                            update();
                            return "$ " + numberWithCommas(value);
                        }
                    },
                },
            }
            if (document.getElementById("area-chart2") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("area-chart2"), options2);
                chart.render();
            }


            const options3 = {
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -26
                    },
                },

                dataLabels: {
                    enabled: true,
                    offsetY: -5,
                    style: {
                        cssClass: 'text-xs text-white font-medium'
                    },
                },
                series: [{
                    name: "Max Players",
                    data: maxPSeries,
                }],
                chart: {
                    height: 400,
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                legend: {
                    show: false
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                stroke: {
                    width: 6,
                },
                xaxis: {
                    categories: maxPCategories,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        },

                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                    labels: {
                        formatter: function(value) {
                            return value;
                        },
                    }
                },
            }

            if (document.getElementById("data-labels-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("data-labels-chart"), options3);
                chart.render();
            }



            const options4 = {
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -26
                    },
                },

                dataLabels: {
                    enabled: true,
                    offsetY: -5,
                    style: {
                        cssClass: 'text-xs text-white font-medium'
                    },
                },
                series: [{
                    name: "New Players",
                    data: newPSeries,
                }],
                chart: {
                    height: 400,
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                legend: {
                    show: false
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                stroke: {
                    width: 6,
                },
                xaxis: {
                    categories: newPCategories,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        },

                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                    labels: {
                        formatter: function(value) {
                            return value;
                        },
                    }
                },
            }

            if (document.getElementById("data-labels-chart-new") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("data-labels-chart-new"), options4);
                chart.render();
            }


        });


        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>




</x-app-layout>
