import { createFileRoute } from "@tanstack/react-router";
import { useState, type FormEvent } from "react";
import {
  Waves, Wrench, Sparkles, Cog, Menu, X, Phone, Mail, Clock, MapPin,
  Star, ShieldCheck, Award, Users, ArrowRight, Check, Facebook, Instagram, Youtube,
} from "lucide-react";

import heroPool from "@/assets/hero-pool.jpg";
import pool1 from "@/assets/pool-1.jpg";
import pool2 from "@/assets/pool-2.jpg";
import pool3 from "@/assets/pool-3.jpg";
import pool4 from "@/assets/pool-4.jpg";
import pool5 from "@/assets/pool-5.jpg";
import pool6 from "@/assets/pool-6.jpg";

export const Route = createFileRoute("/")({
  head: () => ({
    meta: [
      { property: "og:image", content: "https://images.unsplash.com/photo-1519821172144-4f87d0dfea99?w=1200" },
    ],
  }),
  component: Home,
});

const NAV = [
  { href: "#home", label: "Strona główna" },
  { href: "#services", label: "Usługi" },
  { href: "#portfolio", label: "Realizacje" },
  { href: "#about", label: "O nas" },
];

function Logo() {
  return (
    <a href="#home" className="flex items-center gap-2 font-display font-bold text-xl tracking-tight" aria-label="AquaLux strona główna">
      <span className="grid h-9 w-9 place-items-center rounded-xl gradient-aqua text-white shadow-glow-aqua" aria-hidden="true">
        <Waves className="h-5 w-5" strokeWidth={2.5} />
      </span>
      <span className="text-primary">Aqua<span className="text-gradient-aqua">Lux</span></span>
    </a>
  );
}

function Header() {
  const [open, setOpen] = useState(false);
  return (
    <header className="sticky top-0 z-50 w-full border-b border-border/60 bg-background/80 backdrop-blur-xl">
      <div className="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        <Logo />
        <nav aria-label="Główna nawigacja" className="hidden md:block">
          <ul className="flex items-center gap-8 text-sm font-medium">
            {NAV.map((n) => (
              <li key={n.href}>
                <a href={n.href} className="text-foreground/80 transition-colors hover:text-primary">
                  {n.label}
                </a>
              </li>
            ))}
          </ul>
        </nav>
        <div className="flex items-center gap-2">
          <a
            href="#contact"
            className="hidden sm:inline-flex items-center gap-2 rounded-full gradient-aqua px-5 py-2.5 text-sm font-semibold text-white shadow-card-soft transition-all hover:shadow-glow-aqua hover:-translate-y-0.5"
          >
            Bezpłatna wycena
            <ArrowRight className="h-4 w-4" aria-hidden="true" />
          </a>
          <button
            onClick={() => setOpen((o) => !o)}
            className="md:hidden inline-flex h-11 w-11 items-center justify-center rounded-lg border border-border text-primary"
            aria-label={open ? "Zamknij menu" : "Otwórz menu"}
            aria-expanded={open}
            aria-controls="mobile-nav"
          >
            {open ? <X className="h-5 w-5" /> : <Menu className="h-5 w-5" />}
          </button>
        </div>
      </div>
      {open && (
        <div id="mobile-nav" className="md:hidden border-t border-border bg-background">
          <ul className="flex flex-col p-4 gap-1">
            {NAV.map((n) => (
              <li key={n.href}>
                <a
                  href={n.href}
                  onClick={() => setOpen(false)}
                  className="block rounded-lg px-4 py-3 text-base font-medium text-foreground hover:bg-secondary"
                >
                  {n.label}
                </a>
              </li>
            ))}
            <li>
              <a
                href="#contact"
                onClick={() => setOpen(false)}
                className="mt-2 flex items-center justify-center gap-2 rounded-full gradient-aqua px-5 py-3 text-sm font-semibold text-white"
              >
                Bezpłatna wycena <ArrowRight className="h-4 w-4" />
              </a>
            </li>
          </ul>
        </div>
      )}
    </header>
  );
}

