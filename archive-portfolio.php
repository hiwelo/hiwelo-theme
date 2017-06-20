<?php
/**
 * Portfolio index page
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
$postType = get_queried_object();
$postType->title = $postType->label;

$context = Timber::get_context();
$context['postType'] = $postType;
$context['posts'] = Timber::get_posts();

Timber::render('portfolio/archive.twig', $context);
