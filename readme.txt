KOM-core
=================================================

Version 1.0, 23.03.2014

Autor: Martin Stoppler @stoppegp
Lizenz: GPL


Anleitung (work in prograss)
=============================


1. Installation

Die ./install/install.php aufrufen. Auf der Seite Seitentitel, URL zum KOM-Core (ohne "/" am Ende), Start- und Enddatum der Betrachtungszeit (Legislaturperiode) sowie Datenbank-Zugangsdaten eingaben. Um mehrere Installationen innerhalb einer Datenbank zu verwalten, kann noch ein Pr�fix f�r die Tabellen angegeben werden.
Es wird nun automatisch eine config.php im hauptordner bestellt und eine Grundstruktur in der Datenbank. Anschlie�end unbedingt das Verzeichnis "install" l�schen!
F�r ein Frontend muss nun noch das KOM-Interface in den Ordner "interface" kopiert werden.

2. Einrichtung

Erst versichern, dass der Ordner "install" gel�scht wurde! Die Administration wird �ber ./admin/admin.php ausgerufen. Nach der Installation kann man sich mit dem Benutzernamen "admin" und dem Kennwort "admin" einloggen. Diese Daten sollten sofort unter "Benutzer" (siehe 2.1) ge�ndert werden!


2.1 Benutzer anpassen

Als erstes sollten die Benutzer angepasst werden. �ber den Men�eintrag "Benutzer" werden alle aktiven benutzeraufgelistet. Nach der Installation existiert hier nur der Eintrag "admin". �ber "bearbeiten" kann hier das Kennwort und der Benutzername ge�ndert werden.


2.2 Bewertungen

Als n�chstes empfiehlt es sich, die Bewertungen anzupassen. Jedes Versprechen kann unterschiedlich bewertet werden, welche M�glichkeiten zur Verf�gung stehen, kann unter "Bewertungen" eingestellt werden. Grunds�tzlich wir zwischen zwei Arten unterschieden: "Forderung" - hier geht es um Versprechen, wo aktiv etwas umgesetzt werden muss, und "Zustand" - hier geht es um versprechen, wo ein Zustand bewahrt werden soll, also keine Aktion notwendig ist, um das Versprechen zu halten.
Weiter k�nnen die Bewertungen gruppiert werden, um eine �bersichtlichere Auswertung zu erm�glichen. Drei Arten sind hier vorgegeben - umgesetzte Versprechen, gebrochene Versprechen und Versprechen, bei denen nichts passiert ist. Weiterhin k�nnen auch eigene, neue Gruppen erstellt werden.


2.3 Kategorien

Jedes Thema muss mindestens einer Kategorie zugeteilt werden. Um also Themen erstellen zu k�nnen, muss erst mindestens eine Kategorie erstellt werden.


2.4 Parteien

Versprechen m�ssen einer Partei zugeordnet werden - also m�ssen erst Pareien erstellt werden.


2.5 Themen, Versprechen, Status

Jetzt ist alles wichtige eingerichtet, und es kann mit der Erstellung der Themen begonnen werden!


3. Administration


3.1 Themen

Auf der Themen-Seite werden alle erstellten Themen, sortiert nach Kategorien, angezeigt.
Ein neues Thema kann �ber den Button "Neues Thema" erstellt werden. Hier muss zwingend ein Name und mindestens eine Kategorie angegeben werden. Au�erdem empfiehlt es sich, eine Beschreibung hinzuzuf�gen. Nach dem erfolgreichen Erstellen wird das Thema automatisch ge�ffnet (siehe 3.2 und 3.3).
�ber den Button "bearbeiten" kann ein Thema ge�ndert werden, der Button "l�schen" entfernt das Theme und alle darin enthaltenen Versprechen (siehe 3.2) und Status (siehe 3.3).
�ber den Button "�ffnen" oder mit einem Klick auf den Namen des Themas wird das Thema ge�ffnet (siehe 3.2 und 3.3).


3.2 Versprechen

Wenn ein Thema ge�ffnet wurde (siehe 3.1) wird in der oberen H�lfte eine Liste aller enthaltenen Versprechen, sortiert nach Partei, angezeigt.
Ein neues Versprechen kann �ber den Button "Neues Versprechen" erstellt werden. Hier muss zwingend der Text des Versprechens und eine Partei angegeben werden. Au�erdem ist das Feld "Startinfo" Pflicht - es definiert zum einen, ob das Versprechen eine "Forderung" oder ein "Zustand" ist (siehe 2.2) und zum anderen, welche Bewertung zu Beginn des Betrachtungszeitraum aktiviert ist. Zus�tzlich sollte zu jedem Versprechen eine Quelle definiert sein - hier gibt es zwei M�glichkeiten: Das Wahlprogramm - dann m�ssen nur die Felder "Zitat" und "Seite im Wahlpogramm ausgef�llt werden", oder eine externe Quelle - dann bleibt das Feld "Seite im Wahlprogramm" leer, daf�r muss der Name der Quelle und eine URL angegeben werden.


3.3 Status

Wenn ein Thema ge�ffnet wurde (siehe 3.1) wird in der unteren H�lfte eine Liste aller enthaltenen Status, sortiert nach Datum, angezeigt.
Ein neuer Status kann �ber den Button "Neuer Status" erstellt werden. Hier sind alle Felder Pflichtfelder. Im unteren Bereich kann f�r jedes Versprechen eine Bewertung ausgew�hlt werden, die mit diesem Status zusammengeh�rt. Ist in diesem Status keine Information �ber ein Versprechen enthalten, sollte hier "Keine Information" ausgew�hlt werden.


[...]


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