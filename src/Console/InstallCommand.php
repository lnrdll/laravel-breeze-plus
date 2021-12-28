<?php

namespace Rlunardelli\BreezePlus\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'breeze-plus:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Breeze-plus controllers and resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Controllers...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers/Settings'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Http/Controllers/Settings', app_path('Http/Controllers/Settings'));

        // Requests...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests/Settings'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Http/Requests/Settings', app_path('Http/Requests/Settings'));

        // Rules...
        (new filesystem)->ensureDirectoryExists(app_path('Rules/'));
        (new filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Rules/', app_path('Rules/'));

        // Notifications...
        (new filesystem)->ensureDirectoryExists(app_path('Notifications/'));
        (new filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Notifications/', app_path('Notifications/'));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/settings'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));

        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/settings', resource_path('views/settings'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/layouts', resource_path('views/layouts'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/components', resource_path('views/components'));

        // Tests...
        (new Filesystem)->ensureDirectoryExists(base_path('tests/Feature/Settings'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/tests/Feature/Settings', base_path('tests/Feature/Settings'));

        // Routes...
        copy(__DIR__.'/../../stubs/default/routes/settings.php', base_path('routes/settings.php'));
        $this->appendToFile(base_path('routes/web.php'), "require __DIR__.'/settings.php';");

        $this->info('Breeze-plus installed successfully.');
    }

    /**
     * Append to file if string is not present
     *
     * @param mixed $path
     * @param mixed $data
     * @return void
     */
    protected function appendToFile($path, $data)
    {
        if (is_file($path)) {
            if (! strpos(file_get_contents($path), $data)) {
                file_put_contents($path, $data, FILE_APPEND);
            }
        }
    }
}
