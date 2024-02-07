<x-app-layout :player="$player">
    
        <div class="relative w-full  max-h-full">
            
            <form id="players-info" action="#" class="relative bg-white rounded-lg shadow dark:bg-gray-700" method="POST">
                
                
                <!-- Modal header -->
                <div class="flex items-center justify-center p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Info Panel [{{$player->identifier}}]
                    </h3>
                    
                        
                    
            
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <h1 class="text-xl font-extrabold text-gray-900 dark:text-white">Player Info</h1>
                    <div class="grid grid-cols-7 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Identifier</label>
                            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$player->identifier}}" disabled>
                        </div>
    
                        <div class="col-span-6 sm:col-span-1">
                            <label for="group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group</label>
                            <input type="text" name="group" id="group" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value ="{{$player->group}}">
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission</label>
                            <input type="text" name="permission" id="permission" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$player->permission_level}}">
                        </div>
    
                        <div class="col-span-6 sm:col-span-1">
                            <label for="job" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job</label>
                            <input type="text" name="job" id="job" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$player->job}}">
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <label for="job_grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job Grade</label>
                            <input type="text" name="job_grade" id="job_grade" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$player->job_grade}}">
                        </div>
                        
    
                    </div>
                    <div class="grid grid-cols-9 gap-6">
                        <div class="col-span-6 sm:col-span-1">
                            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fistname</label>
                            <input type="text" name="firstname" id="firstname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$player->firstname}}" disabled>
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                            <input type="text" name="lastname" id="lastname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value ="{{$player->lastname}}">
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input type="text" name="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$player->phone}}">
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                            <input type="text" name="position" id="position" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$player->position}}">
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="inventory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw Inventory</label>
                            <textarea id="inventory" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$player->inventory}}</textarea>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="account" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw Account</label>
                            <input type="text" name="account" id="account" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$player->accounts}}">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="skin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw Skin</label>
                            <textarea id="skin" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$player->skin}}</textarea>
                        </div>
                    </div>
                    
                </div>
                <x-space-border/>
                <div class="p-6 space-y-6">
                    <h1 class="text-xl font-extrabold text-gray-900 dark:text-white">Player Vehicles ({{$player->vehicles->count()}})</h1>
                    
                        @foreach ($vehicles as $vehicle)
                            <div class="border border-gray-200 rounded dark:border-gray-600 p-6">
                                <div class="grid grid-cols-9 gap-7 pb-10">
                                    <div class="col-span-6 sm:col-span-1">
                                        <label for="plate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plate</label>
                                        <input type="text" name="plate" id="plate" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$vehicle->plate}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-1">
                                        <label for="stored" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stored</label>
                                        <input type="text" name="stored" id="stored" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$vehicle->stored}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-1">
                                        <label for="fav" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Favorite</label>
                                        <input type="text" name="fav" id="fav" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$vehicle->fav}}">
                                    </div>
                                </div>
                                <div class="grid grid-cols-9 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="vehicle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw Vehicle</label>
                                        <textarea id="vehicle" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$vehicle->vehicle}}</textarea>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="glovebox" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw Glovebox</label>
                                        <textarea id="glovebox" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$vehicle->glovebox}}</textarea>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="trunk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raw Trunk</label>
                                        <textarea id="trunk" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$vehicle->trunk}}</textarea>
                                    </div>
                                </div>
                            </div>
                            

                        @endforeach
                        {{ $vehicles->links()}}

                    
                </div>

                <x-space-border/>
                <div class="p-6 space-y-6">
                    <h1 class="text-xl font-extrabold text-gray-900 dark:text-white">Player Contacts ({{$player->contacts->count()}})</h1>
                    
                        @foreach ($contacts as $contact)
                            <div class="border border-gray-200 rounded dark:border-gray-600 p-6">
                                <div class="grid grid-cols-9 gap-7 pb-10">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="plate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number</label>
                                        <input type="text" name="plate" id="plate" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$contact->number}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="stored" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input type="text" name="stored" id="stored" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$contact->name}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="fav" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                                        <input type="text" name="fav" id="fav" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$contact->photo}}">
                                    </div>
                                </div>
                            </div>
                            

                        @endforeach
                        {{ $contacts->links()}}
                    
                </div>

                <x-space-border/>
                <div class="p-6 space-y-6">
                    <div class="flex justify-between">
                        <h1 class="text-xl font-extrabold text-gray-900 dark:text-white">Player Phone Transactions ({{$player->phonetransactions->count()}})</h1>
                        <div>
                            <h1 class="text-xl font-bold text-gray-900 dark:text-red-500">Sent: {{ Cache::get('phone_transaction_' . $player->identifier)['from']['amount_sum'] }}</h1>
                            <h1 class="text-xl font-bold text-gray-900 dark:text-green-500">Received: {{ Cache::get('phone_transaction_' . $player->identifier)['to']['amount_sum'] }}</h1>
                        </div>
                    </div>
                    
                        @foreach ($phonetransactions as $phonetransaction)
                            <div class="border border-gray-200 rounded dark:border-gray-600 p-6">
                                <div class="grid grid-cols-9 gap-7 pb-10">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="plate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From</label>
                                        <input type="text" disabled name="plate" id="plate" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$phonetransaction->from}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="stored" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To</label>
                                        <input type="text" disabled name="stored" id="stored" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " value="{{$phonetransaction->to}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-1">
                                        <label for="fav" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                        <input type="text" name="fav" id="fav" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$phonetransaction->amount}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-1">
                                        <label for="fav" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                                        <input type="text" disabled name="fav" id="fav" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$phonetransaction->time}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-1">
                                        <label for="fav" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason</label>
                                        <input type="text" name="fav" id="fav" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$phonetransaction->reason}}">
                                    </div>
                                </div>
                            </div>
                            

                        @endforeach
                        {{ $phonetransactions->links()}}
                    
                </div>


                <x-space-border/>
                <div class="p-6 space-y-6">
                    
                        <h1 class="text-xl font-extrabold text-gray-900 dark:text-white">Player Bank Transactions ({{$player->banktransactions->count()}})</h1>
                    
                    
                        @foreach ($banktransactions as $banktransaction)
                            <div class="border border-gray-200 rounded dark:border-gray-600 p-6">
                                <div class="grid grid-cols-10 gap-7 pb-10">
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="plate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Receiver Identifier</label>
                                        <input type="text" disabled name="plate" id="plate" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$banktransaction->receiver_identifier}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="stored" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Receiver Name</label>
                                        <input type="text" disabled name="stored" id="stored" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " value="{{$banktransaction->receiver_name}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="fav" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sender Identifier</label>
                                        <input type="text" disabled name="fav" id="fav" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$banktransaction->sender_identifier}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="fav" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sender Name</label>
                                        <input type="text" disabled name="fav" id="fav" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$banktransaction->sender_name}}">
                                    </div>
                                </div>
                                <div class="grid grid-cols-9 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="fav" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                        <input type="text" disabled name="fav" id="fav" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$banktransaction->date}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="fav" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Value</label>
                                        <input type="text" disabled name="fav" id="fav" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$banktransaction->value}}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="fav" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                        <input type="text" disabled name="fav" id="fav" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$banktransaction->type}}">
                                    </div>
                                </div>
                            </div>
                            

                        @endforeach
                        {{ $banktransactions->links()}}
                    
                </div>
                
                <!-- TODO:  TRANSACTIONS, SAVE-->

                <!-- Modal footer -->
                <x-space-border>
                    <button type="submit" onclick="history.back()" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">Back</button>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    
                </x-space-border>
            </form>
        </div>
    
</x-app-layout>