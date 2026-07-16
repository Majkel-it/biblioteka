<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="AquaLux projektuje i buduje ekskluzywne baseny na zamówienie. Kompleksowa obsługa: budowa, renowacja, serwis i montaż wyposażenia.">
<meta property="og:title" content="AquaLux — Luksusowe Baseny i Serwis">
<meta property="og:description" content="Zamień swój ogród w prywatną oazę. Baseny na zamówienie, renowacje i profesjonalny serwis.">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Przejdź do treści', 'aqualux' ); ?></a>

<header class="site-header">
  <div class="container site-header__inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>#home" class="logo" aria-label="AquaLux — strona główna">
      <span class="logo__mark"><?php echo aqualux_icon( 'waves', 20 ); ?></span>
      <span>Aqua<span class="text-grad-aqua">Lux</span></span>
    </a>

    <nav class="nav" aria-label="<?php esc_attr_e( 'Główna nawigacja', 'aqualux' ); ?>">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
          wp_nav_menu( array(
              'theme_location' => 'primary',
              'container'      => false,
              'menu_class'     => 'nav__list',
              'depth'          => 1,
          ) );
      } else { ?>
        <ul class="nav__list">
          <li><a href="#home"><?php esc_html_e( 'Strona główna', 'aqualux' ); ?></a></li>
          <li><a href="#services"><?php esc_html_e( 'Usługi', 'aqualux' ); ?></a></li>
          <li><a href="#portfolio"><?php esc_html_e( 'Realizacje', 'aqualux' ); ?></a></li>
          <li><a href="#about"><?php esc_html_e( 'O nas', 'aqualux' ); ?></a></li>
        </ul>
      <?php } ?>
    </nav>

    <div style="display:flex;align-items:center;gap:.5rem">
      <a href="#contact" class="btn btn--primary header__cta">
        <?php esc_html_e( 'Bezpłatna wycena', 'aqualux' ); ?>
        <?php echo aqualux_icon( 'arrow-right', 16 ); ?>
      </a>
      <button type="button" class="menu-toggle" aria-label="<?php esc_attr_e( 'Otwórz menu', 'aqualux' ); ?>" aria-expanded="false" aria-controls="mobile-nav">
        <?php echo aqualux_icon( 'menu', 20 ); ?>
      </button>
    </div>
  </div>

  <div id="mobile-nav" class="mobile-nav">
    <ul>
      <li><a href="#home"><?php esc_html_e( 'Strona główna', 'aqualux' ); ?></a></li>
      <li><a href="#services"><?php esc_html_e( 'Usługi', 'aqualux' ); ?></a></li>
      <li><a href="#portfolio"><?php esc_html_e( 'Realizacje', 'aqualux' ); ?></a></li>
      <li><a href="#about"><?php esc_html_e( 'O nas', 'aqualux' ); ?></a></li>
      <li><a href="#contact" class="btn btn--primary"><?php esc_html_e( 'Bezpłatna wycena', 'aqualux' ); ?> <?php echo aqualux_icon( 'arrow-right', 16 ); ?></a></li>
    </ul>
  </div>
</header>

<main id="main">
