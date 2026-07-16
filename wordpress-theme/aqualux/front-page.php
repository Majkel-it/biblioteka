<?php
/**
 * Front page — AquaLux one-page layout
 */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$img = get_template_directory_uri() . '/assets/img';

$services = array(
    array( 'icon' => 'waves',    'title' => 'Budowa basenów na zamówienie', 'desc' => 'Indywidualne projekty dopasowane do Twojego ogrodu — od infinity po naturalne baseny kąpielowe.', 'items' => array( 'Projekt 3D', 'Materiały premium', 'Gwarancja 10 lat' ) ),
    array( 'icon' => 'sparkles', 'title' => 'Konserwacja i czyszczenie',   'desc' => 'Regularne przeglądy i kompleksowa pielęgnacja wody, aby Twój basen zawsze lśnił krystaliczną czystością.', 'items' => array( 'Serwis co 2 tygodnie', 'Kontrola chemii wody', 'Zimowanie basenu' ) ),
    array( 'icon' => 'wrench',   'title' => 'Renowacje basenów',           'desc' => 'Odnawiamy starsze baseny — nowa okładzina, hydroizolacja i modernizacja systemu filtracji.', 'items' => array( 'Nowa mozaika / folia', 'Wymiana skimmerów', 'Modernizacja LED' ) ),
    array( 'icon' => 'cog',      'title' => 'Montaż wyposażenia',          'desc' => 'Pompy ciepła, systemy filtracji, oświetlenie RGB, przeciwprądy — instalujemy sprzęt renomowanych marek.', 'items' => array( 'Pompy ciepła', 'Automatyka i sterowanie', 'Oświetlenie LED' ) ),
);

$gallery = array(
    array( 'src' => "$img/pool-1.jpg", 'alt' => 'Basen typu infinity z widokiem na dolinę', 'tall' => true ),
    array( 'src' => "$img/pool-2.jpg", 'alt' => 'Basen z kaskadą wodną i podświetleniem' ),
    array( 'src' => "$img/pool-3.jpg", 'alt' => 'Nowoczesny mały basen z mozaiką i drewnianym tarasem' ),
    array( 'src' => "$img/pool-4.jpg", 'alt' => 'Rodzinny basen widziany z lotu ptaka', 'tall' => true ),
    array( 'src' => "$img/pool-5.jpg", 'alt' => 'Basen z jacuzzi i oświetleniem wieczornym' ),
    array( 'src' => "$img/pool-6.jpg", 'alt' => 'Elegancki basen wewnętrzny ze szklanym dachem' ),
);

$reasons = array(
    array( 'icon' => 'award',  'k' => '15+',    'v' => 'Lat doświadczenia w branży' ),
    array( 'icon' => 'shield', 'k' => '10 lat', 'v' => 'Gwarancji na konstrukcję' ),
    array( 'icon' => 'users',  'k' => '400+',   'v' => 'Zadowolonych klientów' ),
    array( 'icon' => 'star',   'k' => '5.0',    'v' => 'Średnia ocen w opiniach' ),
);

$reviews = array(
    array( 'name' => 'Anna & Marek Kowalscy', 'role' => 'Basen w Konstancinie', 'text' => 'AquaLux zrealizował nasz wymarzony basen infinity dokładnie w terminie. Jakość wykonania i dbałość o szczegóły są nieporównywalne.' ),
    array( 'name' => 'Piotr Nowak',           'role' => 'Renowacja basenu',    'text' => 'Po 12 latach nasz basen wyglądał jak nowy. Profesjonalny zespół, świetna komunikacja i uczciwe ceny. Polecam w ciemno.' ),
    array( 'name' => 'Katarzyna Wiśniewska',  'role' => 'Serwis roczny',       'text' => 'Regularna opieka nad basenem to komfort, którego nie oddałabym za nic. Technicy zawsze punktualni i mili.' ),
);

