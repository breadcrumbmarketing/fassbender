<?php $searchbutton = get_theme_mod('Fassbender_header_search_button','0'); ?>
<?php if($searchbutton == '1'){ ?>
<div class="header-search f-right d-none d-xl-block">
	<?php echo Fassbender_header_product_search(); ?>
</div>
<?php } ?>