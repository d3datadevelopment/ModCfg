/* jshint esversion: 9 */
/* global console */

document.addEventListener ('DOMContentLoaded', function() {
    'use strict';

    const allInBody = document.querySelectorAll('body *');

    let entities = [
        // decode FontAwesome tags <i class="fa..."></i>
        ['&lt;(i\\s+.*?)&gt;&lt;\/i&gt;', '<$1></i>'],
        // decode logo image tag
        ['&lt;(img\\s+.*?oxidmodule.*?)&gt;', '<$1>'],
    ];

    for (const element of allInBody) {
        if (element.childNodes.length === 1 && (
            /<(img\s+.*?oxidmodule.*?)>/g.exec(element.textContent)
        )) {
            let doc = new DOMParser().parseFromString(element.textContent.trim(), "text/html");
            element.append(...doc.getRootNode().body.childNodes);
            element.firstChild.remove();
        }
    }
});