---
title: Systemanforderungen
---

* PHP Version
    * 7.3.x
    * 7.4.x
    * 8.0.x
* PHP Decoder
    * installierter ionCube Loader (PHP bis 7.4) *oder*
    * installierter SourceGuardian Loader (PHP ab 8.0)
* Shopeditionen
    * OXID eShop Community Edition (CE)
    * OXID eShop Professional Edition (PE)
    * OXID eShop Enterprise Edition (EE)
    * OXID eShop B2B Edition
* Shopversionen
    * OXID eShop in Compilation Version 
        * 6.3.x
        * 6.4.x
        * 6.5.x
* Themes
    * Dieses Modul arbeitet unabhängig von Frontendtemplates und hat daher keine speziellen Anforderungen.
* Installation via [Composer](https://getcomposer.org)
* PHP-Bibliothek "OpenSSL"
* PHP-Bibliothek "mbString"
* PHP-Bibliothek "iconv"

Beachten Sie, dass die Ihnen vorliegende Modulversion entsprechend für Ihre genutzte PHP-Version sowie dem auf Ihrem Server vorhandenen Decoder kompatibel ist. Im Zweifelsfall kontaktieren Sie uns und nennen den für Ihren Shop genutzten Decoder und die PHP-Version.

## Verwendung mit der OPcache-Erweiterung

Im Zusammenspiel mit der OPcache-Erweiterung beobachteten wir in der Vergangenheit ungewöhnliche Verhaltensweisen unseres Moduls. Daher empfehlen wir folgende Anpassung:

* deaktivieren Sie in den `opcache.optimization_level`-Einstellungen mit Bit 5 die Control flow graph optimization (Standard in PHP 8 mit deaktiviertem Bit: 0x7FFEBFEF) oder
* deaktivieren Sie die OPcache-Erweiterung komplett