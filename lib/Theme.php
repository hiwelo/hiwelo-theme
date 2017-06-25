<?php

namespace Hiwelo\Blog\Theme;

/**
 * Hiwelo's theme main class
 */
class Theme {
    /**
     * Theme class constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->flushRulesIfDevelopment();
    }

    /**
     * Returns the WordPress WP_Post_Type object for the asked taxonomy if
     * the asked taxonomy is already registered in WordPress
     *
     * @param string $term Asked taxonomy
     *
     * @return WP_Post_Type|boolean
     * @static
     */
    public static function getPostTypeByTaxonomy($term = 'category')
    {
        global $wp_taxonomies;

        // early termination if the term is not found in the registered taxonomies
        if (!array_key_exists($term, $wp_taxonomies)) {
            return false;
        }

        $postType = $wp_taxonomies[$term]->object_type[0];

        return get_post_type_object($postType);
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
