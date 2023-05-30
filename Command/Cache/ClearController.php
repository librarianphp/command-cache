<?php

namespace librarianphp\Cache;

use Minicli\Command\CommandController;

class ClearController extends CommandController
{
    public function handle(): void
    {
        $config = $this->getApp()->config;
        if (!$config->has('cache_path')) {
            $this->error("Missing cache_path configuration.");
        }

        $cache_path = $config->cache_path;

        foreach (glob($cache_path . "/*.json") as $filename) {
            unlink($filename);
        }

        $this->success("Cache cleared.");
    }
}
