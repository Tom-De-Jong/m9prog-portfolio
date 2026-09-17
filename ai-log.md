# AI-log

## Gebruikte bestanden

- `themes/portfolio/index.php`
- `themes/portfolio/functions.php`
- `themes/portfolio/style.css`
- `themes/portfolio/page.php`

## Gebruikte hulpmiddelen

- Workspace-bestanden gelezen om de bestaande theme-structuur te controleren.
- Gerichte zoekopdracht gebruikt om bestaande navigatie, contactgegevens en paginatemplates te vinden.
- `apply_patch` gebruikt voor gerichte codewijzigingen.
- `create_file` gebruikt om `page.php`, `prompt.md` en dit logbestand aan te maken.
- PHP lint gebruikt voor syntaxcontrole.
- `git diff --check` gebruikt voor controle op whitespaceproblemen.

## Wat gecontroleerd is

De volgende commando’s zijn uitgevoerd:

```text
php -l themes/portfolio/index.php
php -l themes/portfolio/page.php
php -l themes/portfolio/functions.php
git diff --check
```

Resultaat:

- Geen PHP-syntaxfouten in `index.php`.
- Geen PHP-syntaxfouten in `page.php`.
- Geen PHP-syntaxfouten in `functions.php`.
- Geen whitespacefouten volgens `git diff --check`.

## Browsercontrole

De lokale WordPress-site is getest in de browser op `http://localhost/`.

| Pagina | Verwachting | Daadwerkelijk resultaat |
| --- | --- | --- |
| Homepage `/` | De portfolio-homepage toont de hero, over-mij-sectie, drie projecten, contactblok en navigatie. | Geslaagd. Alle onderdelen waren zichtbaar en de navigatie verwees naar de juiste URL’s. |
| Over mij `/over-mij/` | De pagina gebruikt `page.php` en toont een andere profielpagina dan de homepage. | Geslaagd. De pagina toonde een eigen titel, introductie, vaardigheden en profieltekst. |
| Contact `/contact/` | De pagina toont een eigen contacttekst en een werkende link naar `mailto:info@tomwebsites.nl`. | Geslaagd. De contactpagina had een eigen layout, stage-informatie en de correcte mailto-link. |

Ook is de Contactpagina visueel gecontroleerd met een browser-screenshot. De header, navigatie, content, mailadres en footer waren zichtbaar zonder foutmelding.

Er trad tijdens deze browsercontrole geen fout op. De eerder ontbrekende onderscheidende pagina-inhoud is opgelost met slug-afhankelijke fallback-inhoud in `page.php`. Inhoud die later via de WordPress-editor wordt toegevoegd, blijft leidend boven deze fallback.

## Wat niet werkte

- De eerste grote patch mislukte omdat de exacte context van de bestaande `style.css`-header niet overeenkwam. Er waren daardoor geen wijzigingen uitgevoerd door die mislukte patch.
- De VS Code/WordPress-analyse markeerde WordPress-functies zoals `wp_head()`, `add_action()` en `the_content()` als onbekend. Dat zijn normale WordPress-functies; de zelfstandige PHP-lintcontrole gaf geen fouten.
- Een losse WordPress-pagina wordt niet automatisch aangemaakt door een theme-bestand. De pagina’s `Over mij` en `Contact` moeten daarom in de WordPress-beheeromgeving worden aangemaakt.

## Zelf uitgevoerde aanpassingen

- One-page portfolio-opzet gebouwd in `index.php`.
- Theme support en stylesheet loading toegevoegd aan `functions.php`.
- Responsive mobile-first styling toegevoegd aan `style.css`.
- Contactadres ingesteld op `info@tomwebsites.nl`.
- Link naar `trouwambtenaarmarlies.nl` toegevoegd.
- WordPress Customizer-instellingen toegevoegd voor belangrijke portfolio- en projectteksten.
- `page.php` toegevoegd voor afzonderlijke WordPress-pagina’s.
- Navigatie aangepast voor `/over-mij/` en `/contact/`.
- Eigen fallback-layouts toegevoegd voor lege Over mij- en Contact-pagina’s.

## Nog nodig in WordPress

Maak via **Pagina’s → Nieuwe pagina** deze pagina’s aan:

1. `Over mij` met slug `over-mij`
2. `Contact` met slug `contact`

Sla daarna de permalinks opnieuw op via **Instellingen → Permalinks → Wijzigingen opslaan**.

## Les 3: custom theme structureren

### Templatehiërarchie

Voor een statische homepage zoekt WordPress eerst naar `front-page.php`. Daarom gebruikt dit theme `themes/portfolio/front-page.php` voor de homepage. Dit bestand laadt de bestaande portfolio-opmaak uit `index.php` en toont de herkenbare testkop `Template test: front-page.php`.

Voor een gewone WordPress-pagina zoekt WordPress naar `page.php` voordat het terugvalt op `singular.php` of `index.php`. Dit theme gebruikt `themes/portfolio/page.php`, met de testkop `Template test: page.php`.

