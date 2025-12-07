<?php

namespace Phellar\Scaffold\Commands;

use Illuminate\Console\Command;

class ScaffoldCommand extends Command
{
    public $signature = 'scaffold:gateway {name?}';

    public $description = 'Scaffold and integrate any african payment gateway';

    public function handle(): int
    {
        $this->info('Hello from your scaffold package!');

        // $this->comment('All done! happy building');

        return self::SUCCESS;
    }
}
