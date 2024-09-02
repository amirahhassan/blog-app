<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\UserSeeder;

class GenerateFakeUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-fake-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate 1,000 fake users with some verified and some unverified';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting user generation...');

        // Run the UserSeeder to generate users
        $seeder = new UserSeeder();
        $seeder->run();

        $this->info('1,000 users generated successfully!');

        return Command::SUCCESS;
    }
}
