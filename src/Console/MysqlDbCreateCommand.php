<?php

namespace TheStapler\LaravelMysqlDbCreate\Console;

use Illuminate\Console\Command;

class MysqlDbCreateCommand extends Command
{
    protected $signature = 'db:mysqlcreate';

    protected $description = 'Create a database on your MySQL server';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $database = env('DB_DATABASE', false);
        if(! $database) {
            $this->info('Skipping database creation because env(DB_DATABASE) is undefined');
            return;
        }

        try {
            $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));
            $pdo->exec(sprintf(
                'CREATE DATABASE IF NOT EXISTS %s CHARACTER SET %s COLLATE %s;',
                $database,
                env('DB_CHARSET', 'utf8mb4'),
                env('DB_COLLATION', 'utf8mb4_unicode_ci')
            ));
            $this->info(sprintf('Successfully created %s database!', $database));
        } catch (\PDOException $exception) {
            $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }
    }

    private function getPDOConnection($host, $port, $username, $password)
    {
        return new \PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
