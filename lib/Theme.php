<?php

namespace Hiwelo\Blog\Theme;

class Theme {
    public function __construct()
    {
        $this->flushRulesIfDevelopment();
    }

    /**
     * Flush rewrite rules if we're in the development environment
     *
     * @return void
     */
    private function flushRulesIfDevelopment()
    {
        // early termination if there's no environment variable
        if (!array_key_exists('WP_ENV', $_ENV)) {
            return;
        }

        // early termination if the environment is not the development one
        if ($_ENV['WP_ENV'] !== 'development') {
            return;
        }

        flush_rewrite_rules();
        return;
    }
}
