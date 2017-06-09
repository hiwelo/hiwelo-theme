<?php
/**
 * PHP methods calling file
 *
 * PHP version 5
 *
 * @category    Theme
 * @package     hiwelo-theme
 * @author      Damien Senger <damien@raccoon.studio>
 * @link        https://codex.wordpress.org/Functions_File_Explained
 */

namespace Hiwelo\Blog\Theme;

use Timber\Timber;
use Timber\Menu as TimberMenu;

/**
 * Necessary files inclusion:
 *  - constants definition file
 */
require_once 'constants.php';

/**
 * Theme init
 */
$timber = new Timber();
$theme = new Theme();

/**
 * Custom generic context for Timber
 *
 * Add additionnal context data for the Timber::get_context() method
 */
add_filter('timber_context', function ($data) {
    $data['navigations']['main'] = new TimberMenu('primary');
    $data['navigations']['social'] = new TimberMenu('social');
    $data['site']->logo = get_custom_logo();
    return $data;
});
