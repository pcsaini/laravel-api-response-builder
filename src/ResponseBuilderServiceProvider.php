<?php

namespace Prem\ResponseBuilder;

use Illuminate\Support\ServiceProvider;

/**
 * Laravel API Response Builder
 *
 * @package   Prem\ResponseBuilder
 *
 * @author    Prem Chand Saini
 * @copyright 2022 Prem Chand Saini
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 */

class ResponseBuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('response_builder', ResponseBuilder::class);

        $this->mergeConfigFrom(__DIR__.'./../config/api-response.php', 'api-response');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePublishing();
    }

    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__.'./../config/api-response.php' => config_path('api-response.php'),
                ],
                'api-response-config'
            );
        }
    }
}
