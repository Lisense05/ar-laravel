<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Cache;

class FetchServerData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:server-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch server data from the FiveM API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client();
        $url ='https://servers-frontend.fivem.net/api/servers/single/br9ym8';
        try {
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);

            if (isset($data['Data'])) {
                Cache::put('server_data', $data['Data'], now()->addMinutes(1)); 
                
                
                $this->info('Data fetched and cached successfully.');
            } else {
                $this->error('The "Data" key is not found in the response.');
            }
            
        } catch(\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
