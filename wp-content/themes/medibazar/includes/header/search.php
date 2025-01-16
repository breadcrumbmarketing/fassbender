<?php $searchbutton = get_theme_mod('medibazar_header_search_button','0'); ?>
<?php if($searchbutton == '1'){ ?>
<div class="header-search f-right d-none d-xl-block">
	<?php echo medibazar_header_product_search(); ?>
</div>
<?php } ?>