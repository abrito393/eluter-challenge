<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\GetRemoteData;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();


Artisan::command('get-eluter-data', function () {
    $command = new GetRemoteData();
    $command->handle();
})->purpose('Get remota data')->everyMinute();