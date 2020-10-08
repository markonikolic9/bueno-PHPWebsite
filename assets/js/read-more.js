$(document).ready(function() {
    let showChar = 250;

    $('.more').each(function() {
        let content = $(this).html();

        if(content.length > showChar) {

            let c = content.substr(0, showChar);

            let html = c +"...";

            $(this).html(html);
        }

    });

});