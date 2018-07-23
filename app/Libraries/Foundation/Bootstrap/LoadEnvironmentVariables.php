<?php

namespace App\Libraries\Foundation\Bootstrap;

use Dotenv\Dotenv;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables as BaseLoadEnvironmentVariables;

class LoadEnvironmentVariables extends BaseLoadEnvironmentVariables
{
    public static $environments = [];

    /**
     * Bootstrap the given application.
     *
     * @param  \Illuminate\Contracts\Foundation\Application $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        $app->detectEnvironment(function () {
            return $this->environment(self::$environments);
        });

        $environmentConfig = $app->environmentFile() . '.' . $app->environment();
        // For run command
        $this->checkForSpecificEnvironmentFile($app);

        if (file_exists($app->environmentPath() . '/' . $environmentConfig)) {
            $this->setEnvironmentFilePath(
                $app,
                $environmentConfig
            );
        }

        try {
            (new Dotenv($app->environmentPath(),
                $app->environmentFile()))->load();
        } catch (InvalidArgumentException $e) {
            //
        }
    }

    /**
     * Grap the environment.
     *
     * @param  array $environments
     * @return string
     */
    protected function environment(array $environments = [])
    {
        static $currentEnv = null;

        if (!is_null($currentEnv)) {
            return $currentEnv ?: null;
        }

        $currentEnv = false;

        // This is checking for HTTP access.
        $domain = null;
        if (!app()->runningInConsole()) {
            $domain = request()->server('HTTP_HOST');
        }

        // This is checking for command access.
        $hostname = gethostname();

        foreach ($environments as $environment => $hosts) {
            foreach ((array)$hosts as $host) {
                $hostPattern = preg_quote($host, '#');
                $hostPattern = str_replace('\*', '.*', $hostPattern) . '\z';

                if ((bool)preg_match('#^' . $hostPattern . '#', $domain)
                    || ($host == $domain)
                    || ($host == $hostname)
                ) {
                    $currentEnv = $environment;
                    return $environment;
                }
            }
        }

        return;
    }
}
