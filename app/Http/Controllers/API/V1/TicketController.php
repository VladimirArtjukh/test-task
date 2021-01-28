<?php

namespace App\Http\Controllers\API\V1;

use App\Facades\StatTicketFacade;
use App\Http\Resources\Ticket\CloseTicketsResource;
use App\Http\Resources\Ticket\OpenTicketsResource;
use App\Http\Resources\Ticket\StatsResource;
use App\Http\Resources\Ticket\UserTicketsResource;
use App\Models\Ticket;

class TicketController extends APIBaseController
{
    const COUNT_FOR_PAGINATE = 2;

    /**
     * @return OpenTicketsResource
     */
    public function openTickets(): OpenTicketsResource
    {
        $result = Ticket::notProcessedTickets()->paginate(self::COUNT_FOR_PAGINATE);

        return new OpenTicketsResource($result);
    }

    /**
     * @return CloseTicketsResource
     */
    public function closeTickets(): CloseTicketsResource
    {
        $result = Ticket::processedTickets()->paginate(self::COUNT_FOR_PAGINATE);

        return new CloseTicketsResource($result);
    }

    /**
     * @param  string  $email
     *
     * @return UserTicketsResource
     */
    public function userTickets(string $email): UserTicketsResource
    {
        $result = Ticket::ticketsByUserEmail($email)->paginate(self::COUNT_FOR_PAGINATE);

        return new UserTicketsResource($result);
    }

    /**
     * @return StatsResource
     */
    public function stats(): StatsResource
    {
        $data = StatTicketFacade::list();

        return new StatsResource($data);
    }
}