$contacts = array(
    array( 'icon' => 'phone',   'label' => 'Telefon', 'value' => '+48 500 123 456',                'href' => 'tel:+48500123456' ),
    array( 'icon' => 'mail',    'label' => 'E-mail',  'value' => 'kontakt@aqualux.pl',             'href' => 'mailto:kontakt@aqualux.pl' ),
    array( 'icon' => 'map-pin', 'label' => 'Adres',   'value' => 'ul. Basenowa 12, 00-001 Warszawa' ),
    array( 'icon' => 'clock',   'label' => 'Godziny', 'value' => 'Pn–Pt: 8:00–18:00 · Sob: 9:00–14:00' ),
);

$contact_status = isset( $_GET['contact'] ) ? sanitize_key( $_GET['contact'] ) : '';
?>

<!-- HERO -->
<section id="home" class="hero">
  <div class="hero__bg">
    <img src="<?php echo esc_url( "$img/hero-pool.jpg" ); ?>" alt="Luksusowy basen o zachodzie słońca z palmami i eleganckim tarasem" width="1920" height="1280">
  </div>
  <div class="container hero__inner">
    <span class="hero__badge"><?php echo aqualux_icon( 'sparkles', 14 ); ?> Premium projekty od 2010</span>
    <h1>Zamień swój ogród w<br class="hide-sm"> <span class="text-grad-aqua">prywatną oazę.</span></h1>
    <p class="hero__lead">Projektujemy i budujemy ekskluzywne baseny na miarę. Od pierwszej wizji, przez precyzyjne wykonanie, aż po serwis — wszystko w jednych rękach.</p>
    <div class="hero__actions">
      <a href="#services" class="btn btn--light btn--lg">Zobacz nasze usługi <?php echo aqualux_icon( 'arrow-right', 18 ); ?></a>
      <a href="#contact"  class="btn btn--ghost btn--lg">Skontaktuj się</a>
    </div>
    <dl class="hero__stats">
      <div><dt>15+</dt><dd>Lat doświadczenia</dd></div>
      <div><dt>400+</dt><dd>Zrealizowanych basenów</dd></div>
      <div><dt>98%</dt><dd>Zadowolonych klientów</dd></div>
    </dl>
  </div>
</section>

<!-- SERVICES -->
<section id="services" class="section">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Nasze usługi</span>
      <h2>Kompleksowa opieka nad Twoim basenem</h2>
      <p>Od pierwszego szkicu po każdą kolejną kąpiel — jesteśmy z Tobą na każdym etapie.</p>
    </div>
    <div class="services__grid">
      <?php foreach ( $services as $s ) : ?>
        <article class="service-card">
          <div class="service-card__icon"><?php echo aqualux_icon( $s['icon'], 28 ); ?></div>
          <h3><?php echo esc_html( $s['title'] ); ?></h3>
          <p><?php echo esc_html( $s['desc'] ); ?></p>
          <ul>
            <?php foreach ( $s['items'] as $it ) : ?>
              <li><?php echo aqualux_icon( 'check', 16 ); ?> <?php echo esc_html( $it ); ?></li>
            <?php endforeach; ?>
          </ul>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- PORTFOLIO -->
