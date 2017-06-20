<?php
 /**
  * Portfolio index page
  *
  * Template Name: Portfolio index
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

 $context = Timber::get_context();
 $context['post'] = new TimberPost();

 Timber::render('pages/portfolio.twig', $context);
