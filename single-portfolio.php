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

$fields = get_fields();

$infoBoxInfosCounter = 0;
foreach ($fields as $field => $value) {
    switch ($field) {
        case 'client':
        case 'project_uri':
        case 'year':
            $infoBoxInfosCounter++;
            break;
    }
}

$context = Timber::get_context();
$context['page'] = new TimberPost($pages[0]->ID);
$context['post'] = new TimberPost($post->ID);
$context['fields'] = $fields;
$context['columns'] = $infoBoxInfosCounter;
$context['previousLink'] = [
    'name' => __($postType->label),
    'href' => get_post_type_archive_link($post->post_type),
];

Timber::render('portfolio/single.twig', $context);
