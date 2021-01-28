<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\TicketController;

Route::group(['prefix' => 'v1'], function () {

    Route::get('open-tickets', [TicketController::class, 'openTickets'])
        ->name('v1.api.open.tickets');

    Route::get('close-tickets', [TicketController::class, 'closeTickets'])
        ->name('v1.api.close.tickets');

    Route::get('users/{email}/tickets', [TicketController::class, 'userTickets'])
        ->name('v1.api.user.tickets');

    Route::get('stats', [TicketController::class, 'stats'])
        ->name('v1.api.stats');
});
