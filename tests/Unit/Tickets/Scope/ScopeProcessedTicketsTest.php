<?php

namespace Tests\Unit\Tickets\Scope;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScopeProcessedTicketsTest extends TestCase
{
    use RefreshDatabase;

    const COUNT_CREATING_TIMES = 1;

    public function testProcessedTicketsTest()
    {
        $create         = Ticket::factory(self::COUNT_CREATING_TIMES)->create()->toArray();
        $update         = Ticket::find($create[0]['id']);
        $update->status = 1;
        $update->save();

        $result = Ticket::processedTickets()->first();
        $this->assertNotNull($result);

    }
}
