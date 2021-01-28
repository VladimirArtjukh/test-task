<?php
declare(strict_types=1);

/**
 * @author Artuikh Vladimir
 * @copyright 2021 Artuikh Vladimir, vladimir.artjukh@gmail.com
 */
namespace Tests\Unit\API\V1;

use App\Facades\StatTicketFacade;
use App\Http\Controllers\API\V1\TicketController;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    const COUNT_CREATING_TIMES = 5;

    public function testOpenTickets()
    {
        Ticket::factory(self::COUNT_CREATING_TIMES)->create();

        $result = Ticket::notProcessedTickets()->paginate(TicketController::COUNT_FOR_PAGINATE);
        $this->assertNotNull($result);
    }

    public function testCloseTickets()
    {
        Ticket::factory(self::COUNT_CREATING_TIMES)->create();

        $result = Ticket::processedTickets()->paginate(TicketController::COUNT_FOR_PAGINATE);
        $this->assertNotNull($result);
    }

    public function testUserTickets()
    {
        Ticket::factory(self::COUNT_CREATING_TIMES)->create();

        $result = StatTicketFacade::list();

        $this->assertNotNull($result['countAllTickets']);
        $this->assertNotNull($result['countNotProcessedTickets']);
        $this->assertNotNull($result['userWithMaxSubmit']);
        $this->assertNotNull($result['lastProcessingTickets']);
    }
}
