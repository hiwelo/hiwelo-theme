<?php

namespace Hiwelo\Blog\Theme;

class Theme {
    public function __construct()
    {
        $this->flushRulesIfDevelopment();
    }

    /**
     * Flush rewrite rules if we're in the development environment
     * or if someone call the ?flush_all in the URL
     *
     * @return void
     */
    private function flushRulesIfDevelopment()
    {
        // early termination if there's no environment variable
        if (!array_key_exists('WP_ENV', $_ENV) && !isset($_GET['flush_all'])) {
            return;
        }

        // early termination if the environment is not the development one
        if ($_ENV['WP_ENV'] !== 'development' && !isset($_GET['flush_all'])) {
            return;
        }

        flush_rewrite_rules();
        return;
    }
}
