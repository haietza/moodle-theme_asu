<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * The two column layout.
 *
 * @package   theme_asu
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_asu_get_html_for_settings($OUTPUT, $PAGE);

$left = (!right_to_left());  // To know if to add 'pull-right' and 'desktop-first-column' classes in the layout for LTR.
echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" href="<?php echo $OUTPUT->pix_url('apple-touch-icon', 'theme'); ?>"/>
</head>

<body <?php echo $OUTPUT->body_attributes('two-column'); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php require_once(dirname(__FILE__).'/includes/header.php'); ?>
<div id="page-wrapper">
	<div id="page" class="container-fluid">

	    <header id="page-header" class="clearfix">
	        <div id="course-header">
	            <?php echo $OUTPUT->course_header(); ?>
	        </div>
	    </header>

	    <div id="page-content" class="row-fluid">
	        <section id="region-main" class="span9<?php if ($left) { echo ' pull-right'; } ?>">
	        <div id="page-navbar" class="clearfix">
	            <nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
	            <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
	        </div>
	        <?php
	            echo $OUTPUT->course_content_header();
	            echo $OUTPUT->main_content();
	            echo $OUTPUT->course_content_footer();
	            ?>
	        </section>
	        <?php
	        $classextra = '';
	        if ($left) {
	            $classextra = ' desktop-first-column';
	        }
	        echo $OUTPUT->blocks('side-pre', 'span3'.$classextra);
	        ?>
	    </div>
	</div>
</div>

<?php require_once(dirname(__FILE__).'/includes/footer.php'); ?>

</body>
</html>
