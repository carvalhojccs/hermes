<?php

namespace App\Providers;

use App\Repositories\Contracts\DestinoRepositoryInterface;
use App\Repositories\Contracts\EmbalagemRepositoryInterface;
use App\Repositories\Contracts\MaterialRepositoryInterface;
use App\Repositories\Contracts\ModalRepositoryInterface;
use App\Repositories\Contracts\NumeracaoRepositoryInterface;
use App\Repositories\Contracts\OrigemRepositoryInterface;
use App\Repositories\Contracts\RemetenteRepositoryInterface;
use App\Repositories\Contracts\StatusRepositoryInterface;
use App\Repositories\Core\EloquentDestinoRepository;
use App\Repositories\Core\EloquentEmbalagemRepository;
use App\Repositories\Core\EloquentMaterialRepository;
use App\Repositories\Core\EloquentModalRepository;
use App\Repositories\Core\EloquentNumeracaoRepository;
use App\Repositories\Core\EloquentOrigemRepository;
use App\Repositories\Core\EloquentRemetenteRepository;
use App\Repositories\Core\EloquentStatusRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(RemetenteRepositoryInterface::class, EloquentRemetenteRepository::class);
       $this->app->bind(StatusRepositoryInterface::class, EloquentStatusRepository::class);
       $this->app->bind(ModalRepositoryInterface::class, EloquentModalRepository::class);
       $this->app->bind(EmbalagemRepositoryInterface::class, EloquentEmbalagemRepository::class);
       $this->app->bind(OrigemRepositoryInterface::class, EloquentOrigemRepository::class);
       $this->app->bind(MaterialRepositoryInterface::class, EloquentMaterialRepository::class);
       $this->app->bind(DestinoRepositoryInterface::class, EloquentDestinoRepository::class);
       $this->app->bind(NumeracaoRepositoryInterface::class, EloquentNumeracaoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
