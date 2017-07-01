<?php
/**
 * Blog index page
 *
 * Template Name: Portfolio archive
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
$pageID = get_option('page_for_posts');

$context = Timber::get_context();
$context['page'] = new TimberPost($pageID);
$context['posts'] = Timber::get_posts();

Timber::render('pages/home.twig', $context);
