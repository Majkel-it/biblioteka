/* AquaLux theme — smooth scroll (Lenis), mobile menu, form validation */
(function () {
  'use strict';

  /* ---------- Mobile menu ---------- */
  var toggle = document.querySelector('.menu-toggle');
  var mobile = document.getElementById('mobile-nav');
  if (toggle && mobile) {
    toggle.addEventListener('click', function () {
      var open = mobile.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    mobile.addEventListener('click', function (e) {
      if (e.target.closest('a')) {
        mobile.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /* ---------- Smooth scroll (Lenis 60/120fps) ---------- */
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var lenis = null;
  if (!reduce && typeof window.Lenis === 'function') {
    lenis = new window.Lenis({
      duration: 1.15,
      easing: function (t) { return Math.min(1, 1.001 - Math.pow(2, -10 * t)); },
      smoothWheel: true,
      wheelMultiplier: 1,
      touchMultiplier: 1.4,
      lerp: 0.1
    });
    var raf = function (time) { lenis.raf(time); requestAnimationFrame(raf); };
    requestAnimationFrame(raf);
  }

  /* ---------- Anchor scrolling (with header offset) ---------- */
  document.addEventListener('click', function (e) {
    var link = e.target.closest && e.target.closest('a[href*="#"]');
    if (!link) return;
    var url = new URL(link.href, window.location.href);
    if (url.pathname !== window.location.pathname || !url.hash || url.hash === '#') return;
    var el = document.querySelector(url.hash);
    if (!el) return;
    e.preventDefault();
    if (lenis) {
      lenis.scrollTo(el, { offset: -70 });
    } else {
      var y = el.getBoundingClientRect().top + window.pageYOffset - 70;
      window.scrollTo({ top: y, behavior: 'smooth' });
    }
    history.pushState(null, '', url.hash);
  });

  /* ---------- Client-side form validation ---------- */
  var form = document.getElementById('aqualux-contact');
  if (form) {
    var show = function (name, msg) {
      var field = form.querySelector('[name="' + name + '"]');
      var err = form.querySelector('[data-error-for="' + name + '"]');
      if (field) field.closest('.form-field').classList.toggle('has-error', !!msg);
      if (err) { err.textContent = msg || ''; err.hidden = !msg; }
      if (field) field.setAttribute('aria-invalid', msg ? 'true' : 'false');
    };
    form.addEventListener('submit', function (e) {
      var name = form.name.value.trim();
      var email = form.email.value.trim();
      var message = form.message.value.trim();
      var ok = true;
      if (name.length < 2) { show('name', 'Podaj imię i nazwisko'); ok = false; } else show('name', '');
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { show('email', 'Podaj poprawny adres e-mail'); ok = false; } else show('email', '');
      if (message.length < 10) { show('message', 'Wiadomość musi mieć min. 10 znaków'); ok = false; } else show('message', '');
      if (!ok) e.preventDefault();
    });
  }
})();
