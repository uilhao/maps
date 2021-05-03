<?php
/**
 * Displays the site header.
 *
 * @package Maps
 * @subpackage Maps
 * @since 1.0.0
 */

$wrapper_classes  = '';
$wrapper_classes .= true === get_theme_mod( 'display_title_and_tagline', true ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>

<div class="banner position-relative overflow-hidden text-center">
	<div class="col-md-6 p-lg-6 mx-auto">
		<div class="flex d-none d-md-block d-lg-block d-xl-block">
			<br/>
			<br/>
			<br/>
		</div>
	</div>
</div>