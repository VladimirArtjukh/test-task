<?php
declare(strict_types=1);

/**
 * @author Artuikh Vladimir
 * @copyright 2021 Artuikh Vladimir, vladimir.artjukh@gmail.com
 */

namespace App\ServiceContainers\StatTicket;

use App\Models\Ticket;

class StatTicket implements StatTicketIntarface
{
    /**
     * @return array
     */
    public function list()
    {
        $countAllTickets          = Ticket::all('id')->count();
        $countNotProcessedTickets = Ticket::notProcessedTickets()->count();
        $userWithMaxSubmit        = Ticket::userWithCountSubmit()->get()->toArray()[0];
        $lastProcessingTickets    = Ticket::max('updated_at');

        $data = [
            'countAllTickets'          => $countAllTickets,
            'countNotProcessedTickets' => $countNotProcessedTickets,
            'userWithMaxSubmit'        => $userWithMaxSubmit,
            'lastProcessingTickets'    => $lastProcessingTickets
        ];

        return $data;
    }
}