# rebuild assets

All module related CSS/JavaScript files can be found in `build` directory. To regenerate the modules assets, the `grunt` tasks should be used. Please install `grunt` and run grunt's default task to regenerate all minimized `css` and `js` files:

1. To use `grunt`, `npm` is required. Check `nodejs` website for installation instructions (https://nodejs.org/en/download/package-manager/). Please make sure you have the latest version of `npm` installed (run `npm install -g npm` to update). 

2. Go to "build" directory and install `grunt` and all related `grunt` plugins:

   ```
   npm install
   ```

3. Try to run `grunt --version`. If the message "Command not found" appears, install grunt-cli globally: 

   ```
   npm install -g grunt-cli
   ```

4. The module-specific LESS/SASS files use the LESS/SASS variables of the shops Flow or Wave theme. 
   
   If the LESS/SASS files of the parent theme are missing, re-install it with Composer and the `--prefer-source` option:

   - delete the desired package in the vendor directory
   - reinstall it with "composer update oxid-esales/*-theme --prefer-source"
   
   If you have customized these, you may need to recreate the module assets. Please note, that CSS and JavaScript files were overwritten by module updates. Then run the generation again or better store your customizations in own files.

5. Compile assets from sources (Wave, Flow or Azure theme or its childs)

   Make a full checkout (not an export) of the relevant tag from themes repository at [Github](https://github.com/OXID-eSales/) and copy additional files (especially `build` folder, `Gruntfile.js` and `packages.json`) to Application/views/wave or install theme with prefer-dist option in Composer.

   Now it's possible to regenerate module assets by running Grunts default task (`production`) while being in "build" directory:

   ```
   grunt
   ```

   Optionally use one of the following Grunt tasks
   - `grunt production`
   - `grunt development` (generate unminified assets with source maps instead)
