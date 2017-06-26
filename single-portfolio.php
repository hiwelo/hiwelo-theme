<?php
/**
 * Portfolio single content page
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
use Timber\Post as TimberPost;

// gets Post Type object and add a title containing the label of the post type
$post = get_post();
$postType = get_post_type_object($post->post_type);
$pages = get_pages([
    'meta_key' => '_wp_page_template',
    'meta_value' => 'archive-' . $post->post_type . '.php',
]);

$context = Timber::get_context();
$context['page'] = new TimberPost($pages[0]->ID);
$context['post'] = new TimberPost($post->ID);
$context['previousLink'] = [
    'name' => __($postType->label),
    'href' => get_post_type_archive_link($post->post_type),
];

Timber::render('portfolio/single.twig', $context);
