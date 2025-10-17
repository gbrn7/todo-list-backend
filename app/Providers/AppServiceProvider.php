<?php

namespace App\Providers;

use App\Http\Repositories\ToDoListRepository;
use App\Http\Services\ToDoListService;
use App\Support\Interfaces\Repositories\ToDoListRepositoryInterface;
use App\Support\Interfaces\Services\ToDoListServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ToDoListRepositoryInterface::class, ToDoListRepository::class);
        $this->app->bind(ToDoListServiceInterface::class, ToDoListService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
