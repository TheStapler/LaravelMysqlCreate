<?php
namespace TheStapler\LaravelMysqlDbCreate;

use Illuminate\Support\ServiceProvider;
use TheStapler\LaravelMysqlDbCreate\Console\MysqlDbCreateCommand;

class MysqlDbCreateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MysqlDbCreateCommand::class,
            ]);
        }
    }
}
