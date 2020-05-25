module.exports = {

    options: {
        preserveComments: 'some'
    },
    
    module: {
        options: {
            sourceMap: false
        },
        files: [
            {
                expand: true,
                src:    "*.js",
                cwd:    "origin/js/",
                dest:   "../out/admin/src/js/",
                ext:    ".min.js",
                extDot: "last"
            }
        ]
    }
};
