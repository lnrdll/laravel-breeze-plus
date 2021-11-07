<?php

namespace Rlunardelli\LaravelBreezePlus\Console;

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
        // ✅ Controllers...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers/BreezePlus'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Http/Controllers/BreezePlus', app_path('Http/Controllers/BreezePlus'));

        // ✅ Requests...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests/BreezePlus'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Http/Requests/BreezePlus', app_path('Http/Requests/BreezePlus'));

        // ✅ Rules...
        (new filesystem)->ensureDirectoryExists(app_path('Http/Rules/BreezePlus'));
        (new filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Http/Rules/BreezePlus', app_path('Http/Rules/BreezePlus'));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/BreezePlus'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));

        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/BreezePlus', resource_path('views/BreezePlus'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/layouts', resource_path('views/layouts'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/components', resource_path('views/components'));

        copy(__DIR__.'/../../stubs/default/resources/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));

        // Components...
        (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/View/Components', app_path('View/Components'));

        // Tests...
        $this->installTests();

        // Routes...
        copy(__DIR__.'/../../stubs/default/routes/BreezePlus.php', base_path('routes/BreezePlus.php'));
        append(__DIR__.'/../../stubs/default/routes/web.php', 'require __DIR__.\'/breezePlus.php\';');

        $this->info('Breeze-plus scaffolding installed successfully.');
    }

    /**
     * Install Breeze's tests.
     *
     * @return void
     */
    protected function installTests()
    {
        (new Filesystem)->ensureDirectoryExists(base_path('tests/Feature/BreezePlus'));

        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/tests/Feature', base_path('tests/Feature/BreezePlus'));
    }
}
