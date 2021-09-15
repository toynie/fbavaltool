<?php
namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->app->bind(
            'App\Repositories\SetRepositoryInterface',
            'App\Repositories\SetRepository'
        );

        $this->app->bind(
            'App\Repositories\QuestionRepositoryInterface',
            'App\Repositories\QuestionRepository'
        );

        $this->app->bind(
            'App\Repositories\AnswerRepositoryInterface',
            'App\Repositories\AnswerRepository'
        );

        $this->app->bind(
            'App\Repositories\TransactionQARepositoryInterface',
            'App\Repositories\TransactionQARepository'
        );
        $this->app->bind(
            'App\Repositories\TransactionRepositoryInterface',
            'App\Repositories\TransactionRepository'
        );
        $this->app->bind(
            'App\Repositories\BussTypeRepositoryInterface',
            'App\Repositories\BussTypeRepository'
        );
        $this->app->bind(
            'App\Repositories\CustomAnswerRepositoryInterface',
            'App\Repositories\CustomAnswerRepository'
        );
    }
}
