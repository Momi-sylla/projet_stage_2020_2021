<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new mysql database based config file or the provided';

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
     * @return int
     */
    public function handle()
    {
       $schemaName = $this->argument('name') ?: config('database.connections.mysql.database');
       
       $charset = config('database.connections.mysql.charset','utf8mb4');
       $collation = config('database.connections.mysql.collation','utf8_general_ci');

       $query = "drop DATABASE if exists $schemaName";
       DB::statement($query);

       $query  = "CREATE DATABASE IF NOT EXISTS  $schemaName CHARACTER SET $charset COLLATE $collation";
       DB::statement($query);
        echo "DATABASE $schemaName created successfully";
       config(['database.connections.mysql.database'=>$schemaName]);
        return 0;
    }
}
