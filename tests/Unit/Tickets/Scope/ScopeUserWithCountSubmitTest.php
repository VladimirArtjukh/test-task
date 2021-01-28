<?php

namespace Tests\Unit\Tickets\Scope;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScopeUserWithCountSubmitTest extends TestCase
{
    use RefreshDatabase;

    const COUNT_CREATING_TIMES = 1;

    public function testUserWithCountSubmitTest()
    {
        Ticket::factory(self::COUNT_CREATING_TIMES)->create()->toArray();
        $result = Ticket::userWithCountSubmit()->first();
        $this->assertNotNull($result);

    }
}
