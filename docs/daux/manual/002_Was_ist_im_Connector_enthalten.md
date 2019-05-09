---
title: Was ist im Connector enthalten
---

Der Modul-Connector enthält folgende Funktionen:

### Modulkonfiguration

Darin werden in einem Standardformat die typischen Einstellungen unserer Module
gespeichert. So liegen diese nun zentral an einer Stelle. Ziehen Sie mit Ihrem Shop um oder
installieren Sie Updates, bleiben die Einstellungen erhalten.

Ihr Vorteil liegt darin, die Einstellungen in praktischen Adminoberflächen, anstatt kryptisch in
Konfigurationsdateien, setzen zu können.

### Automatische Installation

Mit dieser Funktion bieten wir zum ersten Mal eine automatisch ablaufende Installation, wie
Sie dies von Ihrem Heimcomputer kennen. Die Updates und weiteren Connector-Bausteine
werden darüber auf Knopfdruck einfach installiert, ohne dass Sie sich Gedanken um
Kopierarbeiten oder Moduleinträge machen müssen.

Mit Ausnahme der Shopdatenbank werden bei jeder Installation Sicherungen Ihrer Dateien
und Moduleinträge vorgenommen und gesondert auf Ihrem Server abgelegt. Sollte wider
Erwarten etwas falsch laufen, können Sie die Installation sofort wieder rückgängig machen.
Zu einem bestimmten Teil können über die automatische Installation auch Module auf
Knopfdruck installiert werden.

> Aus technischen und Speichergründen legen Sie bitte vor jeder Installation die
Datenbanksicherung selbst an. Jede Installation weist Sie vor Beginn noch einmal darauf hin.

### Protokollierung

Um möglicherweise auftretenden Fehlern schneller auf den Grund gehen zu können, können
unsere Module bestimmte Aktionen protokollieren, wenn dies aktiviert ist. Wo Sie dies für
jedes betreffende Modul einstellen, erfahren Sie bei uns.

Im Adminbereich finden Sie nun zusätzliche eine Möglichkeit, alle Protokolle einzusehen.
Neben dem Export in verschiedenen Formaten ist auch das Löschen von Alteinträgen damit
bequem möglich.

### TMP-leeren

Wie Sie möglicherweise schon festgestellt haben, ist es bei vielen Änderungen im Shop nötig,
den TMP-Ordner zu leeren. Diese Aktion selbst hat keine Auswirkungen auf die
Shopfunktionen und ist im Regelfall unbedenklich. Jedoch benötigt man dazu einen FTP-
Zugang zum Server. Das Leeren kann je nach Größe des Ordners aber auch eine Weile dauern.
Im TMP-Ordner werden vorgefertigte Daten gespeichert, um diese nicht bei jedem
Seitenaufruf neu erstellen zu müssen. Somit wird der Oxid Shop durch die temporären Dateien
schneller und der Server weniger belastet. Im Ordner werden Dateien zu verschiedenen
Aktionen abgelegt. Zum Beispiel werden dort vorbereitete Templates abgelegt, aber auch die
Datenbankstruktur, die Menüliste und die Modulerweiterungen finden sich dort temporär
wieder. Werden die Dateien gelöscht, legt der Shop diese automatisch beim nächsten Aufruf
wieder an.

Werden nun Änderungen an den Templatedateien vorgenommen, reicht es eigentlich aus, die
für die Templates zuständigen Dateien im TMP-Ordner zu löschen. Da die Dateibenennung
nicht immer klar und verständlich ist (ganz normal bei temporären Dateien), lässt sich dies
manuell kaum umsetzen. Zwar funktioniert das komplette Löschen aller enthaltenen Dateien
genauso gut, belastet den Shop bei den folgenden Aufrufen stark, da eben auch unveränderte
Dateien wieder erstellt werden müssen.

Im Modul Connector ist die "TMP leeren"-Funktion immer dabei.

Im Adminbereich des Shops finden Sie unter [D3 Module] -> [Modul Connector] ->
 [TMP leeren] die Bedienoberfläche. Hier können Sie auswählen, welche Bereiche des TMP-
Ordners geleert werden sollen. Alternativ können Sie bei Unklarheiten auch den kompletten
Ordner leeren.

Die temporären Dateien sind nach außen durch eine so benannte .htaccess-Datei geschützt.
Beim kompletten Leeren des Ordners wird diese normalerweise mit entfernt, der Ordner ist
dann nicht mehr gesichert. Die "TMP leeren"-Bibliothek stellt sicher, dass diese Datei nach
dem Leeren immer wieder selbstständig angelegt wird.

Neben den Löschfunktionen zeigt die Oberfläche statistische Daten über das komplette TMP-
Verzeichnis und auch alle möglichen Einstellungen der Bibliothek.

Zum "TMP leeren" gibt es optional verschiedene Einstellmöglichkeiten: Unter [D3 Module]
-> [Modul Connector] -> [Bibliotheken] -> [Modul-Connector] können Sie
dauerhaft einstellen, ob die .htaccess-Datei immer angelegt werden soll oder ob Unterordner
automatisch mit entfernt werden sollen. Manchmal sind diese Funktionen nicht gewollt. Diese
können dort bei Bedarf deaktiviert werden.

Häufig wird uns die Frage gestellt, ob es sinnvoll ist, den TMP-Ordner regelmäßig zu leeren.
Eindeutig: Nein! Solange keine Änderungen am Shop vorgenommen wurden, wird der Shop
unter Umständen durch das Neuerstellen der temporären Dateien stark belastet. Und danach
sind die TMP-Dateien auch sofort wieder vorhanden. Speicherplatzgründe zählen also nicht.

### Sicherheitsprüfung

Unzureichende Sicherungsmaßnahmen gefährden Ihren Shop. Diese Punkte gehen gern im
Alltag unter oder werden übersehen. Die üblichen Risiken werden vom Assistenten überprüft
und Lösungen per Mausklick angeboten. Hierbei wird auch shopfremde Software auf
Sicherheitsrisiken gecheckt.

Rufen Sie diese Seite in regelmäßigen Abständen auf, um den Status zu kontrollieren.