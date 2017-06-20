<?php
/**
 * Template index file
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

Timber::render('generic/layout.twig', Timber::get_context());
