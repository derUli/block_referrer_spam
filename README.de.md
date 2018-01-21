# block_referrer_spam

## Kompatiblität

* Kompatibel ab UliCMS 2018.2

## Was ist Referrer Spam?

Referrer-Spam (auch Logdatei-Spam) ist eine Sonderform des Suchmaschinen-Spamming. Hierbei werden Webseiten massenhaft aufgerufen, damit sie in den Referrer-Informationen der Statistiken der angegriffenen Webseiten auftauchen.

[Referrer-Spam – Wikipedia](https://de.wikipedia.org/wiki/Referrer-Spam)

## Funktionsweise

Dieses Modul enthält eine statische Liste von Zeichenketten, die typisch für Referrer Spam sind. Die Liste wird mit dem Modul aktualisiert.
Das Modul blockiert Requests, die einen Referrer String haben der mindestens ein Wort in der Liste enthält.

Wenn Sie Referrer Spam erhalten, der nicht vom Modul geblockt wird, passen Sie bitte **nicht** die statische Liste an.
Denn Änderungen an der Listendatei werden bei einem Update des Moduls überschrieben.
Schicken Sie stattdessen einige Beispiele für Spam Referrer an support(at)ulicms.de oder eröffnen SIe ein Issue auf [GitHub](https://github.com/derUli/block_referrer_spam/issues), damit ich diese zum Modul hinzufügen kann.