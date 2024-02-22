<x-app-layout :player="$player">

    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 5000)">
        @if (session('success'))
            <div id="successMessage" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
    </div>



    <div class="relative w-full  max-h-full">

        <form id="players-info" action="{{ route('players.update', ['playerId' => $player->identifier]) }}"
            class="relative bg-white rounded-lg shadow dark:bg-gray-700 mb-5" method="POST">
            @csrf
            @method('PUT')

            <!-- Modal header -->
            <div id="moreInfoHeader" class="flex items-center justify-center p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Info Panel [{{ $player->identifier }}]
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <h1 class="text-xl font-extrabold text-gray-900 dark:text-white">Player Info</h1>
                <div class="grid grid-cols-7 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Identifier</label>
                        <input type="text" name="name" id="name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $player->identifier }}" disabled>
                    </div>

                    <div class="col-span-6 sm:col-span-1">
                        <label for="group"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group</label>
                        <input type="text" name="group" id="group"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value ="{{ $player->group }}">
                            <x-input-error :messages="$errors->get('group')" class="mt-2" id="groupError" />
                    </div>

                    <div class="col-span-6 sm:col-span-1">
                        <label for="permission"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission</label>
                        <input type="text" name="permission" id="permission"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $player->permission_level }}">

                            <x-input-error :messages="$errors->get('permission')" class="mt-2" id="permissionError" />
                    </div>

                    <div class="col-span-6 sm:col-span-1">
                        <label for="job"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job</label>
                        <input type="text" name="job" id="job"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $player->job }}">
                    </div>

                    <div class="col-span-6 sm:col-span-1">
                        <label for="job_grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                            Grade</label>
                        <input type="text" name="job_grade" id="job_grade"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $player->job_grade }}">
                            <x-input-error :messages="$errors->get('job_grade')" class="mt-2" id="job_gradeError" />
                    </div>


                </div>
                <div class="grid grid-cols-9 gap-6">
                    <div class="col-span-6 sm:col-span-1">
                        <label for="firstname"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fistname</label>
                        <input type="text" name="firstname" id="firstname"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $player->firstname }}">
                    </div>
                    <div class="col-span-6 sm:col-span-1">
                        <label for="lastname"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                        <input type="text" name="lastname" id="lastname"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value ="{{ $player->lastname }}">
                    </div>
                    <div class="col-span-6 sm:col-span-1">
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" name="phone" id="phone"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $player->phone }}">
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" id="phoneError" />
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <label for="position"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                        <input type="text" name="position" id="position"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $player->position }}">
                            <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>
                </div>

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="inventory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw Inventory</label>
                        <textarea id="inventory" name="inventory" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $player->inventory }}</textarea>
                        <x-input-error :messages="$errors->get('inventory')" class="mt-2" id="inventoryError" />
                    </div>
                    
                    <div class="col-span-6 sm:col-span-3">
                        <label for="account" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw
                            Account</label>
                        <input type="text" name="account" id="account"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $player->accounts }}">
                            <x-input-error :messages="$errors->get('account')" class="mt-2" id="accountError"/>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="skin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw
                            Skin</label>
                        <textarea id="skin" rows="4" name="skin"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $player->skin }}</textarea>
                        <x-input-error :messages="$errors->get('skin')" class="mt-2" id="skinError" />
                    </div>
                </div>
                <x-space-border>
                    
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </x-space-border>
            </div>    
        </form>
        
        <x-space-border />

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mb-5">    
            <div class="p-6 space-y-6">
                <h1 class="text-xl font-extrabold text-gray-900 dark:text-white">Player Vehicles
                    ({{ $player->vehicles->count() }})</h1>
                <div class="relative max-w-xs">
                    <label for="vehicles-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-700 dark:text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" name="q" id="vehicles-search"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for vehicles">
                    </div>
                </div>


                @foreach ($vehicles as $vehicle)
                    <div class="border border-gray-200 rounded dark:border-gray-600 p-6">
                        <div class="grid grid-cols-9 gap-7 pb-10">
                            <div class="col-span-6 sm:col-span-1">
                                <label for="plate"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plate</label>
                                <input type="text" name="plate" id="plate"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $vehicle->plate }}">
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="stored"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stored</label>
                                <input type="text" name="stored" id="stored"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $vehicle->stored }}">
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="fav"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Favorite</label>
                                <input type="text" name="fav" id="fav"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $vehicle->fav }}">
                            </div>
                        </div>
                        <div class="grid grid-cols-9 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="vehicle"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw
                                    Vehicle</label>
                                <textarea id="vehicle" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $vehicle->vehicle }}</textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="glovebox"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw
                                    Glovebox</label>
                                <textarea id="glovebox" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $vehicle->glovebox }}</textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="trunk"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw
                                    Trunk</label>
                                <textarea id="trunk" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $vehicle->trunk }}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $vehicles->withQueryString()->links() }}


            </div>
        </div>
        <x-space-border />
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mb-5">    
            
            <div class="p-6 space-y-6">
                <h1 class="text-xl font-extrabold text-gray-900 dark:text-white">Player Contacts
                    ({{ $player->contacts->count() }})</h1>
                <div class="relative max-w-xs">
                    <label for="contacts-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-700 dark:text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" name="q" id="contacts-search"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for contacts">
                    </div>
                </div>
                @foreach ($contacts as $contact)
                    <div class="border border-gray-200 rounded dark:border-gray-600 p-6">
                        <div class="grid grid-cols-9 gap-7 pb-10">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="plate"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number</label>
                                <input type="text" name="plate" id="plate"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $contact->number }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="stored"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="stored" id="stored"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $contact->name }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="photo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                                <input type="text" name="photo" id="photo"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $contact->photo }}">
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $contacts->links() }}

            </div>
        </div>
        <x-space-border />
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mb-5">    
            <div class="p-6 space-y-6">
                <div class="flex justify-between">
                    <h1 class="text-xl font-extrabold text-gray-900 dark:text-white">Player Phone Transactions
                        ({{ $player->phonetransactions->count() }})</h1>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900 dark:text-red-500">Sent:
                            {{ Cache::get('phone_transaction_' . $player->identifier)['from']['amount_sum'] }}</h1>
                        <h1 class="text-xl font-bold text-gray-900 dark:text-green-500">Received:
                            {{ Cache::get('phone_transaction_' . $player->identifier)['to']['amount_sum'] }}</h1>
                    </div>
                </div>
                <div class="relative max-w-xs">
                    <label for="phonetransaction-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-700 dark:text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" name="q" id="phonetransaction-search"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for phone transactions">
                    </div>
                </div>

                @foreach ($phonetransactions as $phonetransaction)
                    <div class="border border-gray-200 rounded dark:border-gray-600 p-6">
                        <div class="grid grid-cols-9 gap-7 pb-10">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="plate"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From</label>
                                <input type="text" disabled name="plate" id="plate"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $phonetransaction->from }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="stored"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To</label>
                                <input type="text" disabled name="stored" id="stored"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                                    value="{{ $phonetransaction->to }}">
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="amount"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                <input type="text" name="amount" id="amount"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $phonetransaction->amount }}">
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="time"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                                <input type="text" disabled name="time" id="time"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $phonetransaction->time }}">
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="reason"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason</label>
                                <input type="text" name="reason" id="reason"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $phonetransaction->reason }}">
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $phonetransactions->links() }}

            </div>
        </div>
        
        <x-space-border />

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mb-5">    
            <div class="p-6 space-y-6">
                <h1 class="text-xl font-extrabold text-gray-900 dark:text-white">Player Bank Transactions
                    ({{ $player->banktransactions->count() }})</h1>
                <div class="relative max-w-xs">
                    <label for="bank-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-700 dark:text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" name="q" id="bank-search"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for bank transactions">
                    </div>
                </div>

                @foreach ($banktransactions as $banktransaction)
                    <div class="border border-gray-200 rounded dark:border-gray-600 p-6">
                        <div class="grid grid-cols-10 gap-7 pb-10">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="plate"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Receiver
                                    Identifier</label>
                                <input type="text" disabled name="plate" id="plate"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $banktransaction->receiver_identifier }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="stored"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Receiver
                                    Name</label>
                                <input type="text" disabled name="stored" id="stored"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                                    value="{{ $banktransaction->receiver_name }}">
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="sender_identifier"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sender
                                    Identifier</label>
                                <input type="text" disabled name="sender_identifier" id="sender_identifier"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $banktransaction->sender_identifier }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="sender_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sender
                                    Name</label>
                                <input type="text" disabled name="sender_name" id="sender_name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $banktransaction->sender_name }}">
                            </div>
                        </div>
                        <div class="grid grid-cols-9 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                <input type="text" disabled name="date" id="date"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $banktransaction->date }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="value"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Value</label>
                                <input type="text" disabled name="value" id="value"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $banktransaction->value }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                <input type="text" disabled name="type" id="type"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $banktransaction->type }}">
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $banktransactions->links() }}

            </div>
        </div>
        
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let timeoutId;
            var searchInput_v = document.getElementById('vehicles-search');
            var searchInput_c = document.getElementById('contacts-search');
            var searchInput_p = document.getElementById('phonetransaction-search');
            var searchInput_b = document.getElementById('bank-search');


            searchInput_b.addEventListener('input', function() {
                var inputValue = searchInput_b.value.trim();

                if (inputValue.length >= 3) {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function() {
                        searchPlayerBankTransactions();
                    }, 1000);

                } else if (inputValue.length === 0) {
                    window.location.href = "{{ route('playerInfo', $player->identifier) }}";
                }


            });

            searchInput_p.addEventListener('input', function() {
                var inputValue = searchInput_p.value.trim();

                if (inputValue.length >= 3) {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function() {
                        searchPlayerPhoneTransactions();
                    }, 1000);

                } else if (inputValue.length === 0) {
                    window.location.href = "{{ route('playerInfo', $player->identifier) }}";
                }


            });

            searchInput_c.addEventListener('input', function() {
                var inputValue = searchInput_c.value.trim();

                if (inputValue.length >= 3) {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function() {
                        searchPlayerContacts();
                    }, 1000);

                } else if (inputValue.length === 0) {
                    window.location.href = "{{ route('playerInfo', $player->identifier) }}";
                }


            });

            searchInput_v.addEventListener('input', function() {
                var inputValue = searchInput_v.value.trim();

                if (inputValue.length >= 3) {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function() {
                        searchPlayerVehicles();
                    }, 1000);

                } else if (inputValue.length === 0) {
                    window.location.href = "{{ route('playerInfo', $player->identifier) }}";
                }


            });

            function searchPlayerBankTransactions() {
                var inputValue = document.getElementById("bank-search").value.trim();
                var playerId = "{{ $player->identifier }}";
                var url = "{{ route('searchPlayerBankTransactions', ':playerId') }}";
                url = url.replace(':playerId', playerId) + '?bq=' + encodeURIComponent(inputValue);
                window.location.href = url;
            }

            function searchPlayerPhoneTransactions() {
                var inputValue = document.getElementById("phonetransaction-search").value.trim();
                var playerId = "{{ $player->identifier }}";
                var url = "{{ route('searchPlayerPhoneTransactions', ':playerId') }}";
                url = url.replace(':playerId', playerId) + '?pq=' + encodeURIComponent(inputValue);
                window.location.href = url;
            }

            function searchPlayerContacts() {
                var inputValue = document.getElementById("contacts-search").value.trim();
                var playerId = "{{ $player->identifier }}";
                var url = "{{ route('searchPlayerContacts', ':playerId') }}";
                url = url.replace(':playerId', playerId) + '?cq=' + encodeURIComponent(inputValue);
                window.location.href = url;
            }

            function searchPlayerVehicles() {
                var inputValue = document.getElementById("vehicles-search").value.trim();
                var playerId = "{{ $player->identifier }}";
                var url = "{{ route('searchPlayerVehicles', ':playerId') }}";
                url = url.replace(':playerId', playerId) + '?vq=' + encodeURIComponent(inputValue);
                window.location.href = url;
            }

            window.addEventListener('load', function() {
                var queryParam = new URLSearchParams(window.location.search).get('vq');
                var cqueryParam = new URLSearchParams(window.location.search).get('cq');
                var pqueryParam = new URLSearchParams(window.location.search).get('pq');
                var bqueryParam = new URLSearchParams(window.location.search).get('bq');

                searchInput_c.value = cqueryParam ? cqueryParam : '';
                searchInput_v.value = queryParam ? queryParam : '';
                searchInput_p.value = pqueryParam ? pqueryParam : '';
                searchInput_b.value = bqueryParam ? bqueryParam : '';

            });
        });
    </script>


</x-app-layout>
