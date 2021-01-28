<?php

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Console\TicketsController;


Artisan::command('ticket_create', function () {
    $this->comment(TicketsController::create());
})->purpose('Create ticket');

Artisan::command('ticket_update', function () {
    $this->comment(TicketsController::statusUpdate());
})->purpose('Update status ticket');