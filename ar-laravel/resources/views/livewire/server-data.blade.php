

<div wire:poll.30s class="text-white">
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="mb-5" ><i class="fa fa-circle text-red-500 Blink"></i>&nbsp; LIVE Server Stats </div>
        
        <h5 class="text-lg font-bold tracking-tight text-gray-900 dark:text-white">Online players:</h5>
        
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">   @if($data)
            {{$data['svMaxclients']}} / {{$data['selfReportedClients']}}
        @else
            OFFLINE
        @endif</p>

        <h5 class="text-lg font-bold tracking-tight text-gray-900 dark:text-white">AVG Ping:</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> @if($data)
            {{$averagePing}} ms
        @else
            OFFLINE
        @endif</p>
        <p class="font-thin text-xs text-gray-700 dark:text-gray-400">Last updated: {{ now() }}</p>
    </div>
</div>
