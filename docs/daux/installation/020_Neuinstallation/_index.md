---
Title: Schnellstart per Composer
---

## Schnellstart per Composer

### **auf der Kommandozeile**

```bash
php composer require {$composerident}:^{$moduleversion} --update-no-dev
./vendor/bin/oe-console oe:module:activate {$metadataident}
./vendor/bin/oe-console d3:modcfg:modules:setup
./vendor/bin/oe-console d3:modcfg:cleartmp all
```

Detailliertere Angaben zur Installation entnehmen Sie bitte den folgenden Seiten.
