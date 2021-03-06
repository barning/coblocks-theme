<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CoBlocks
 */

/**
 * CoBlocks only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_parent_theme_file_path( '/inc/back-compat.php' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function coblocks_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on CoBlocks, use a find and replace
	 * to change 'coblocks' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'coblocks', get_parent_theme_file_path( '/languages' ) );

	/*
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Filter CoBlocks's custom-background support argument.
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 * }
	 */
	$args = array(
		'default-color' => 'ffffff',
	);
	add_theme_support( 'custom-background', $args );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'coblocks-featured-image', 1736, 9999, false );

	// Set the content width in pixels, based on the theme's design and stylesheet.
	$GLOBALS['content_width'] = apply_filters( 'coblocks_content_width', 700 );

	/*
	 * This theme uses wp_nav_menu() in the following locations.
	 */
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'coblocks' ),
			'footer'  => esc_html__( 'Footer Menu', 'coblocks' ),
			'social'  => esc_html__( 'Social Menu', 'coblocks' ),
		)
	);

	/*
	 * Switch default core coblocksup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Customizer Selective Refresh.
	 * See: https://make.wordpress.org/core/2016/02/16/selective-refresh-in-the-customizer/
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for the WordPress default Theme Logo
	 * See: https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo', array(
			'flex-width' => true,
		)
	);

	/**
	 * Custom colors for use in the editor.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
	 */
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Vulcan', 'coblocks' ),
				'slug'  => 'first',
				'color' => '#191521',
			),
			array(
				'name'  => esc_html__( 'Marlin', 'coblocks' ),
				'slug'  => 'second',
				'color' => '#363b40',
			),
			array(
				'name'  => esc_html__( 'Nevada', 'coblocks' ),
				'slug'  => 'third',
				'color' => '#565d67',
			),
			array(
				'name'  => esc_html__( 'Mantatee', 'coblocks' ),
				'slug'  => 'fourth',
				'color' => '#8f949e',
			),
			array(
				'name'  => esc_html__( 'Desert Storm', 'coblocks' ),
				'slug'  => 'fifth',
				'color' => '#f5f5f5',
			),
			array(
				'name'  => esc_html__( 'White', 'coblocks' ),
				'slug'  => 'sixth',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__( 'Torea Bay', 'coblocks' ),
				'slug'  => 'seventh',
				'color' => '#1e35b9',
			),
			array(
				'name'  => esc_html__( 'Glitter', 'coblocks' ),
				'slug'  => 'eigth',
				'color' => '#E7E9FB',
			),
			array(
				'name'  => esc_html__( 'Peppermint', 'coblocks' ),
				'slug'  => 'nineth',
				'color' => '#d0eac4',
			),
			array(
				'name'  => esc_html__( 'Pipi', 'coblocks' ),
				'slug'  => 'tenth',
				'color' => '#fbf3d6',
			),
		)
	);

	/**
	 * Custom font sizes for use in the editor.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-font-sizes
	 */
	add_theme_support(
		'editor-font-sizes', array(
			array(
				'name'      => esc_html__( 'Small', 'coblocks' ),
				'shortName' => esc_html__( 'S', 'coblocks' ),
				'size'      => 16,
				'slug'      => 'small',
			),
			array(
				'name'      => esc_html__( 'Regular', 'coblocks' ),
				'shortName' => esc_html__( 'M', 'coblocks' ),
				'size'      => 19,
				'slug'      => 'regular',
			),
			array(
				'name'      => esc_html__( 'Large', 'coblocks' ),
				'shortName' => esc_html__( 'L', 'coblocks' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => esc_html__( 'Huge', 'coblocks' ),
				'shortName' => esc_html__( 'XL', 'coblocks' ),
				'size'      => 32,
				'slug'      => 'huge',
			),
		)
	);

	// Add support for default block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'assets/css/style-editor.css' );

	// Enqueue fonts in the editor.
	add_editor_style( coblocks_fonts_url() );

	/*
	 * Define starter content for the theme.
	 * See: https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
	 */
	$starter_content = array(
		'options'     => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
		),

		'attachments' => array(
			'image-logo' => array(
				'post_title' => _x( 'Logo', 'Theme starter content', 'coblocks' ),
				'file'       => 'assets/images/logo.png',
			),
		),

		'theme_mods'  => array(
			'show_on_front'         => 'page',
			'page_for_posts'        => '{{blog}}',
			'blogdescription'       => _x( 'CoBlocks, A beautiful Gutenberg WordPress theme', 'Theme starter content', 'coblocks' ),
			'custom_logo'           => '{{image-logo}}',
			'custom_logo_max_width' => coblocks_defaults( 'custom_logo_max_width' ),
		),

		'widgets'     => array(
			'sidebar-1' => array(
				'text_about',
			),
		),

		'nav_menus'   => array(
			'primary' => array(
				'name'  => esc_html__( 'Primary Menu', 'coblocks' ),
				'items' => array(
					'page_blog'    => array(
						'title' => _x( 'Articles', 'Theme starter content', 'coblocks' ),
					),
					'page_about'   => array(
						'title' => _x( 'About', 'Theme starter content', 'coblocks' ),
					),
					'page_contact' => array(
						'title' => _x( 'Contact', 'Theme starter content', 'coblocks' ),
					),
				),
			),
			'social'  => array(
				'name'  => esc_html__( 'Social Menu', 'coblocks' ),
				'items' => array(
					'link_twitter',
					'link_instagram',
				),
			),
		),
	);

	/**
	 * Filters CoBlocks array of starter content.
	 *
	 * @since CoBlocks 1.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'coblocks_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'coblocks_setup' );

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function coblocks_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'coblocks' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears in the site footer.', 'coblocks' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h6 class="h2">',
			'after_title'   => '</h6>',
		)
	);
}
add_action( 'widgets_init', 'coblocks_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function coblocks_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'coblocks-fonts', coblocks_fonts_url(), false, '@@pkg.version', 'all' );

	// Theme stylesheet.
	wp_enqueue_style( 'coblocks-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// Scripts.
	wp_enqueue_script( 'coblocks-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '@@pkg.version', true );
	wp_enqueue_script( 'coblocks-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '@@pkg.version', true );

	// Load the standard WordPress comments reply javascript.
	if ( is_singular( 'post' ) && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Translations in the custom functions.
	$coblocks_l10n['expand']   = __( 'Expand child menu', 'coblocks' );
	$coblocks_l10n['collapse'] = __( 'Collapse child menu', 'coblocks' );
	// $coblocks_l10n['icon']     = coblocks_get_svg(
	// array(
	// 'icon'     => 'down',
	// 'fallback' => true,
	// )
	// );
	wp_localize_script( 'coblocks-navigation', 'coblocksScreenReaderText', $coblocks_l10n );
}
add_action( 'wp_enqueue_scripts', 'coblocks_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function coblocks_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'coblocks_skip_link_focus_fix' );

/**
 * Enqueue inline script for the accessibility settings module.
 */
