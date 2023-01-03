<?php

namespace Corals\Modules\Utility\Guide\Providers;


use Corals\Modules\Utility\Guide\Models\Guide;
use Corals\Modules\Utility\Guide\Policies\GuidePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class UtilityAuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Guide::class => GuidePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
