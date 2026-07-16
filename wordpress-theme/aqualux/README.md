# Motyw WordPress AquaLux

Kompletny motyw dla firmy basenowej — pełne odwzorowanie strony (hero, usługi, galeria, o nas, opinie, formularz kontaktowy, stopka) w czystym PHP + HTML + CSS + JS, z płynnym przewijaniem 60/120fps (Lenis).

## Instalacja

1. Spakuj folder `aqualux/` do ZIP:
   ```bash
   cd wordpress-theme && zip -r aqualux.zip aqualux
   ```
2. W panelu WordPressa: **Wygląd → Motywy → Dodaj nowy → Wyślij motyw** → wybierz `aqualux.zip` → **Zainstaluj → Aktywuj**.
3. (Opcjonalnie) **Wygląd → Menu** → utwórz menu i przypisz do lokalizacji „Menu główne”. Bez tego działa domyślne menu z kotwicami.
4. **Ustawienia → Czytanie** → „Strona główna wyświetla” = statyczna strona → wybierz dowolną stronę (motyw używa `front-page.php`, więc treść strony nie ma znaczenia — layout jest w motywie).

## Struktura

```
aqualux/
├── style.css          # nagłówek motywu + wszystkie style
├── functions.php      # enqueue, menu, obsługa formularza, ikony SVG
├── header.php         # <head>, sticky nav, mobile menu
├── footer.php         # stopka + wp_footer
├── front-page.php     # cała treść landing page
├── index.php          # fallback
├── 404.php
├── assets/
│   ├── js/main.js     # Lenis smooth scroll, mobile menu, walidacja
│   └── img/           # zdjęcia (hero + galeria)
```

## Formularz kontaktowy

Formularz wysyła dane przez `admin-post.php` z ochroną `wp_nonce` + honeypot. Zawartość leci przez `wp_mail()` na e-mail administratora (Ustawienia → Ogólne → „Adres e-mail administracyjny”).

Do produkcji podłącz wtyczkę SMTP (np. WP Mail SMTP), inaczej maile mogą trafiać do spamu.

## Personalizacja

- Teksty, telefon, e-mail, adres → `front-page.php` (tablice `$services`, `$reviews`, `$contacts` + hero).
- Kolory → zmienne CSS na górze `style.css` (`--primary`, `--aqua`, `--sand`).
- Zdjęcia → podmień pliki w `assets/img/` (zachowaj nazwy) lub podeprzyj się `wp_get_attachment_image()`.

## Płynne przewijanie

Lenis wczytywany z jsDelivr. Automatycznie wyłącza się przy `prefers-reduced-motion: reduce`. Wyniki najlepsze na ekranach 120 Hz.
