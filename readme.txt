KOM-core
=================================================

Version 1.0 beta2, 27.04.2013

Autor: Martin Stoppler @stoppegp
Lizenz: GPL


Anleitung (work in prograss)
=============================

1. Installation

Die ./install/install.php aufrufen. Auf der Seite Seitentitel, URL zum KOM-Core (ohne "/" am Ende), Start- und Enddatum der Betrachtungszeit (Legislaturperiode) sowie Datenbank-Zugangsdaten eingaben. Um mehrere Installationen innerhalb einer Datenbank zu verwalten, kann noch ein Pr�fix f�r die Tabellen angegeben werden.
Es wird nun automatisch eine config.php im hauptordner bestellt und eine Grundstruktur in der Datenbank. Anschlie�end unbedingt das Verzeichnis "install" l�schen!
F�r ein Frontend muss nun noch das KOM-Interface in den Ordner "interface" kopiert werden.

2. Administration

Die Administration wird �ber ./admin/admin.php ausgerufen. Nach der Installation kann man sich mit dem Benutzernamen "admin" und dem Kennwort "admin" einloggen. Diese Daten sollten sofort unter "Benutzer" (siehe 2.x) ge�ndert werden!

...



Dokumentation (work in progress)
=============================

1. Struktur


1.1 Parteien / "parties"

Parteien enthalten einen Namen ("name"), ein K�rzel ("acronym"), eine Farbe ("colour") und eine Reihenfolge ("order"). Au�erdem werden URL ("programme_url") und Name ("programme_name") sowie ein Seiten-Offset ("programme_offset") festgelegt. Parteien k�nnen in die Wertung aufgenommen oder aus der Wertung ausgeschlossen werden ("doValue"). �blicherweise wird dadurch zwischen Regierungs- und Oppositionsparteien unterschieden.



1.2 Themen / "issues"

Die oberste Ebene sind die Themen. Sie werden noch keinen Parteien zugeordnet, sondern sind erstmal grobe Zusammenfassungen. Themen enthalten einen Namen ("name"), eine Beschreibung ("desc") und k�nnen mehreren Kategorien zugeordnet werden ("category_ids").


1.3 Kategorien / "categories"

Themen werden in Kategorien zusammengefasst. Kategorien enthalten einen Namen ("name"). Au�erdem k�nnen sie deaktiviert werden, um sie nicht in der �bersicht anzuzeigen ("disabled").


1.4 Versprechen / "pledges"

Versprechen werden einem Thema ("issue_id") und einer Partei ("party_id") zugeordnet. Sie enthalten einen Namen ("name") und eine Beschreibung ("desc"). Au�erdem wird die Quelle definiert, hierbei wird unterschieden zwischen dem Wahlprogramm ("quotetype" = "programme") und einer anderen externen Quelle ("quotetype" = "link"). F�rs Wahlprogramm muss zus�tzlich noch die Seite angegeben werden ("quotepage"), f�r eine externe Quelle die URl ("quoteurl") und der Name der Quelle ("quotesource"). In beiden F�llen muss ein Zitat der Quelle angegeben werden ("quotetext").
Grunds�tzlich wird zwischen zwei verschiedenen Arten von versprechen unterschieden: Einer Forderung ("type" = 0) und einer Bewahrung eines Zustands ("type" = 1).
Weiterhin wird ein Startwert f�r die Umsetzung �ber "default_pledgestatetype_id" festgelegt.


1.5 Status / "states"

Wie sich der Zustand eines Themas mit der Zeit �ndert, wird �ber Status geregelt. Ein Status wird einem Thema zugeordnet ("issue_id"). Er ent�lt einen Text ("name"), ein Datum ("datum") und eine Quelle, mit URL ("quoteurl"), Quellenname ("quotesource") und einem Zitat ("quotetext").


1.6 Verbindung von Status und Versprechen / "pledgestates"

Mit jeder Status�nderung kann sich auch der Umsetzungsstand der Versprechen innherhalb eines Themas �ndern. Das wird �ber die "pledgestates" geregelt.
Pledgestates sind einem Versprechen ("pledge_id") und einem Status ("state_id") zugeordnet. Au�erdem wird der neue Umsetzungsstand �ber "pledgestatetype_id" festgelegt. 0 bedeutet hierbei, dass der Status keine Auswirkungen auf das versprechen hat.


1.7 "pledgestatetypes"

Welchen Zustand ein Versprechen haben kann, wird �ber die "pledgestatetypes" geregelt. Hier wird wie bei den versprechen grunds�tzlich zwischen Forderung ("type" = 0) und Zustand bewahren ("type" = 1) unterschieden.
Ein pledgestatetype enth�lt eine Bezeichnung ("name"), einen Wert ("value", �blicherweise 0 oder 1), eine Reihenfolge ("order"), und eine Farbe ("colour"). Au�erdem kann �ber "multipl" festgelet werden, ob Versprechen mit diesem Zustand zur Gesamtzahl hinzugez�hlt werden sollen ("multipl", �blicherweise 0 oder 1).


1.8 "pledgestatetypegroups"

Pledgestatetypes k�nnen in Gruppen zusammengefasst werden. Pledgestatetypegroups enthalten eine Bezeichnung ("name"), eine Farbe ("colour"), eine Reihenfolge ("order") und die pledgestatetypes ("pledgestatetype_ids").