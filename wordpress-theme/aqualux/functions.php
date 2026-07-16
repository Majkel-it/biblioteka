<?php
/**
 * AquaLux theme functions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'AQUALUX_VERSION', '1.0.0' );

/* ---------- Theme setup ---------- */
function aqualux_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'responsive-embeds' );
    load_theme_textdomain( 'aqualux', get_template_directory() . '/languages' );

    register_nav_menus( array(
        'primary' => __( 'Menu główne', 'aqualux' ),
        'footer'  => __( 'Menu w stopce', 'aqualux' ),
    ) );
}
add_action( 'after_setup_theme', 'aqualux_setup' );

/* ---------- Enqueue assets ---------- */
function aqualux_enqueue() {
    // Google Fonts
    wp_enqueue_style(
        'aqualux-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style( 'aqualux-style', get_stylesheet_uri(), array( 'aqualux-fonts' ), AQUALUX_VERSION );

    // Lenis smooth scroll (CDN)
    wp_enqueue_script( 'lenis', 'https://cdn.jsdelivr.net/npm/lenis@1.3.25/dist/lenis.min.js', array(), '1.3.25', true );

    // Theme JS
    wp_enqueue_script( 'aqualux-main', get_template_directory_uri() . '/assets/js/main.js', array( 'lenis' ), AQUALUX_VERSION, true );

    wp_localize_script( 'aqualux-main', 'AquaLux', array(
        'ajaxUrl' => admin_url( 'admin-post.php' ),
        'nonce'   => wp_create_nonce( 'aqualux_contact' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'aqualux_enqueue' );

/* ---------- Contact form handler ---------- */
function aqualux_handle_contact() {
    // CSRF
    if ( ! isset( $_POST['aqualux_nonce'] ) || ! wp_verify_nonce( $_POST['aqualux_nonce'], 'aqualux_contact' ) ) {
        wp_safe_redirect( add_query_arg( 'contact', 'error', wp_get_referer() ?: home_url( '/' ) ) . '#contact' );
        exit;
    }

    // Honeypot (bots fill hidden field)
    if ( ! empty( $_POST['website'] ) ) {
        wp_safe_redirect( add_query_arg( 'contact', 'sent', wp_get_referer() ?: home_url( '/' ) ) . '#contact' );
        exit;
    }

    $name    = isset( $_POST['name'] )    ? sanitize_text_field( wp_unslash( $_POST['name'] ) )    : '';
    $email   = isset( $_POST['email'] )   ? sanitize_email( wp_unslash( $_POST['email'] ) )        : '';
    $phone   = isset( $_POST['phone'] )   ? sanitize_text_field( wp_unslash( $_POST['phone'] ) )   : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    $errors = array();
    if ( mb_strlen( $name ) < 2 )              $errors[] = 'name';
    if ( ! is_email( $email ) )                $errors[] = 'email';
    if ( mb_strlen( $message ) < 10 )          $errors[] = 'message';

    $back = wp_get_referer() ?: home_url( '/' );

    if ( $errors ) {
        wp_safe_redirect( add_query_arg( 'contact', 'error', $back ) . '#contact' );
        exit;
    }

    $to      = get_option( 'admin_email' );
    $subject = sprintf( '[%s] Zapytanie od %s', get_bloginfo( 'name' ), $name );
    $body    = "Imię i nazwisko: {$name}\nE-mail: {$email}\nTelefon: {$phone}\n\nWiadomość:\n{$message}\n";
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );
    wp_mail( $to, $subject, $body, $headers );

    wp_safe_redirect( add_query_arg( 'contact', 'sent', $back ) . '#contact' );
    exit;
}
add_action( 'admin_post_nopriv_aqualux_contact', 'aqualux_handle_contact' );
add_action( 'admin_post_aqualux_contact',        'aqualux_handle_contact' );

/* ---------- SVG icon helper (lucide-style) ---------- */
function aqualux_icon( $name, $size = 20 ) {
    $s = intval( $size );
    $svg_open  = '<svg xmlns="http://www.w3.org/2000/svg" width="' . $s . '" height="' . $s . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">';
    $svg_close = '</svg>';
    $paths = array(
        'waves'      => '<path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/>',
        'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/>',
        'wrench'     => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
        'cog'        => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>',
        'menu'       => '<line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>',
        'x'          => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
        'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'mail'       => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 5L2 7"/>',
        'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'map-pin'    => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>',
        'star'       => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
        'shield'     => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
        'award'      => '<path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'arrow-right'=> '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'check'      => '<path d="M20 6 9 17l-5-5"/>',
        'facebook'   => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
        'instagram'  => '<rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
        'youtube'    => '<path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/>',
    );
    if ( ! isset( $paths[ $name ] ) ) return '';
    return $svg_open . $paths[ $name ] . $svg_close;
}
