# EET Check
Google Chrome extension pro jednoduchou kontrolu odesílaných hodnot pomocí přímého vložení hodnotu [do kontrolního formuláře EET](https://adisspr.mfcr.cz/adistc/adis/idpr_pub/eet/uct/overeni.faces)

## Instalace do Google Chrome
Použijte instalaci z Chrome Web Store: [**EET Check**](https://chrome.google.com/webstore/detail/eet-check/oclaelbdlbdkemcdhilhhdegbgdlplbi) a nebo přímo na [webu aplikace](https://eet-check.appspot.com).

## Vlastnosti
- Vyplní hodnoty do [kontrolního formuláře EET](https://adisspr.mfcr.cz/adistc/adis/idpr_pub/eet/uct/overeni.faces) podle údajů předaných v aplikaci v URL.
- Protože vyžaduje v prohlížeči rozšíření, zkontroluje nejdříve, zda má uživatel tento nainstalovaný.
- Tento nástroj žádným způsobem neobchází CAPTCHA ochranu formuláře Daňového portálu, takže nelze data získat bez spolupráce uživatele (neposkytuje přímé API proti serverům MF)

## Záměr pluginu
Kontrolovat účtenky **z vlastní pokladny** je v systému EET hrozný opruz - opisovat přesné datum a 2× 30místný kód bez tolerance nejmenšího překlepu je mimořádně nepohodlné. Záměrem je poskytnout překlenovací nástroj, který nastaví rozhraní, přes které bude možné z pokladních aplikací vyplnit formulář jedním kliknutím.

## Příklad
Jako příklad vezmu [ukázkovou účtenku aplikace Teeta](https://www.teeta.cz/FE377FC3) a tuto přenesu do kontrolního formuláře EET jedním klinutím na [odkaz](https://eet-check.appspot.com/check?dic=CZ64949681&date=2016-12-12T15:19:21Z&price=1000&bkp=231BC9D2-315F2D8B-A575C18B-6233CD22-4AEADDDF&fik=d978569c-cff2-4ce0-af80-edcc8f29c7e2-ff):
```
https://eet-check.appspot.com/check?dic=CZ64949681&date=2016-12-12T15:19:21Z&price=1000&bkp=231BC9D2-315F2D8B-A575C18B-6233CD22-4AEADDDF&fik=d978569c-cff2-4ce0-af80-edcc8f29c7e2-ff
```
## Api dokumentace
Typ požadavku: `GET` nebo `POST` (nerozlišuje se)

Endpoint URL:
```
https://eet-check.appspot.com/check
```
Parametry:
- **dic** - číselná část DIČ,
- **date** - datum a čas ve formátu ISO 8601 (např. `2016-12-12T15:19:21Z`),
- **price** - cena v číselném formátu
- **bkp** - BKP kód, pouze celý, nezkrácený, volitelně dělený pomlčkami, case insensitive
- **fik** - FIK kód, pouze celý, nezkrácený, volitelně dělený pomlčkami, case insensitive
