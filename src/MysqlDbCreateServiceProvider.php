<?php
namespace TheStapler\LaravelMysqlDbCreate;

use Illuminate\Support\ServiceProvider;
use TheStapler\LaravelMysqlDbCreate\Console\MysqlDbCreateCommand;

class MysqlDbCreateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            MysqlDbCreateCommand::class,
        ]);
//        //dd('this');
//        if ($this->app->runningInConolse()) {
//            $this->commands([
//                MysqlDbCreateCommand::class,
//            ]);
//        }
    }
}