function Hero() {
  return (
    <section id="home" className="relative overflow-hidden">
      <div className="absolute inset-0 -z-10">
        <img
          src={heroPool}
          alt="Luksusowy basen o zachodzie słońca z palmami i eleganckim tarasem"
          width={1920}
          height={1280}
          className="h-full w-full object-cover"
        />
        <div className="absolute inset-0 gradient-hero" aria-hidden="true" />
      </div>
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-24 sm:py-32 lg:py-44">
        <div className="max-w-3xl">
          <span className="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-white backdrop-blur">
            <Sparkles className="h-3.5 w-3.5" aria-hidden="true" /> Premium projekty od 2010
          </span>
          <h1 className="mt-6 font-display text-4xl sm:text-5xl lg:text-7xl font-bold leading-[1.05] text-white">
            Zamień swój ogród w<br className="hidden sm:block" />
            <span className="text-gradient-aqua"> prywatną oazę.</span>
          </h1>
          <p className="mt-6 max-w-2xl text-lg sm:text-xl leading-relaxed text-white/85">
            Projektujemy i budujemy ekskluzywne baseny na miarę. Od pierwszej wizji, przez precyzyjne wykonanie, aż po serwis — wszystko w jednych rękach.
          </p>
          <div className="mt-10 flex flex-col sm:flex-row gap-3 sm:gap-4">
            <a
              href="#services"
              className="inline-flex items-center justify-center gap-2 rounded-full bg-white px-8 py-4 text-base font-semibold text-primary shadow-elegant transition-all hover:-translate-y-0.5 hover:shadow-glow-aqua"
            >
              Zobacz nasze usługi <ArrowRight className="h-5 w-5" aria-hidden="true" />
            </a>
            <a
              href="#contact"
              className="inline-flex items-center justify-center gap-2 rounded-full border-2 border-white/70 px-8 py-4 text-base font-semibold text-white transition-all hover:bg-white/10"
            >
              Skontaktuj się
            </a>
          </div>
          <dl className="mt-14 grid grid-cols-3 gap-4 sm:gap-8 max-w-lg">
            {[
              { k: "15+", v: "Lat doświadczenia" },
              { k: "400+", v: "Zrealizowanych basenów" },
              { k: "98%", v: "Zadowolonych klientów" },
            ].map((s) => (
              <div key={s.v}>
                <dt className="font-display text-3xl sm:text-4xl font-bold text-white">{s.k}</dt>
                <dd className="mt-1 text-xs sm:text-sm text-white/75">{s.v}</dd>
              </div>
            ))}
          </dl>
        </div>
      </div>
    </section>
  );
}

const SERVICES = [
  {
    icon: Waves,
    title: "Budowa basenów na zamówienie",
    desc: "Indywidualne projekty dopasowane do Twojego ogrodu — od infinity po naturalne baseny kąpielowe.",
    items: ["Projekt 3D", "Materiały premium", "Gwarancja 10 lat"],
  },
  {
    icon: Sparkles,
    title: "Konserwacja i czyszczenie",
    desc: "Regularne przeglądy i kompleksowa pielęgnacja wody, aby Twój basen zawsze lśnił krystaliczną czystością.",
    items: ["Serwis co 2 tygodnie", "Kontrola chemii wody", "Zimowanie basenu"],
  },
  {
    icon: Wrench,
    title: "Renowacje basenów",
    desc: "Odnawiamy starsze baseny — nowa okładzina, hydroizolacja i modernizacja systemu filtracji.",
    items: ["Nowa mozaika / folia", "Wymiana skimmerów", "Modernizacja LED"],
  },
  {
    icon: Cog,
    title: "Montaż wyposażenia",
    desc: "Pompy ciepła, systemy filtracji, oświetlenie RGB, przeciwprądy — instalujemy sprzęt renomowanych marek.",
    items: ["Pompy ciepła", "Automatyka i sterowanie", "Oświetlenie LED"],
  },
];

