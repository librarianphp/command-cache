<?php

namespace librarianphp\Cache;

use Librarian\Provider\ContentServiceProvider;
use Minicli\Command\CommandController;

class RefreshController extends CommandController
{
    public function handle(): void
    {
        /** @var ContentServiceProvider $content_provider */
        $content_provider = $this->getApp()->content;

        $config = $this->getApp()->config;
        if (!$config->has('cache_path')) {
            $this->error("Missing cache_path configuration.");
        }

        $cache_path = $config->cache_path;

        $this->info("Clearing cache...");
        foreach (glob($cache_path . "/*.json") as $filename) {
            unlink($filename);
        }

        $content_provider->fetchTagList();

        $this->success("Cache updated.");
    }
}
