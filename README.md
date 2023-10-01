# GTA_PawnOs
Ein System für den PawnShop bei GTA

Das ist ein Versuch eines Noobs etwas in php auf die Beine zu stellen.

Die Idee ist von mir der Code wurde mit der Hilfe von OpenAI geschrieben. Aber ich glaube nur so lernt man etwas.

Aber ich bin immer noch weit am Anfang.

Wenn sich wirklich jemand hierher verläuft und Ideen oder Verbesserungen hat, kann sich gerne hier melden oder das ganze auch überarbeiten.

Ich habe nicht uendlich viel Zeit von daher wird es Step by Step funktionieren.


# Anleitung

Alle Datein in einen Ordner kopieren. 
Die sql-dateien in eine Datenbank importieren. Bei mir heißt die passende Datenbank "pawn".

Danach die index.html öffnen.

An der Rechnung und dem Warenkorb baue ich noch rum. Die Dateien sind schon verfügbar aber es funktioniert noch nicht so recht das kommt als nächstes.
Man kann aber schon neue Artikel eintragen und Artikel suchen, bearbeiten und in der Datenbank löschen.
In der Datenbank wird zum einen Artikelname gespeichert, der Ladenpreis, der Einkaufspreis (für den ihr maximal die Ware einkauft) und der empfohlene Verkaufspreis.

Unter "Einen Artikel suchen und bearbeiten" kann man dann einen Artikelnamen eingeben, dann werden alle Einträge die diesen Namen enthalten angezeigt. Hier kann man den Eintrag dann "Bearbeiten" und "Löschen".

# Nächste Schritte

* Einkaufswagen
  (Artikel über die Suche auswählen und in den "Einkaufswagen" legen. Der bietet die Option ob es sich um einen Ankauf oder Verkauf handelt. Wenn es ein Ankauf ist sollen die empfohlenen Einkaufspreise angezeigt werden, der Einkaufspreis (selber definierbar) und die Anzahl. Daraus wird dann die Summe errechnet und eine Gesamtsumme gebildet. Das ganze soll dann im Textformat einsehbar sein um es ins RDP kopieren zu können)
* Mitarbeiterverwaltung
* Verkaufsübersicht
