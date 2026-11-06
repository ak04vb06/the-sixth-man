# The Sixth Man

Basketball results, standings and news for the 2026-27 season, with an admin area to keep everything up to date. Written in plain PHP and MySQL, without a framework.

It started as my 2022 final course project (PAP). In 2026 I rewrote it: secure admin login, prepared SQL statements, a new responsive design and current season data.

## What it does

**Public site (Portuguese)**
- Home page with the latest game day as a scoreboard, the latest news and the top of each conference
- Games by day, with a date filter and quarter-by-quarter scores
- Standings for both conferences, calculated from the games: wins, losses, win percentage, games behind, playoff and play-in places
- News list and article pages

**Admin area** (`/admin`)
- Register, edit and delete games, with optional quarter scores; the standings update automatically
- Manage clubs (name, three-letter code, colour, conference)
- Write news with an optional photo upload
- The first visit creates the administrator account

## Security

- Passwords stored with `password_hash`, session regenerated at login
- Every SQL query that uses outside data is a prepared statement
- Every value shown on a page is escaped against XSS
- CSRF token on every admin form; deletions only by POST
- Uploads checked by their real content (JPG, PNG, WebP, 3 MB max), renamed, and PHP execution blocked in `uploads/`
- `includes/`, `database/` and `config.php` are not reachable from the browser on Apache

## Run it with XAMPP

1. Install [XAMPP](https://www.apachefriends.org) (PHP 8.1 or newer) and start **Apache** and **MySQL**.
2. Copy this folder to `C:\xampp\htdocs\sixthman`.
3. Open http://localhost/phpmyadmin, go to **Import** and import `database/sixthman.sql`.
4. Open http://localhost/sixthman.
5. Open http://localhost/sixthman/admin and create your administrator account.

If your MySQL user or password is not the XAMPP default, copy `config.example.php` to `config.php` and change the values there.

## Project structure

```
index.php, jogos.php, classificacao.php, noticias.php, noticia.php   public pages
admin/              admin pages (_admin.php = login check and admin layout)
includes/
  bootstrap.php     configuration, session, database connection
  queries.php       all SQL queries
  helpers.php       escaping, dates in Portuguese, CSRF, flash messages
  layout.php        header, footer, scoreboard and standings components
assets/             stylesheet and fonts (Barlow, SIL Open Font License)
database/           schema and demo data
uploads/            news photos
```

## Data

The demo data contains the results of 2 and 4 November 2026 and each team's record before those games, so the standings match the real ones as of 5 November 2026.

## Logos

By default the site shows the league and team logos from `assets/logos`. These belong to the NBA and its teams, so this version is for personal, local use. Before publishing the site, set `'logos' => false` in `config.php`: teams then appear as badges with their three-letter code and colour.

This is a personal project, with no official link to the league or the clubs.
