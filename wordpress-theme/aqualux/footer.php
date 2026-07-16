<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
</main>

<footer class="site-footer">
  <div class="container site-footer__inner">
    <div class="site-footer__grid">
      <div>
        <a href="#home" class="logo" aria-label="AquaLux">
          <span class="logo__mark"><?php echo aqualux_icon( 'waves', 20 ); ?></span>
          <span>Aqua<span class="text-grad-aqua">Lux</span></span>
        </a>
        <p class="site-footer__about"><?php esc_html_e( 'Projektujemy, budujemy i serwisujemy luksusowe baseny w całej Polsce. 15+ lat pasji, precyzji i satysfakcji klientów.', 'aqualux' ); ?></p>
        <div class="socials">
          <a href="#" aria-label="Facebook"><?php echo aqualux_icon( 'facebook', 20 ); ?></a>
          <a href="#" aria-label="Instagram"><?php echo aqualux_icon( 'instagram', 20 ); ?></a>
          <a href="#" aria-label="YouTube"><?php echo aqualux_icon( 'youtube', 20 ); ?></a>
        </div>
      </div>
      <div>
        <h3><?php esc_html_e( 'Szybkie linki', 'aqualux' ); ?></h3>
        <ul>
          <li><a href="#home"><?php esc_html_e( 'Strona główna', 'aqualux' ); ?></a></li>
          <li><a href="#services"><?php esc_html_e( 'Usługi', 'aqualux' ); ?></a></li>
          <li><a href="#portfolio"><?php esc_html_e( 'Realizacje', 'aqualux' ); ?></a></li>
          <li><a href="#about"><?php esc_html_e( 'O nas', 'aqualux' ); ?></a></li>
          <li><a href="#contact"><?php esc_html_e( 'Kontakt', 'aqualux' ); ?></a></li>
        </ul>
      </div>
      <div>
        <h3><?php esc_html_e( 'Kontakt', 'aqualux' ); ?></h3>
        <ul>
          <li>+48 500 123 456</li>
          <li>kontakt@aqualux.pl</li>
          <li>ul. Basenowa 12<br>00-001 Warszawa</li>
        </ul>
      </div>
    </div>
    <div class="site-footer__bottom">
      <p>© <?php echo esc_html( date_i18n( 'Y' ) ); ?> AquaLux. <?php esc_html_e( 'Wszelkie prawa zastrzeżone.', 'aqualux' ); ?></p>
      <div class="site-footer__legal">
        <a href="#"><?php esc_html_e( 'Polityka prywatności', 'aqualux' ); ?></a>
        <a href="#"><?php esc_html_e( 'Regulamin', 'aqualux' ); ?></a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
