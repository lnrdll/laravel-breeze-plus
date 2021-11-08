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
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers/BreezePlus'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Http/Controllers/BreezePlus', app_path('Http/Controllers/BreezePlus'));

        // Requests...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests/BreezePlus'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Http/Requests/BreezePlus', app_path('Http/Requests/BreezePlus'));

        // Rules...
        (new filesystem)->ensureDirectoryExists(app_path('Rules/'));
        (new filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Rules/', app_path('Rules/'));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/BreezePlus'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));

        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/BreezePlus', resource_path('views/BreezePlus'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/layouts', resource_path('views/layouts'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/components', resource_path('views/components'));

        // Tests...
        (new Filesystem)->ensureDirectoryExists(base_path('tests/Feature/BreezePlus'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/tests/Feature/BreezePlus', base_path('tests/Feature/BreezePlus'));

        // Routes...
        copy(__DIR__.'/../../stubs/default/routes/breezePlus.php', base_path('routes/breezePlus.php'));
        (new Filesystem)->append(base_path('routes/web.php'), 'require __DIR__.\'/breezePlus.php\';', null);

        $this->info('Breeze-plus scaffolding installed successfully.');
    }
}