`index.php` blijft de algemene fallback-template. De stylesheet wordt geladen met `wp_enqueue_style()` en `script.js` wordt geladen met `wp_enqueue_script()` in `functions.php`.

### Effect van post-thumbnails

`add_theme_support( 'post-thumbnails' )` vertelt WordPress dat dit theme uitgelichte afbeeldingen ondersteunt. Daardoor kan de WordPress-editor bij berichten en pagina’s een uitgelichte afbeelding instellen. Templates kunnen die afbeelding vervolgens tonen met functies zoals `the_post_thumbnail()`.

### Getest

| Functionaliteit/pagina | Verwachting | Daadwerkelijk resultaat |
| --- | --- | --- |
| Homepage `/` | WordPress kiest `front-page.php` en toont de testkop. | Geslaagd: de browser toont `Template test: front-page.php` en de portfolio-homepage. |
| Over mij `/over-mij/` | WordPress kiest `page.php` en toont een andere testkop dan de homepage. | Geslaagd: de browser toont `Template test: page.php` en de Over mij-inhoud. |
| Stylesheet en script | CSS en het nieuwe `script.js` worden via de enqueue-functies geladen. | Geslaagd: de styling is zichtbaar en browsercontrole vond één geladen `script.js`-asset. |
| WordPress-pagina’s | De homepagina en Over mij-pagina zijn publiek bereikbaar. | Geslaagd voor de publieke routes. De admin-pagina vroeg om opnieuw inloggen, dus de database-instellingen zijn niet via de beheeromgeving gecontroleerd. |

Er was geen fout tijdens de template- of browsercontrole. De ontbrekende `front-page.php` en script-enqueue zijn toegevoegd en daarna opnieuw getest. De PHP-lintcontrole en `git diff --check` zijn opnieuw uitgevoerd.

### Les 3 commitcontrole

- `git status --short` is gecontroleerd voordat bestanden werden toegevoegd.
- Alleen themebestanden en deze documentatie zijn relevant voor deze wijziging.
- `.env` staat in `.gitignore`; er zijn geen wachtwoorden, sleutels of andere gevoelige bestanden toegevoegd.
- De commit wordt na het testen aangemaakt met een duidelijke Les 3-boodschap en naar `main` gepusht.

## Les 4: header, footer en WordPress Loop

### Nieuwe structuur

- `header.php` bevat de HTML-head, `wp_head()`, `body_class()`, `wp_body_open()` en de gedeelde navigatie.
- `footer.php` bevat copyright- en contactinformatie, `wp_footer()` en de afsluitende HTML-tags.
- `index.php` en `page.php` gebruiken nu `get_header()` en `get_footer()`.
- `page.php` gebruikt de WordPress Loop met `the_title()`, `the_post_thumbnail( 'large' )` wanneer beschikbaar en `the_content()` wanneer de pagina inhoud heeft.
- `front-page.php` blijft de expliciete homepage-template en gebruikt de gedeelde wrappers via de bestaande homepage-rendering.

### Testen

| Functionaliteit/pagina | Verwachting | Daadwerkelijk resultaat |
| --- | --- | --- |
| Homepage `/` | Gedeelde header en footer worden geladen en de homepage toont `front-page.php`. | Geslaagd. Navigatie, homepage-inhoud, footer en `Template test: front-page.php` waren zichtbaar. |
| Over mij `/over-mij/` | `page.php` gebruikt dezelfde header/footer en toont WordPress-paginainhoud via de Loop. | Geslaagd. `Template test: page.php`, de paginatitel, profielinhoud en gedeelde navigatie/footer waren zichtbaar. |
| Contact `/contact/` | Een tweede gewone pagina gebruikt opnieuw `page.php`, met dynamische titel/content en dezelfde wrappers. | Geslaagd. De contacttitel, contacttekst, mailto-link, header en footer waren zichtbaar. |
| WordPress REST-pagina’s | De geteste pagina’s bestaan als gepubliceerde WordPress-pagina’s in de database. | Geslaagd. `/wp-json/wp/v2/pages?slug=over-mij,contact` gaf beide gepubliceerde pagina’s terug. De editor-content is momenteel leeg; daarom toont `page.php` de bestaande slug-fallback. Bij ingevulde editor-content wordt `the_content()` weergegeven. |
| Script enqueue | Het theme-script wordt via `wp_enqueue_script()` geladen. | Geslaagd. De browser vond één geladen `script.js`-asset. |

Er was één structureel probleem: header en footer stonden eerst dubbel in meerdere templates. Dit is opgelost door `header.php` en `footer.php` te maken en de templates om te bouwen naar `get_header()` en `get_footer()`. Daarna zijn PHP-lint, diff-controle en browsercontroles opnieuw uitgevoerd.

### Les 4 commitcontrole

- `git status --short` en `git diff --stat` zijn gecontroleerd vóór commit.
- Alleen de relevante themebestanden en `ai-log.md` zijn toegevoegd.
- Er zijn geen `.env`-bestanden, wachtwoorden, sleutels of andere gevoelige bestanden toegevoegd.
- De wijziging wordt gepusht met een duidelijke commit voor Les 4.
