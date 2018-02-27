<?php

namespace App\Providers;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Bugsnag::registerCallback(function ($report) {
        $stacktrace = $report->getStacktrace();
        $frames = $stacktrace->getFrames();
        if ($frames[1]['method'] == "App\Calculator::logmsg") {
          $stacktrace->removeFrame(1);
        }
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->alias('bugsnag.logger', \Illuminate\Contracts\Logging\Log::class);
        $this->app->alias('bugsnag.logger', \Psr\Log\LoggerInterface::class);
    }
}
