<?php

namespace App\Providers\Resource;

use App\Interfaces\IResourceService;
use App\Services\ResourceService;
use Illuminate\Support\ServiceProvider;

class ResourceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IResourceService::class, ResourceService::class);
    }
}

?>