<section id="portfolio" class="section section--muted">
  <div class="container">
    <div class="portfolio__head">
      <div>
        <span class="eyebrow">Realizacje</span>
        <h2>Nasze najnowsze projekty</h2>
        <p>Każdy basen to unikalna historia. Zajrzyj do galerii i zainspiruj się.</p>
      </div>
      <a href="#contact" class="link-arrow">Zamów projekt swojego basenu <?php echo aqualux_icon( 'arrow-right', 16 ); ?></a>
    </div>
    <div class="gallery">
      <?php foreach ( $gallery as $g ) : ?>
        <figure class="<?php echo ! empty( $g['tall'] ) ? 'tall' : ''; ?>">
          <img src="<?php echo esc_url( $g['src'] ); ?>" alt="<?php echo esc_attr( $g['alt'] ); ?>" loading="lazy">
          <figcaption><?php echo esc_html( $g['alt'] ); ?></figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="section">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Dlaczego my</span>
      <h2>Zaufanie zbudowane przez lata</h2>
      <p>Certyfikowani technicy, sprawdzone materiały i pełna gwarancja satysfakcji.</p>
    </div>
    <div class="about__grid">
      <?php foreach ( $reasons as $r ) : ?>
        <div class="reason">
          <div class="reason__icon"><?php echo aqualux_icon( $r['icon'], 24 ); ?></div>
          <div class="reason__k"><?php echo esc_html( $r['k'] ); ?></div>
          <div class="reason__v"><?php echo esc_html( $r['v'] ); ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Opinie klientów</span>
      <h2>Mówią o nas najlepiej</h2>
    </div>
    <ul class="testimonials__list" role="list">
      <?php foreach ( $reviews as $rv ) : ?>
        <li class="testimonial">
          <div class="stars" aria-label="Ocena 5 na 5">
            <?php for ( $i = 0; $i < 5; $i++ ) echo aqualux_icon( 'star', 16 ); ?>
          </div>
          <blockquote>„<?php echo esc_html( $rv['text'] ); ?>"</blockquote>
          <div class="testimonial__name"><?php echo esc_html( $rv['name'] ); ?></div>
          <div class="testimonial__role"><?php echo esc_html( $rv['role'] ); ?></div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- CONTACT -->
<section id="contact" class="section section--muted">
  <div class="container">
    <div class="contact__grid">
      <div class="contact__info">
        <span class="eyebrow">Kontakt</span>
        <h2>Zamów bezpłatną wycenę</h2>
        <p>Skontaktuj się z nami — przygotujemy indywidualną ofertę dopasowaną do Twojego projektu i budżetu.</p>
        <ul class="contact__list">
          <?php foreach ( $contacts as $c ) : ?>
            <li>
              <span class="ic"><?php echo aqualux_icon( $c['icon'], 20 ); ?></span>
              <div>
                <div class="lb"><?php echo esc_html( $c['label'] ); ?></div>
                <?php if ( ! empty( $c['href'] ) ) : ?>
                  <a class="vl" href="<?php echo esc_url( $c['href'] ); ?>"><?php echo esc_html( $c['value'] ); ?></a>
                <?php else : ?>
                  <div class="vl"><?php echo esc_html( $c['value'] ); ?></div>
                <?php endif; ?>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="contact__form-wrap">
        <form id="aqualux-contact" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate aria-label="Formularz kontaktowy">
          <input type="hidden" name="action" value="aqualux_contact">
          <?php wp_nonce_field( 'aqualux_contact', 'aqualux_nonce' ); ?>
          <div style="position:absolute;left:-9999px" aria-hidden="true">
            <label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
          </div>

          <div class="form-field">
            <label for="name">Imię i nazwisko</label>
            <input id="name" name="name" type="text" autocomplete="name" required placeholder="Jan Kowalski">
            <p class="form-error" data-error-for="name" hidden></p>
          </div>
          <div class="form-row">
            <div class="form-field">
              <label for="email">E-mail</label>
              <input id="email" name="email" type="email" autocomplete="email" required placeholder="jan@przyklad.pl">
              <p class="form-error" data-error-for="email" hidden></p>
            </div>
            <div class="form-field">
              <label for="phone">Telefon (opcjonalnie)</label>
              <input id="phone" name="phone" type="tel" autocomplete="tel" placeholder="+48 500 000 000">
            </div>
          </div>
          <div class="form-field">
            <label for="message">Twoja wiadomość</label>
            <textarea id="message" name="message" rows="5" required placeholder="Opisz swój projekt lub pytanie…"></textarea>
            <p class="form-error" data-error-for="message" hidden></p>
          </div>
          <button type="submit" class="btn btn--primary btn--lg" style="width:100%;max-width:none">
            Wyślij zapytanie <?php echo aqualux_icon( 'arrow-right', 18 ); ?>
          </button>

          <?php if ( $contact_status === 'sent' ) : ?>
            <p class="form-status" role="status">Dziękujemy! Odezwiemy się w ciągu 24 godzin.</p>
          <?php elseif ( $contact_status === 'error' ) : ?>
            <p class="form-status form-status--error" role="alert">Wystąpił błąd — sprawdź pola i spróbuj ponownie.</p>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
