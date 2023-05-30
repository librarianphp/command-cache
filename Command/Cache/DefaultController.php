<?php

namespace librarianphp\Cache;

use Minicli\Command\CommandController;

class DefaultController extends CommandController
{
    public function handle(): void
    {
        $this->info("./librarian cache [subcommand]", true);
        $this->info("Run \"./librarian cache clear\" to clear cached tags and pages.");
        $this->info("Run \"./librarian cache refresh\" to refresh the cache (clear and reload).");
    }
}
