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
