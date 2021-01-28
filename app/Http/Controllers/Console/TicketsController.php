<?php
declare(strict_types=1);

/**
 * @author Artuikh Vladimir
 * @copyright 2021 Artuikh Vladimir, vladimir.artjukh@gmail.com
 */

namespace App\Http\Controllers\Console;

use App\Jobs\TicketStatusUpdateJob;
use App\Jobs\TiketCreateJob;

class TicketsController extends ConsoleBaseController
{
    const CREATE_INFORMATION = 'Creating of ticket add to queue';
    const UPDATE_STATUS_INFORMATION = 'Updating of ticket add to queue';

    /**
     * @return string
     */
    public static function create(): string
    {
        TiketCreateJob::dispatch();

        return self::CREATE_INFORMATION;
    }

    /**
     * @return string
     */
    public static function statusUpdate(): string
    {
        TicketStatusUpdateJob::dispatch();

        return self::UPDATE_STATUS_INFORMATION;
    }
}