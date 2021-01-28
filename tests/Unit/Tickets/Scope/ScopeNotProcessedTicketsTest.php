<?php

namespace Tests\Unit\Tickets\Scope;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScopeNotProcessedTicketsTest extends TestCase
{
    use RefreshDatabase;

    const COUNT_CREATING_TIMES = 1;

    public function testNotProcessedTicketsTest()
    {
        Ticket::factory(self::COUNT_CREATING_TIMES)->create();

        $result = Ticket::notProcessedTickets()->first();
        $this->assertNotNull($result);

    }
}
