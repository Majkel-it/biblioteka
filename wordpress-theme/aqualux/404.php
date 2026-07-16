<?php if ( ! defined( 'ABSPATH' ) ) exit; get_header(); ?>
<section class="section">
  <div class="container" style="text-align:center;max-width:520px">
    <h1 style="font-size:5rem;line-height:1">404</h1>
    <h2 style="margin-top:1rem;font-size:1.5rem">Strona nie znaleziona</h2>
    <p style="margin-top:.75rem;color:var(--muted-fg)">Strona, której szukasz, nie istnieje lub została przeniesiona.</p>
    <p style="margin-top:1.5rem">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">Wróć na stronę główną</a>
    </p>
  </div>
</section>
<?php get_footer(); ?>
