<?php
declare(strict_types=1);

/**
 * @author Artuikh Vladimir
 * @copyright 2021 Artuikh Vladimir, vladimir.artjukh@gmail.com
 */

namespace App\ServiceContainers\UpdateStatusTicket;

use App\Models\Ticket;

class UpdateStatusTicket implements UpdateStatusTicketIntarface
{
    const PROCESSED_STATUS = 1;

    public function update()
    {
        $tickets = Ticket::notProcessedTickets()->get();
        foreach ($tickets as $ticket) {
            $ticket         = Ticket::find($ticket->id);
            $ticket->status = self::PROCESSED_STATUS;
            $ticket->save();
        }
    }
}