function Services() {
  return (
    <section id="services" className="py-24 sm:py-32">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="mx-auto max-w-2xl text-center">
          <span className="text-sm font-semibold uppercase tracking-wider text-aqua-foreground/70">Nasze usługi</span>
          <h2 className="mt-3 font-display text-3xl sm:text-5xl font-bold text-primary">
            Kompleksowa opieka nad Twoim basenem
          </h2>
          <p className="mt-4 text-lg text-muted-foreground">
            Od pierwszego szkicu po każdą kolejną kąpiel — jesteśmy z Tobą na każdym etapie.
          </p>
        </div>
        <div className="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
          {SERVICES.map((s) => (
            <article
              key={s.title}
              className="group relative flex flex-col rounded-2xl border border-border/70 bg-card p-8 shadow-card-soft transition-all hover:-translate-y-1 hover:shadow-elegant hover:border-aqua/40"
            >
              <div
                className="mb-6 grid h-14 w-14 place-items-center rounded-2xl gradient-aqua text-white shadow-glow-aqua transition-transform group-hover:scale-110"
                aria-hidden="true"
              >
                <s.icon className="h-7 w-7" strokeWidth={2} />
              </div>
              <h3 className="font-display text-xl font-semibold text-primary">{s.title}</h3>
              <p className="mt-3 text-sm leading-relaxed text-muted-foreground">{s.desc}</p>
              <ul className="mt-6 space-y-2 text-sm">
                {s.items.map((i) => (
                  <li key={i} className="flex items-center gap-2 text-foreground/80">
                    <Check className="h-4 w-4 text-aqua-foreground shrink-0" aria-hidden="true" />
                    {i}
                  </li>
                ))}
              </ul>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}

const GALLERY = [
  { src: pool1, alt: "Basen typu infinity z widokiem na dolinę", span: "sm:row-span-2" },
  { src: pool2, alt: "Basen z kaskadą wodną i podświetleniem" },
  { src: pool3, alt: "Nowoczesny mały basen z mozaiką i drewnianym tarasem" },
  { src: pool4, alt: "Rodzinny basen widziany z lotu ptaka", span: "sm:row-span-2" },
  { src: pool5, alt: "Basen z jacuzzi i oświetleniem wieczornym" },
  { src: pool6, alt: "Elegancki basen wewnętrzny ze szklanym dachem" },
];

function Portfolio() {
  return (
    <section id="portfolio" className="py-24 sm:py-32 bg-secondary/40">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
          <div className="max-w-2xl">
            <span className="text-sm font-semibold uppercase tracking-wider text-aqua-foreground/70">Realizacje</span>
            <h2 className="mt-3 font-display text-3xl sm:text-5xl font-bold text-primary">
              Nasze najnowsze projekty
            </h2>
            <p className="mt-4 text-lg text-muted-foreground">
              Każdy basen to unikalna historia. Zajrzyj do galerii i zainspiruj się.
            </p>
          </div>
          <a href="#contact" className="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:text-aqua-foreground transition-colors">
            Zamów projekt swojego basenu <ArrowRight className="h-4 w-4" aria-hidden="true" />
          </a>
        </div>
        <div className="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 auto-rows-[220px] sm:auto-rows-[240px] gap-4">
          {GALLERY.map((g, i) => (
            <figure
              key={i}
              className={`group relative overflow-hidden rounded-2xl shadow-card-soft ${g.span ?? ""}`}
            >
              <img
                src={g.src}
                alt={g.alt}
                loading="lazy"
                className="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-primary/70 via-primary/10 to-transparent opacity-0 transition-opacity group-hover:opacity-100" aria-hidden="true" />
              <figcaption className="absolute bottom-4 left-4 right-4 translate-y-4 text-white text-sm font-medium opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                {g.alt}
              </figcaption>
            </figure>
          ))}
        </div>
      </div>
    </section>
  );
}

const REASONS = [
  { icon: Award, k: "15+", v: "Lat doświadczenia w branży" },
  { icon: ShieldCheck, k: "10 lat", v: "Gwarancji na konstrukcję" },
  { icon: Users, k: "400+", v: "Zadowolonych klientów" },
  { icon: Star, k: "5.0", v: "Średnia ocen w opiniach" },
];

function About() {
  return (
    <section id="about" className="py-24 sm:py-32">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="mx-auto max-w-2xl text-center">
          <span className="text-sm font-semibold uppercase tracking-wider text-aqua-foreground/70">Dlaczego my</span>
          <h2 className="mt-3 font-display text-3xl sm:text-5xl font-bold text-primary">
            Zaufanie zbudowane przez lata
          </h2>
          <p className="mt-4 text-lg text-muted-foreground">
            Certyfikowani technicy, sprawdzone materiały i pełna gwarancja satysfakcji.
          </p>
        </div>
        <div className="mt-16 grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
          {REASONS.map((r) => (
            <div
              key={r.v}
              className="flex flex-col items-center rounded-2xl border border-border/60 bg-card p-6 sm:p-8 text-center shadow-card-soft"
            >
              <div className="grid h-12 w-12 place-items-center rounded-xl bg-sand text-sand-foreground" aria-hidden="true">
                <r.icon className="h-6 w-6" />
              </div>
              <div className="mt-4 font-display text-3xl sm:text-4xl font-bold text-primary">{r.k}</div>
              <div className="mt-1 text-sm text-muted-foreground">{r.v}</div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

const REVIEWS = [
  {
    name: "Anna & Marek Kowalscy",
    role: "Basen w Konstancinie",
    text: "AquaLux zrealizował nasz wymarzony basen infinity dokładnie w terminie. Jakość wykonania i dbałość o szczegóły są nieporównywalne.",
  },
  {
    name: "Piotr Nowak",
    role: "Renowacja basenu",
    text: "Po 12 latach nasz basen wyglądał jak nowy. Profesjonalny zespół, świetna komunikacja i uczciwe ceny. Polecam w ciemno.",
  },
  {
    name: "Katarzyna Wiśniewska",
    role: "Serwis roczny",
    text: "Regularna opieka nad basenem to komfort, którego nie oddałabym za nic. Technicy zawsze punktualni i mili.",
  },
];

function Testimonials() {
  return (
    <section className="py-24 sm:py-32 gradient-deep text-primary-foreground">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="mx-auto max-w-2xl text-center">
          <span className="text-sm font-semibold uppercase tracking-wider text-aqua/90">Opinie klientów</span>
          <h2 className="mt-3 font-display text-3xl sm:text-5xl font-bold text-white">
            Mówią o nas najlepiej
          </h2>
        </div>
        <ul className="mt-16 grid gap-6 md:grid-cols-3" role="list">
          {REVIEWS.map((r) => (
            <li key={r.name} className="rounded-2xl border border-white/10 bg-white/5 p-8 backdrop-blur transition-transform hover:-translate-y-1">
              <div className="flex gap-1 text-aqua" aria-label="Ocena 5 na 5">
                {Array.from({ length: 5 }).map((_, i) => (
                  <Star key={i} className="h-4 w-4 fill-current" aria-hidden="true" />
                ))}
              </div>
              <blockquote className="mt-4 text-lg leading-relaxed text-white/90">
                „{r.text}"
              </blockquote>
              <div className="mt-6">
                <div className="font-semibold text-white">{r.name}</div>
                <div className="text-sm text-white/60">{r.role}</div>
              </div>
            </li>
          ))}
        </ul>
      </div>
    </section>
  );
}

function ContactForm() {
  const [errors, setErrors] = useState<Record<string, string>>({});
  const [sent, setSent] = useState(false);

  function onSubmit(e: FormEvent<HTMLFormElement>) {
    e.preventDefault();
    const fd = new FormData(e.currentTarget);
    const next: Record<string, string> = {};
    const name = String(fd.get("name") ?? "").trim();
    const email = String(fd.get("email") ?? "").trim();
    const message = String(fd.get("message") ?? "").trim();
    if (name.length < 2) next.name = "Podaj imię i nazwisko";
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) next.email = "Podaj poprawny adres e-mail";
    if (message.length < 10) next.message = "Wiadomość musi mieć min. 10 znaków";
    setErrors(next);
    if (Object.keys(next).length === 0) {
      setSent(true);
      e.currentTarget.reset();
    }
  }

  const field = (name: string) =>
    `w-full rounded-xl border bg-background px-4 py-3 text-base text-foreground placeholder:text-muted-foreground transition-colors focus:border-aqua focus:outline-none ${
      errors[name] ? "border-destructive" : "border-input"
    }`;

  return (
    <form onSubmit={onSubmit} noValidate className="space-y-5" aria-label="Formularz kontaktowy">
      <div>
        <label htmlFor="name" className="block text-sm font-medium text-primary mb-2">
          Imię i nazwisko
        </label>
        <input
          id="name" name="name" type="text" autoComplete="name" required
          aria-invalid={!!errors.name} aria-describedby={errors.name ? "err-name" : undefined}
          className={field("name")} placeholder="Jan Kowalski"
        />
        {errors.name && <p id="err-name" className="mt-1.5 text-sm text-destructive" role="alert">{errors.name}</p>}
      </div>
      <div className="grid sm:grid-cols-2 gap-5">
        <div>
          <label htmlFor="email" className="block text-sm font-medium text-primary mb-2">E-mail</label>
          <input
            id="email" name="email" type="email" autoComplete="email" required
            aria-invalid={!!errors.email} aria-describedby={errors.email ? "err-email" : undefined}
            className={field("email")} placeholder="jan@przyklad.pl"
          />
          {errors.email && <p id="err-email" className="mt-1.5 text-sm text-destructive" role="alert">{errors.email}</p>}
        </div>
        <div>
          <label htmlFor="phone" className="block text-sm font-medium text-primary mb-2">Telefon (opcjonalnie)</label>
          <input id="phone" name="phone" type="tel" autoComplete="tel" className={field("phone")} placeholder="+48 500 000 000" />
        </div>
      </div>
      <div>
        <label htmlFor="message" className="block text-sm font-medium text-primary mb-2">Twoja wiadomość</label>
        <textarea
          id="message" name="message" rows={5} required
          aria-invalid={!!errors.message} aria-describedby={errors.message ? "err-message" : undefined}
          className={field("message")} placeholder="Opisz swój projekt lub pytanie…"
        />
        {errors.message && <p id="err-message" className="mt-1.5 text-sm text-destructive" role="alert">{errors.message}</p>}
      </div>
      <button
        type="submit"
        className="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-full gradient-aqua px-8 py-4 text-base font-semibold text-white shadow-card-soft transition-all hover:-translate-y-0.5 hover:shadow-glow-aqua min-h-11"
      >
        Wyślij zapytanie <ArrowRight className="h-5 w-5" aria-hidden="true" />
      </button>
      {sent && (
        <p role="status" className="rounded-xl bg-aqua/15 px-4 py-3 text-sm text-primary">
          Dziękujemy! Odezwiemy się w ciągu 24 godzin.
        </p>
      )}
    </form>
  );
}

function Contact() {
  return (
    <section id="contact" className="py-24 sm:py-32 bg-secondary/40">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="grid gap-12 lg:grid-cols-2 lg:gap-16">
          <div>
            <span className="text-sm font-semibold uppercase tracking-wider text-aqua-foreground/70">Kontakt</span>
            <h2 className="mt-3 font-display text-3xl sm:text-5xl font-bold text-primary">
              Zamów bezpłatną wycenę
            </h2>
            <p className="mt-4 text-lg text-muted-foreground max-w-lg">
              Skontaktuj się z nami — przygotujemy indywidualną ofertę dopasowaną do Twojego projektu i budżetu.
            </p>
            <ul className="mt-10 space-y-5">
              {[
                { icon: Phone, label: "Telefon", value: "+48 500 123 456", href: "tel:+48500123456" },
                { icon: Mail, label: "E-mail", value: "kontakt@aqualux.pl", href: "mailto:kontakt@aqualux.pl" },
                { icon: MapPin, label: "Adres", value: "ul. Basenowa 12, 00-001 Warszawa" },
                { icon: Clock, label: "Godziny", value: "Pn–Pt: 8:00–18:00 · Sob: 9:00–14:00" },
              ].map((c) => (
                <li key={c.label} className="flex items-start gap-4">
                  <div className="grid h-12 w-12 shrink-0 place-items-center rounded-xl gradient-aqua text-white" aria-hidden="true">
                    <c.icon className="h-5 w-5" />
                  </div>
                  <div>
                    <div className="text-sm text-muted-foreground">{c.label}</div>
                    {c.href ? (
                      <a href={c.href} className="text-lg font-semibold text-primary hover:text-aqua-foreground transition-colors">
                        {c.value}
                      </a>
                    ) : (
                      <div className="text-lg font-semibold text-primary">{c.value}</div>
                    )}
                  </div>
                </li>
              ))}
            </ul>
          </div>
          <div className="rounded-3xl bg-card p-6 sm:p-10 shadow-elegant border border-border/60">
            <ContactForm />
          </div>
        </div>
      </div>
    </section>
  );
}

function Footer() {
  return (
    <footer className="gradient-deep text-primary-foreground">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
        <div className="grid gap-10 md:grid-cols-4">
          <div className="md:col-span-2">
            <a href="#home" className="inline-flex items-center gap-2 font-display font-bold text-2xl" aria-label="AquaLux">
              <span className="grid h-10 w-10 place-items-center rounded-xl gradient-aqua text-white" aria-hidden="true">
                <Waves className="h-5 w-5" strokeWidth={2.5} />
              </span>
              <span className="text-white">Aqua<span className="text-gradient-aqua">Lux</span></span>
            </a>
            <p className="mt-4 max-w-md text-white/70 leading-relaxed">
              Projektujemy, budujemy i serwisujemy luksusowe baseny w całej Polsce. 15+ lat pasji, precyzji i satysfakcji klientów.
            </p>
            <div className="mt-6 flex gap-3">
              {[
                { icon: Facebook, label: "Facebook" },
                { icon: Instagram, label: "Instagram" },
                { icon: Youtube, label: "YouTube" },
              ].map((s) => (
                <a
                  key={s.label} href="#" aria-label={s.label}
                  className="grid h-11 w-11 place-items-center rounded-full border border-white/15 text-white transition-all hover:bg-white/10 hover:border-aqua/60"
                >
                  <s.icon className="h-5 w-5" />
                </a>
              ))}
            </div>
          </div>
          <div>
            <h3 className="font-display font-semibold text-white mb-4">Szybkie linki</h3>
            <ul className="space-y-2.5 text-white/70">
              {NAV.map((n) => (
                <li key={n.href}>
                  <a href={n.href} className="hover:text-aqua transition-colors">{n.label}</a>
                </li>
              ))}
              <li><a href="#contact" className="hover:text-aqua transition-colors">Kontakt</a></li>
            </ul>
          </div>
          <div>
            <h3 className="font-display font-semibold text-white mb-4">Kontakt</h3>
            <ul className="space-y-2.5 text-white/70 text-sm">
              <li>+48 500 123 456</li>
              <li>kontakt@aqualux.pl</li>
              <li>ul. Basenowa 12<br />00-001 Warszawa</li>
            </ul>
          </div>
        </div>
        <div className="mt-12 border-t border-white/10 pt-6 flex flex-col sm:flex-row justify-between gap-4 text-sm text-white/50">
          <p>© {new Date().getFullYear()} AquaLux. Wszelkie prawa zastrzeżone.</p>
          <div className="flex gap-6">
            <a href="#" className="hover:text-white transition-colors">Polityka prywatności</a>
            <a href="#" className="hover:text-white transition-colors">Regulamin</a>
          </div>
        </div>
      </div>
    </footer>
  );
}

function Home() {
  return (
    <div className="min-h-dvh flex flex-col">
      <Header />
      <main id="main">
        <Hero />
        <Services />
        <Portfolio />
        <About />
        <Testimonials />
        <Contact />
      </main>
      <Footer />
    </div>
  );
}
