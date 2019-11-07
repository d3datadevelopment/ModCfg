module.exports = {

    options: {
        yuicompress: true,
        optimization: 2,
        plugins: [
            new (require('less-plugin-autoprefix'))({
                browsers: [
                    "last 10 versions", 
                    "> 0.2%",
                    "> 0.1% in DE"
                ]
            })
        ]
    },

    module: {
        options: {
            sourceMap: false,
            sourceMapFileInline: false,
            compress: true
        },
        files: {
            "../out/admin/src/d3_mod_cfg.min.css": "origin/less/styles_admin.less"
        }
    },
    
    module_sourcemap: {
        options: {
            sourceMap: true,
            sourceMapFileInline: true,
            compress: true
        },
        files: {
            "../out/admin/src/d3_mod_cfg.min.css": "origin/less/styles_admin.less"
        }
    },
    
    module_unminified: {
        options: {
            sourceMap: false,
            sourceMapFileInline: false,
            compress: false
        },
        files: {
            "../out/admin/src/d3_mod_cfg.css": "origin/less/styles_admin.less"
        }
    }

};
