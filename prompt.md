# Prompt en relevante AI-antwoorden

## Oorspronkelijke prompt

Je bent een WordPress-theme developer. Help mij een eerste opzet te maken voor een persoonlijke portfolio voor een software developer die stage zoekt.

Gebruik een custom WordPress-theme met PHP-templates. Ik wil een homepagina, over-mij-pagina, projectoverzicht, drie projectkaarten en contactsectie. De stijl is rustig en professioneel, mobile-first, met semantische HTML.

Leg per bestand uit wat het doet. Geef geen bestanden die ik niet nodig heb.

Persoonsinformatie:

- Naam: Tom De Jong
- Functie: freelance fullstack software developer
- Locatie: Hoorn, Noord-Holland
- Opleiding: Software Development aan het Mediacollege Amsterdam
- Werkervaring: frontend web developer bij Mila Health en eigenaar van TomWebsites
- Profielafbeelding: `https://tomwebsites.nl/assets/tomproflilepicture-Dk5ZWUts.webp`
- Mila Health-logo: de door de gebruiker aangeleverde LinkedIn-afbeelding

Aanvullende wensen:

- E-mailadres: `info@tomwebsites.nl`
- Echt project: `https://trouwambtenaarmarlies.nl`
- De teksten moeten in WordPress aanpasbaar zijn.
- Mila Health en TomWebsites hoeven niet uitgebreider getoond te worden.
- Stel vragen wanneer belangrijke informatie ontbreekt.

## Relevante vervolgvraag

De gebruiker meldde dat de over-mij-pagina ontbrak en dat er een contactsectie nodig was.

## Relevante vervolgvraag

De gebruiker meldde dat de over-mij-pagina er hetzelfde uitzag als de homepage.

## Relevante vervolginformatie

De gebruiker liet de inhoud van de pagina Algemene instellingen in WordPress zien. Daaruit bleek dat de pagina’s nog via WordPress aangemaakt moesten worden.

## Relevante AI-antwoorden

### Eerste implementatie

- `index.php` werd uitgebreid tot een one-page portfolio met hero, over-mij-sectie, projectoverzicht, drie projectkaarten, contactsectie en footer.
- `functions.php` kreeg theme support en stylesheet-enqueueing.
- `style.css` kreeg een rustige, responsive en mobile-first vormgeving.
- Er werden geen extra bestanden toegevoegd in deze eerste versie.

### Aanpassingen na aanvullende informatie

- Het e-mailadres werd gewijzigd naar `info@tomwebsites.nl`.
- De kaart van Trouwambtenaar Marlies kreeg een link naar `https://trouwambtenaarmarlies.nl`.
- Belangrijke teksten en projecttitels werden aanpasbaar gemaakt via **Weergave → Customizer → Portfolio teksten**.
- Mila Health en TomWebsites bleven compact.

### Toevoegen van losse pagina’s

- `page.php` werd toegevoegd als template voor afzonderlijke WordPress-pagina’s.
- De navigatie werd aangepast zodat Over mij naar `/over-mij/` en Contact naar `/contact/` verwijzen.
- De gebruiker moet in WordPress pagina’s aanmaken met de slugs `over-mij` en `contact`.
- Na het aanmaken moet WordPress via **Instellingen → Permalinks → Wijzigingen opslaan** de URL-structuur opnieuw opslaan.

### Verschillende layout voor Over mij en Contact

- `page.php` kreeg slug-afhankelijke fallback-inhoud.
- Een lege pagina met slug `over-mij` toont een eigen introductie en vaardigheden.
- Een lege pagina met slug `contact` toont een eigen contacttekst en e-mailadres.
- Zodra inhoud via de WordPress-editor wordt toegevoegd, wordt die inhoud gebruikt in plaats van de fallback.
