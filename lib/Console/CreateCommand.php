<?php

namespace Lib\Console;

require_once __DIR__ . '/../Global/Global.php';

use Illuminate\Console\Command;

/**
 * Class CreateCommand
 * 
 * This command will create a new command
 * 
 * @author Joshua McLean
 */
class CreateCommand extends Command
{
    protected $signature = 'create:command {name}';

    protected $description = 'Create a new command';

    public function handle()
    {
        try {
            $name = $this->argument('name');
            $filename = $this->getFilename($name);

            $this->comment('Creating a new command...');

            $this->commandExists($filename) ?
                $this->showErrorMessage('- The command already exists!') :
                $this->createNewCommand($filename, $name);
        } catch (\Throwable $th) {
            $this->showErrorMessage($th->getMessage());
        }
    }

    private function getFilename($name)
    {
        return sprintf("%s/Console/Commands/%s.php", app_path(), $name);
    }

    private function commandExists($filename)
    {
        return file_exists($filename);
    }

    private function createNewCommand($filename, $name)
    {
        $stub = $this->generateStub($name);
        file_put_contents($filename, $stub);

        $this->showSuccessMessage('- Command has been successfully created.');
    }

    private function generateStub($name)
    {
        return <<<EOD
            <?php

            namespace App\Console\Commands;

            use Illuminate\Console\Command;

            class $name extends Command
            {
                protected \$signature = '';
            
                protected \$description = '';
            
                public function handle()
                {
                    // 
                }
            }
            EOD;
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
