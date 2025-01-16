<?php 
/*************************************************
## medibazar Typography
*************************************************/

function medibazar_custom_styling() { ?>

<style type="text/css">

<?php if (get_theme_mod( 'medibazar_mobile_single_sticky_cart',0 ) == 1) { ?>
@media(max-width:64rem){
	.single .section .product-type-simple form.cart {
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    z-index: 9999;
	    background: #fff;
	    margin-bottom: 0;
	    padding: 15px;
	    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    justify-content: space-between;
		width: 100%;
		display: flex;
		
	}

	.single .woocommerce-variation-add-to-cart {
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    z-index: 9999;
	    background: #fff;
	    margin-bottom: 0;
	    padding: 15px;
	    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    justify-content: space-between;
    	width: 100%;
	}
	
	.single .section .product-type-simple form.cart button.single_add_to_cart_button ,
	.single .section form.cart .woocommerce-variation-add-to-cart button.single_add_to_cart_button {
		padding-right:15px;
		padding-left:15px;
		margin-top:0px;
	}
}

<?php } ?>

<?php if (get_theme_mod( 'medibazar_shop_breadcrumb_bg' )) { ?>
.klb-shop-breadcrumb{
	background-image: url(<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'medibazar_shop_breadcrumb_bg' )) ); ?>);
}
<?php } ?>

<?php if (get_theme_mod( 'medibazar_blog_breadcrumb_bg' )) { ?>
.klb-blog-breadcrumb{
	background-image: url(<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'medibazar_blog_breadcrumb_bg' )) ); ?>);
}
<?php } ?>

