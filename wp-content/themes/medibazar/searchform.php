<?php
/**
 * searchform.php
 * @package WordPress
 * @subpackage Medibazar
 * @since Medibazar 1.0
 * 
 */
 ?>
<div class="search_form">
	<form class="search-form" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get"> 
		<input type="text" name="s" placeholder="<?php esc_attr_e('Search...', 'medibazar') ?>" autocomplete="off">
		<button type="submit" title="Subscribe" class="btn icon_search" name="submit" value="Submit">
			<i class="fas fa-search"></i>
		</button>
	</form>
</div>