<?php

namespace Lib\Console;

require_once __DIR__ . '/../Global/Global.php';

use Illuminate\Console\Command;
use Lib\Support\Cache\Cache;

/**
 * Class CacheExpiredClearCommand
 * 
 * This command will clear expired cache.
 * 
 * @author Joshua Mclean
 */
class CacheExpiredClearCommand extends Command
{
    protected $signature = 'cache:clear';

    protected $description = 'Clear already expired cache.';

    public function handle()
    {
        try {
            $this->clearCache();
        } catch (\Throwable $th) {
            $this->showErrorMessage($th->getMessage());
        }
    }

    private function clearCache()
    {
        $this->comment('Clearing cache...');

        !Cache::clear() ?
            $this->showErrorMessage('- An error occurred while clearing the cache!') :
            $this->showSuccessMessage('- The cache has been successfully cleared.');
    }

    private function showErrorMessage($message)
    {
        $this->line('');
        $this->error($message);
        $this->line('');
    }

    private function showSuccessMessage($message)
    {
        $this->line('');
        $this->info($message);
        $this->line('');
    }
}
