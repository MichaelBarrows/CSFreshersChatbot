<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class databaseData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the database tables and seed them.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Reseting database.');
        $this->call('migrate:reset');
        $this->info("Migrating tables.");
        $this->call('migrate');
        $this->info("Adding seed data.");
        $this->call('db:seed');

    }
}
