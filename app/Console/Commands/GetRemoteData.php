<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use GuzzleHttp\Client;
use App\Models\RemoteData;
class GetRemoteData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-remote-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i=0; $i < 5; $i++) { 
     
            $remoteData = new RemoteData();
            $nextId = RemoteData::max($remoteData->getKeyName()) + 1;

            $client = new Client();
            $response = $client->request('GET', 'https://laravel.tt.eluter.com/api/data/'.$nextId);
            
            $statusCode = $response->getStatusCode(); 
            $data = $response->getBody()->getContents(); 

            $decodedData = json_decode($data, true);

            if ($statusCode == 200) {
                //Save Remote data
                $remoteData->id = $decodedData['id'];
                $remoteData->value = $decodedData['value'];
                $remoteData->timestamp_server = $decodedData['timestamp'];
                $remoteData->save();

                echo 'Save Data id:'. $remoteData->id. PHP_EOL;

            } 

    }

        return [
            'msg' => 'Save data remote',
        ];
    }
}
