<?php

namespace App\Jobs\Webhooks;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\RemoteAction;
use Illuminate\Support\Facades\Log;

class ProcessEluterWebhooksData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(Request $request)
    {
        $arrayData = json_decode($request->getContent(), true);
        // Save or Updated data
        RemoteAction::updateOrCreate(
            ['uuid' => $arrayData['id']],
            [
                "status" => $arrayData['status'],
                "value" => $arrayData['value'],
                "timestamp_server" => $arrayData['timestamp']
            ]
        );

        Log::info("Data recive: ".json_encode($request->getContent()));
        
        return response()->json(['message' => 'Webhook received and processing']);
    }
}
