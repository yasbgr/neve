<?php
/**
 * Test file not part of the project
 *
 * @package HFG
 */
$header_components = array(
	'HFG\Core\Components\Logo',
	'HFG\Core\Components\MenuIcon',
	'HFG\Core\Components\Nav',
	'HFG\Core\Components\Button',
	'HFG\Core\Components\CustomHtml',
	'HFG\Core\Components\Search',
	'HFG\Core\Components\SearchResponsive',
	'HFG\Core\Components\SecondNav',
);
if ( class_exists( 'WooCommerce' ) ) {
	$header_components[] = 'HFG\Core\Components\CartIcon';
}

add_theme_support(
	'hfg_support',
	array(
		'builders' => array(
			'HFG\Core\Builder\Header' => $header_components,
			'HFG\Core\Builder\Footer' => array(
				'HFG\Core\Components\FooterWidgetOne',
				'HFG\Core\Components\FooterWidgetTwo',
				'HFG\Core\Components\FooterWidgetThree',
				'HFG\Core\Components\FooterWidgetFour',
				'HFG\Core\Components\NavFooter',
				'HFG\Core\Components\Copyright',
			),
		),
	)
);
require_once 'functions-template.php';
require_once 'functions-migration.php';

add_action(
	'neve_do_footer',
	function () {
		echo '<footer class="site-footer hfg_footer " id="site-footer">
	<div class="footer--row footer-bottom layout-full-contained" id="cb-row--footer-bottom" data-row-id="bottom" data-show-on="desktop">
	<div class="footer--row-inner footer-bottom-inner dark-mode footer-content-wrap">
		<div class="container">
			<div class="hfg-grid hfg-grid-bottom   nv-footer-content">
				<div class="builder-item col-12 col-md-12 col-sm-12 hfg-item-center hfg-item-first hfg-item-last"><div class="item--inner builder-item--footer_copyright" data-section="footer_copyright" data-item-id="footer_copyright">
	<div class="component-wrap">
	<p>توسعه سایت توسط: <a href="https://mihanwp.com">میهن وردپرس</a></p></div>

	</div>

</div>			</div>
		</div>
	</div>
</div>

</footer>';
	}
);

add_action(
	'neve_do_header',
	function () {
		do_action( 'hfg_header_render' );
	}
);
if ( version_compare( PHP_VERSION, '5.3.29' ) > 0 && class_exists( 'HFG\Main' ) ) {
	add_action( 'after_setup_theme', 'HFG\Main::get_instance' );
}
