<?php
declare(strict_types=1);

/**
 * @author Artuikh Vladimir
 * @copyright 2021 Artuikh Vladimir, vladimir.artjukh@gmail.com
 */

namespace Tests\Unit\Console;

use App\Facades\UpdateStatusTicketFacade;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    const COUNT_CREATING_TIMES = 5;

    public function testCreate()
    {
        Ticket::factory(self::COUNT_CREATING_TIMES)->create();

        $result = Ticket::first();
        $this->assertNotNull($result);
    }

    public function testStatusUpdate()
    {
        $create = Ticket::factory(self::COUNT_CREATING_TIMES)->create()->toArray();
        UpdateStatusTicketFacade::update();
        $ticket = Ticket::find($create[0]['id']);
        $result = ($ticket->status == 1) ? true : null;
        $this->assertNotNull($result);
    }
}
