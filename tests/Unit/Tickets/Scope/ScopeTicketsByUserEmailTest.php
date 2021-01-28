<?php

namespace Tests\Unit\Tickets\Scope;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScopeTicketsByUserEmailTest extends TestCase
{
    use RefreshDatabase;

    const COUNT_CREATING_TIMES = 1;

    public function testTicketsByUserEmailTest()
    {
        $create = Ticket::factory(self::COUNT_CREATING_TIMES)->create()->toArray();
        $result = Ticket::ticketsByUserEmail($create[0]['email'])->first();
        $this->assertNotNull($result);

    }
}
