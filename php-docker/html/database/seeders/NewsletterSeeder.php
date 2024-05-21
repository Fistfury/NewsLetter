<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Newsletter;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        $newsletters = Newsletter::factory(5)->make()->each(function ($newsletter) use ($users) {
            $newsletter->user_id = $users->random()->id;
            $newsletter->save();
        });

        foreach ($newsletters as $newsletter) {
            Subscription::factory(3)->create([
                'newsletter_id' => $newsletter->id,
                'user_id' => function() {
                    return User::inRandomOrder()->first()->id;
                }
            ]);
        }
    }

    
}