.theme-bg {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.theme-color {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

#scrollUp {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.header-top-info span a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.header-link span a {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.shop-menu ul li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.menu-bar a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.header-search-form button:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.header-lang-list {
  border-top: 3px solid <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.header-lang-list li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.header-icon a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.menu-02 .shop-menu ul li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.menu-bar-2 a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.header-02-search .header-search-form button {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.menu-03 .header-search-form button:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.cart-icon a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.close-icon > button {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.social-icon-right > a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.side-menu ul li:hover a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.main-menu ul li.active > a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.main-menu ul li:hover > a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.menu-02 .main-menu nav > ul > li:hover > a, .menu-02 .main-menu nav > ul > li.active > a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.menu-03 .main-menu nav > ul > li:hover > a, .menu-03 .main-menu nav > ul > li.active > a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.main-menu ul li .sub-menu {
  border-top: 3px solid <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.main-menu ul li .sub-menu li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.category-menu {
  border-top: 3px solid <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.category-menu ul li a::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.category-menu ul li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.category-menu ul li a i {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.section-title h2 > span {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.slider-active button.slick-arrow {
  border: 4px solid <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.slider-active button:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.c-btn {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.red-btn:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.b-button > a::after {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.b-button > a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.red-b-button > a::after {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.gray-b-button > a::after {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.banners-active .slick-dots li.slick-active button {
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.product-tab ul li a::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.product-tab ul li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.product-tab ul li a.active {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.action-btn {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.product-action a.c-btn:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.product-text h4 a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.hot-3 {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.cat-title::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.category-item ul li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.category-item ul li:hover::before {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.pro-tab ul li a:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.pro-tab ul li a.active {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.product-02-tab ul li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.product-02-tab li a.active {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.c-2 {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.p--4 {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.stock {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.pro-details-icon > a:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.pro-02-list-icon a:hover {
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.bakix-details-tab ul li a.active {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.bakix-details-tab ul li a.active:before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.forgot-login a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.deal-02-wrapper .deal-count .time-count:nth-child(3)::after {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.deal-content h2 {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.testimonial-wrapper:hover {
  border: 3px solid <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.test-text {
  position: relative;
}
.test-text::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.test-active button.slick-arrow:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.client-text::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.test-02-active button.slick-arrow:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.test-03-active button.slick-arrow:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.blog-wrapper:hover .blog-img::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.blog-text h4 > a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.color-2 {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.blog-meta span > a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.search-form button:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.widget-title::after {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.blog-side-list li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.widget-posts-title a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
ul.cat li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.basic-pagination ul li.active a {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.basic-pagination ul li:hover a {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.post-text blockquote {
  border-left: 5px solid <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.blog-post-tag a:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.blog-share-icon a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.b-author {
  border-left: 5px solid <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.author-icon a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.avatar-name span {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.reply:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.bakix-navigation span a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.bakix-navigation h4 a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.fe-1 {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.p-feature-text > a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.feature-02-wrapper::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.feature-02-wrapper::after {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.instagram-icon i:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.footer-icon a:hover {
  border: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.footer-link ul li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.footer-bottom-link ul li a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.breadcrumb-wrapper::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.about-tag {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.about-text h4 i {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.team-icon a:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.team-text span {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.contact-address-icon i {
  color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.contacts-form input:focus {
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

.contacts-form textarea:focus {
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

button.button,
a.checkout-button,
p.woocommerce-mini-cart__buttons.buttons a {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}

button.single_add_to_cart_button:hover {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.klb-product a.tinvwl_add_to_wishlist_button {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.klb-product a.added_to_cart {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.bakix-details-tab ul li.active a:before {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.blog-area .col-xl-4:nth-child(even) span.blog-tag.color-1 {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
ul.page-numbers span.current {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
ul.page-numbers li:hover a {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.widget_price_filter button.button {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
input[type="submit"] {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.breadcrumb-menu li span {
    color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.top-cart-row .dropdown-cart .lnk-cart {
	background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
nav.woocommerce-MyAccount-navigation ul li a {
    background-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
    border: 1px solid <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
input.wpcf7-form-control.wpcf7-submit {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
blockquote {
    border-left: 5px solid <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.tagcloud a:hover{
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
a.comment-reply-link:hover {
    color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.elementor-accordion-item div.elementor-tab-title {
    background-color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?> !important;
}
.klb-pagination span.post-page-numbers.current, 
.klb-pagination a:hover {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.wp-block-search button.wp-block-search__button {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.return-to-shop a.button.wc-backward {
    background: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.blog-standard .blog-meta span i {
    color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}
.post.pingback a.comment-edit-link {
    color: <?php echo esc_attr(get_theme_mod('medibazar_main_color' )); ?>;
}


.invalid-feedback {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.btn-danger {
  background-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.btn-danger.disabled, .btn-danger:disabled {
  background-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.btn-outline-danger {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.btn-outline-danger:hover {
  background-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.btn-outline-danger.disabled, .btn-outline-danger:disabled {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.btn-outline-danger:not(:disabled):not(.disabled):active, .btn-outline-danger:not(:disabled):not(.disabled).active, .show > .btn-outline-danger.dropdown-toggle {
  background-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.badge-danger {
  background-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.bg-danger {
  background-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?> !important;
}
.border-danger {
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?> !important;
}
.text-danger {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?> !important;
}
.header-top-info span i {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.header-02-search .header-search-form button:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.hero-slider-caption > span {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.hero-slider-caption p::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.slider-caption span {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.slider-caption span::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.slide-price {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.c-btn:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.red-btn {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.red-b-button > a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.red-b-button > a::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.new-price {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.action-btn:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.product-action a.c-btn {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.product-text span {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.hot-1 {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.category-sidebar {
  background-image: -moz-linear-gradient(-48deg, rgba(78, 151, 253, 0.12157) 0%, rgba(126, 130, 191, 0.11) 32%, rgba(228, 87, 61, 0.1) 99%, <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?> 100%);
  background-image: -webkit-linear-gradient(-48deg, rgba(78, 151, 253, 0.12157) 0%, rgba(126, 130, 191, 0.11) 32%, rgba(228, 87, 61, 0.1) 99%, <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?> 100%);
  background-image: -ms-linear-gradient(-48deg, rgba(78, 151, 253, 0.12157) 0%, rgba(126, 130, 191, 0.11) 32%, rgba(228, 87, 61, 0.1) 99%, <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?> 100%);
}
.cat-side .b-03-tag {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.c-1 {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.p--1 {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.cart-plus-minus .qtybutton:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.basic-login label span {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.forgot-login a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.table-content table td.product-name a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.coupon-accordion h3 {
  border-top: 3px solid <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.coupon-info p.form-row-first label span.required, .coupon-info p.form-row-last label span.required {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.country-select label span.required, .checkout-form-list label span.required {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.your-order-table table tr.order-total td span {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.order-button-payment input:hover {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.deal-02-wrapper .deal-count .time-count:nth-child(2)::after {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.deal-content > span {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.test-text span {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.test-active .slick-dots li.slick-active button {
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.client-text h4 span {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.test-02-active .slick-dots li.slick-active button {
  border-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.test-02-text > span::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.color-1 {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.fe-2 {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.feature-02-wrapper:hover::before {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.feature-02-wrapper:hover::after {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.feature-02-wrapper .p-feature-text a:hover {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.copyright p a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.breadcrumb-menu li a {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.counter-icon i {
  color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.cta-text span {
  background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
button.button:hover,
a.checkout-button:hover,
p.woocommerce-mini-cart__buttons.buttons a:hover {
    background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
button.single_add_to_cart_button {
    background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.klb-product del {
    color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.klb-product a.tinvwl_add_to_wishlist_button:hover {
    background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.klb-product a.added_to_cart:hover {
    background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.product-details-wrapper p.price {
    color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.ajax_quick_view .product_price {
    color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.ui-slider .ui-slider-range {
	background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?> !important;
	border: 1px solid <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.widget_price_filter button.button:hover {
    background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
span.required,
abbr.required {
    color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
input[type="submit"]:hover {
    background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.woocommerce-form-coupon-toggle {
    border-top: 3px solid <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
nav.woocommerce-MyAccount-navigation ul li.is-active a, nav.woocommerce-MyAccount-navigation ul li a:hover {
    background-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.woocommerce-MyAccount-content a {
    color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
input.wpcf7-form-control.wpcf7-submit:hover {
	background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.widget_single_banner .b-03-tag {
    background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.blog-area .widget.widget_single_banner {
    background-image: -moz-linear-gradient(-48deg, rgba(78, 151, 253, 0.12157) 0%, rgba(126, 130, 191, 0.11) 32%, rgba(228, 87, 61, 0.1) 99%, <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?> 100%);
    background-image: -webkit-linear-gradient(-48deg, rgba(78, 151, 253, 0.12157) 0%, rgba(126, 130, 191, 0.11) 32%, rgba(228, 87, 61, 0.1) 99%, <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?> 100%);
    background-image: -ms-linear-gradient(-48deg, rgba(78, 151, 253, 0.12157) 0%, rgba(126, 130, 191, 0.11) 32%, rgba(228, 87, 61, 0.1) 99%, <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?> 100%);
}
.wp-block-search button.wp-block-search__button:hover {
    background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
div.woocommerce-variation-price span.price {
    color: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}
.return-to-shop a.button.wc-backward:hover {
    background: <?php echo esc_attr(get_theme_mod('medibazar_second_color' )); ?>;
}

.header-top-area {
    background-color: <?php echo esc_attr(get_theme_mod('medibazar_top_header_bg' )); ?>;
}

.shop-menu ul li a  {
    color: <?php echo esc_attr(get_theme_mod('medibazar_top_header_font_color' )); ?>;
}

.shop-menu ul li a:hover {
    color: <?php echo esc_attr(get_theme_mod('medibazar_top_header_font_hvrcolor' )); ?>;
}

.main-menu-area , header .sticky{
    background-color: <?php echo esc_attr(get_theme_mod('medibazar_main_header_bg' )); ?>;
}

.main-menu ul li a , .main-menu ul li .sub-menu li a  {
    color: <?php echo esc_attr(get_theme_mod('medibazar_main_header_font_color' )); ?>;
}

.main-menu ul li:hover > a, .main-menu ul li .sub-menu li a:hover , .main-menu ul li.active > a{
    color: <?php echo esc_attr(get_theme_mod('medibazar_main_header_font_hvrcolor' )); ?>;
}

.footer-area {
    background-color: <?php echo esc_attr(get_theme_mod('medibazar_footer_top_bg' )); ?>;
}

h3.footer-title {
    color: <?php echo esc_attr(get_theme_mod('medibazar_footer_top_widget_title_color' )); ?>;
}

h3.footer-title:hover {
    color: <?php echo esc_attr(get_theme_mod('medibazar_footer_top_widget_title_hvrcolor' )); ?>;
}


.footer-area p,
.klbfooterwidget ul li a,
.footer-icon a {
    color: <?php echo esc_attr(get_theme_mod('medibazar_footer_top_widget_text_color' )); ?>;
}

.footer-area p:hover,
.klbfooterwidget ul li a:hover,
.footer-icon a:hover {
    color: <?php echo esc_attr(get_theme_mod('medibazar_footer_top_widget_text_hvrcolor' )); ?>;
}

.footer-bottom-area {
    background-color: <?php echo esc_attr(get_theme_mod('medibazar_footer_bottom_bg' )); ?>;
}

.footer-bottom-link ul li a,
.copyright p {
    color: <?php echo esc_attr(get_theme_mod('medibazar_footer_bottom_font_color' )); ?>;
}

.footer-bottom-link ul li a:hover,
.copyright p:hover {
    color: <?php echo esc_attr(get_theme_mod('medibazar_footer_bottom_font_hvrcolor' )); ?>;
}

.footer-fix-nav{
	background-color: <?php echo esc_attr(get_theme_mod( 'medibazar_mobile_menu_bg_color' )); ?>;
}

.footer-fix-nav .col{
	border-right-color: <?php echo esc_attr(get_theme_mod( 'medibazar_mobile_menu_border_color' )); ?>;
}

.footer-fix-nav a i{
	color: <?php echo esc_attr(get_theme_mod( 'medibazar_mobile_menu_icon_color' )); ?>;
}

.footer-fix-nav a i:hover{
	color: <?php echo esc_attr(get_theme_mod( 'medibazar_mobile_menu_icon_hvrcolor' )); ?>;
}

<?php if(get_theme_mod( 'medibazar_preloader_image' )){ ?>
#preloader{
	background: #fff url('<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'medibazar_preloader_image' )) ); ?>') no-repeat center center; 
}
<?php } ?>
</style>
<?php }
add_action('wp_head','medibazar_custom_styling');

?>