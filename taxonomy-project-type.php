<?php
/**
 * Portfolio's project type taxonomy archive page
 *
 * Template Name: Project Type archive
 *
 * PHP version 5
 *
 * @category    Theme
 * @package     hiwelo-theme
 * @author      Damien Senger <damien@raccoon.studio>
 * @link        https://codex.wordpress.org/Template_Hierarchy
 */

namespace Hiwelo\Blog\Theme;

use Timber\Timber;
use Timber\Term as TimberTerm;

$term = new TimberTerm();
$postType = Theme::getPostTypeByTaxonomy($term->taxonomy);

$context = Timber::get_context();
$context['page'] = new TimberTerm();
$context['page']->title = '<span>' . __('Projects:') . '</span>' . $context['page']->title;
$context['posts'] = Timber::get_posts();
$context['previousLink'] = [
    'name' => __($postType->label),
    'href' => get_post_type_archive_link($postType->name),
];

Timber::render('pages/archive.twig', $context);
