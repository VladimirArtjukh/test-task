<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = \DB::table('tickets')->where('id', 1)->count();
        if ($data == 0) {
            Ticket::factory(10)->create();
        }
    }
}
