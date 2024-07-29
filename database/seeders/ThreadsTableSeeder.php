<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Models\Thread;
use Database\Factories\ReplyFactory;
use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thread::factory()->count(10)->create(['author_id' => 2]);

        Reply::factory()->create(['author_id' => 2, 'replyable_id' => 1]);
        Reply::factory()->create(['author_id' => 2, 'replyable_id' => 1]);
        Reply::factory()->create(['author_id' => 2, 'replyable_id' => 2]);
        Reply::factory()->create(['author_id' => 2, 'replyable_id' => 2]);
    }
}
