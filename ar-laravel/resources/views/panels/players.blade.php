<x-app-layout>
    
    <h2 class="text-3xl font-bold mt-4 mb-2 text-gray-800 dark:text-white flex justify-center">Page loaded from
        ({{ $fromCache }}) {{ $executionTime }} in MS</h2>
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                    <div class="flex justify-start py-3 px-4">
                        <div class="relative max-w-xs">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="table-search-users"
                                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for users">
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id ="players-table">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Identifier
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Money
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Bank
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Black money
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Group
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Permission
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Position
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Inventory
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Skin
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">job
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Grade
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Firstname
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Lastname
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Phone
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Vehicles
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Deposits
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Withdraws
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Transfers
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Contacts
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Lotteries
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Phone Transcation Sent
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Phone Transcation Received
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700" id="players-tableBody">
                                @foreach ($players as $player)
                                    <tr class ="hover:bg-gray-50 dark:hover:bg-gray-600" data-identy={{$player->identifier}}>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200 player-identifier">
                                            {{ $player->identifier }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-accounts">
                                            {{ Number::currency($player->accounts['money'], 'USD') }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-accounts">
                                            {{ Number::currency($player->accounts['bank'], 'USD') }}
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-accounts">
                                            {{ Number::currency($player->accounts['black_money'], 'USD') }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-group">
                                            {{ $player->group }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-permission">
                                            {{ $player->permission_level }}</td>
                                        <td
                                            class="inventory-cell px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 max-w-md overflow-x-scroll player-inventory">
                                            {{ $player->position }}</td>
                                        
                                        <td
                                            class="inventory-cell px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 max-w-md overflow-x-scroll player-inventory">
                                            {{ $player->inventory }}</td>

                                        <td
                                            class="inventory-cell px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 max-w-md overflow-x-scroll player-inventory">
                                            {{ $player->skin }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-job">
                                            {{ $player->job }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-grade">
                                            {{ $player->job_grade }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-firstname">
                                            {{ $player->firstname }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-lastname">
                                            {{ $player->lastname }}</td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-phone">
                                            {{ $player->phone }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-phone">
                                            {{ $player->vehicles->count() }}</td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-phone">
                                            {{ Cache::get('transaction_counts_' . $player->identifier)['deposit'] }}
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-phone">
                                            {{ Cache::get('transaction_counts_' . $player->identifier)['withdraw'] }}
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-phone">
                                            {{ Cache::get('transaction_counts_' . $player->identifier)['transfer'] }}
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-phone">
                                            {{ $player->contacts->count() }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-phone">
                                            {{ $player->lottery->count() }}</td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-phone">
                                            Count:
                                            {{ Cache::get('phone_transaction_' . $player->identifier)['from']['count'] }}<br>
                                            {{ Cache::get('phone_transaction_' . $player->identifier)['from']['amount_sum'] }}
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 player-phone">
                                            Count:
                                            {{ Cache::get('phone_transaction_' . $player->identifier)['to']['count'] }}<br>
                                            {{ Cache::get('phone_transaction_' . $player->identifier)['to']['amount_sum'] }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        

                    </div>
                    <div class="py-5 px-4">
                        {{ $players->appends(['query' => request()->input('query')])->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            document.querySelectorAll('#players-table tr').forEach(row => {
                row.addEventListener('click', function() {
                    var playerId = this.dataset.identy;
            
                    window.location.href = `/players/${playerId}`;
                });
            });
            let timeoutId;
            var inventoryCells = document.querySelectorAll('.inventory-cell');
            inventoryCells.forEach(function(cell) {

                cell.addEventListener('click', function() {

                    if (event.target.tagName.toLowerCase() === 'textarea') {
                        event.stopPropagation();
                        return;
                    }

                    var existingTextarea = cell.querySelector('textarea');
                    if (existingTextarea) {
                        cell.textContent = existingTextarea.value.trim();
                        return;
                    }


                    var currentText = cell.textContent.trim();


                    var textarea = document.createElement('textarea');
                    textarea.value = currentText;
                    textarea.className = 'w-full h-24 bg-transparent border-0';
                    textarea.readOnly = true;


                    textarea.rows = Math.ceil(currentText.length /
                        50);


                    cell.innerHTML = '';
                    cell.appendChild(textarea);


                    textarea.focus();


                    textarea.addEventListener('input', function() {
                        textarea.rows = Math.ceil(textarea.value.length /
                            50);
                    });


                    textarea.addEventListener('blur', function() {
                        var newText = textarea.value;

                        cell.textContent = newText;
                    });
                });
            });

            var searchInput = document.getElementById('table-search-users');


            searchInput.addEventListener('input', function() {
                var inputValue = searchInput.value.trim();

                if (inputValue.length >= 3) {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function() {
                        window.location.href = `/search?query=${encodeURIComponent(inputValue)}`;
                    }, 500);

                }
            });

            window.addEventListener('load', function() {
                var queryParam = new URLSearchParams(window.location.search).get('query');
                if (queryParam) {
                    searchInput.value = queryParam;
                }
            });

            searchInput.addEventListener('keyup', function(event) {
                if (event.key === 'Backspace' && searchInput.value.trim() === '') {
                    window.location.href = '/players';
                }
            });


        });
    </script>



</x-app-layout>