function coblocks_localstorage_scripts() {

	$night = get_theme_mod( 'night_mode', coblocks_defaults( 'night_mode' ) );

	// If the option is not available, or we're not in the Customizer, return.
	if ( $night || is_customize_preview() ) {
		echo '
		<script type="text/javascript">
			! function(e, t, n) {
				"use strict";

				function o(e) {
					var n = localStorage.getItem(e); n && ( "true" === n && t.documentElement.classList.add(e) )
				}

				"querySelector" in t && "addEventListener" in e, "localStorage" in e && (o("night-mode") )

			}(window, document)
		</script>';
	}
}
add_action( 'wp_enqueue_scripts', 'coblocks_localstorage_scripts' );

/**
 * Register custom fonts.
 */
function coblocks_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Heebo, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$heebo = esc_html_x( 'on', 'Heebo font: on or off', 'coblocks' );

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Lora, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$lora = esc_html_x( 'on', 'Lora font: on or off', 'coblocks' );

	if ( 'off' !== $heebo || 'off' !== $lora ) {
		$font_families = array();

		if ( 'off' !== $heebo ) {
			$font_families[] = 'Heebo:400,500,800';
		}

		if ( 'off' !== $lora ) {
			$font_families[] = 'Lora:400,400i,700';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @param  array|array   $urls           URLs to print for resource hints.
 * @param  string|string $relation_type  The relation type the URLs are printed.
 * @return array|array   $urls           URLs to print for resource hints.
 */
function coblocks_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'coblocks-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'coblocks_resource_hints', 10, 2 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function coblocks_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'coblocks_pingback_header' );

/**
 * Modify the logo class with Customizer values.
 *
 * @param string $html The logo html.
 */
function coblocks_site_logo_class( $html ) {

	// Is the border radius option enabled?
	$radius = get_theme_mod( 'custom_logo_border_radius', coblocks_defaults( 'custom_logo_border_radius' ) );
	$radius = ( false === $radius ) ? ' no-border-radius' : null;

	$html = str_replace( 'custom-logo-link', 'custom-logo-link site-logo ' . esc_attr( $radius ), $html );

	return $html;
}
add_filter( 'get_custom_logo', 'coblocks_site_logo_class' );

/**
 * Return a percentage.
 *
 * @param string|int $total Height.
 * @param string|int $number Width.
 */
function coblocks_get_percentage( $total, $number ) {
	if ( $total > 0 ) {
		return round( $number / ( $total / 100 ), 2 );
	} else {
		return 0;
	}
}

/**
 * Convert HEX to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 * HEX code, empty array otherwise.
 */
function coblocks_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}

/**
 * SVG Icons class.
 */
require get_theme_file_path( '/classes/class-coblocks-svg-icons.php' );

/**
 * Custom template tags for this theme.
 */
require get_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_theme_file_path( '/inc/customizer/defaults.php' );
require get_theme_file_path( '/inc/customizer/customizer.php' );
require get_theme_file_path( '/inc/customizer/customizer-css.php' );
require get_theme_file_path( '/inc/customizer/customizer-editor.php' );
require get_theme_file_path( '/inc/customizer/sanitization.php' );

/**
 * SVG icons functions and filters.
 */
require get_theme_file_path( '/inc/icons.php' );

/**
 * JetPack compatibility.
 */
if ( class_exists( 'Jetpack' ) ) {
	require get_theme_file_path( '/inc/jetpack.php' );
}

/**
 * Auto Load Next Post compatibility.
 */
if ( class_exists( 'Auto_Load_Next_Post' ) ) {
	require get_theme_file_path( '/inc/auto-load-next-post.php' );
}
