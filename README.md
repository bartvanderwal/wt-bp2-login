# Beroepsproduct 2

## Inloggen
Het is niet toegestaan om in je database wachtwoorden ongehashed op te slaan. 
Je hebt twee keuzes:
- Wachtwoorden gehashed in de database opslaan [`password_hash(...)`](http://php.net/manual/en/function.password-hash.php) bij registreren en bij inloggen hiertegen controleren met [`password-verify(...)`](http://php.net/manual/en/function.password-verify.php)
- GEEN wachtwoorden in de database opslaan

Hashen is dus niet verplicht, maar levert wel betere beoordeling op. Omdat je wel sowieso de situatie moet uitcoderen dat inloggen goed gaat of fout gaat, moet je in het laatste geval wel iets maken. Typisch:
- hard-coded login, bijvoorbeeld 'login: bezoeker1', wachtwoord: 'abc123'
- of een standaard conventie volgen wachtwoord=<login>+'123' (bv. `justine`, `justine123` werkt)

In het geval de aanmelding niet lukt moet je webapplicatie de gebruiker een duidelijk foutmelding laten zien. Hierbij moet je verschillende gevallen checken, dus zowel dat een ingegeven gebruikersnaam niet bestaat, als dat deze wel bestaat maar het ingegeven wachtwoord hierbij niet klopt.
Let er wel op dat je dit NIET weggeeft in je foutmelding, dus gebruik in principe een enkele foutmelding:
`Ongeldige gebruikersnaam en/of wachtwoord`. Zeker als je als loginnaam een e-mail adres gebruikt, zoals veel websites tegenwoordig doen.
Hackers moeten een site niet kunnen checken of bepaalde mensen hier een account hebben, dan zijn al een eindje op weg.
Bescherming tegen brute force attack hoef je niet in te bouwen (=registratie aantal inlogpogingen en blokkeren na bepaald aantal). In de praktijk kun je het beste een bestaande login framework/functionaliteit gebruiken, net als voor security.

## Scheiden van HTML en PHP
In je statisch product moest je al HTML en CSS van elkaar scheiden. Content en layout. Met CSS in aparte .css bestanden. In het dynamische Zorg voor het scheiden van HTML en PHP code. De PHP code styleguide genaamd [FIG-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md) opgesteld vanuit grote PHP bedrijven (als Drupal, Pear en Zend) zegt bijvoorbeeld:
"Files SHOULD either declare symbols (classes, functions, constants, etc.) or cause side-effects (e.g. generate output, change .ini settings, etc.) but SHOULD NOT do both."

Dit zijn al gevorderde technieken, maar in dit code voorbeeld is gekozen voor een iets gevorderde vorm ook wel bekend als het Post-Redirect-Get patroon (voor meer zie bv. [Wikipedia](https://en.wikipedia.org/wiki/Post/Redirect/Get))
Dit betekent dus dat je herbruikbare functies in aparte bestanden zet, zoals `functions.php` en `database.php` moet scheiden van je content bestanden zoals `index.php`.
PHP developers gebruiken ook vaak een 


Zorg ook als team dat je een consistente coding style hebt. Zowel qua naamgeving van bestanden en folders (engels óf nederlands talig, niet beide door elkaar). Advies is alleen kleine letters te gebruiken (dus geen `camelCase` of `PascalCase`) en dashes te gebruiken, geen underscores. Maar wees in ieder geval consistent:
- `index.php`
- `/_includes/database.php`
- `/acties/do-login.php`