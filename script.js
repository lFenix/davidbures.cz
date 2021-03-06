/*$(document).ready(function () {
    function convertRemToPixels(rem) {    
        return rem * parseFloat(getComputedStyle(document.documentElement).fontSize);
    }

    $('karta').on('mouseenter', function() {
        thumbKarty = $(this).children('kartaThumb');
        puvodniThumb = thumbKarty.css("background-image");

        const poziceThumb = thumbKarty.offset().top;

        $('section#software').children('a').on('mouseover', function() {
            pozice = $(this).offset().top;
    
            rozdilVysek = pozice - poziceThumb;
            rozdilVysekMarginFix = rozdilVysek - convertRemToPixels(6);

            switch ($(this).attr('id')) {
                case "softwareKeka":
                    $(thumbKarty).get(0).style.setProperty("background", "url(img/kekaThumb.png)");
                    break;
                case "softwareMultiMC":
                    $(thumbKarty).get(0).style.setProperty("background", "url(img/multiMCThumb.png)");
                    break;
                case "softwareGnome":
                    $(thumbKarty).get(0).style.setProperty("background", "url(img/gnomeThumb.png)");
                    break;
                case "softwareDeepin":
                    $(thumbKarty).get(0).style.setProperty("background", "url(img/deepinThumb.png)");
                    break;
                case "softwareAntergos":
                    $(thumbKarty).get(0).style.setProperty("background", "url(img/antergosThumb.png)");
                    break;
                default:
                    $(thumbKarty).get(0).style.setProperty("background", "url(pakThumb_small.jpg)");
                    break;
            }
    
            $(thumbKarty).get(0).style.setProperty("top", rozdilVysekMarginFix + "px");
        });
    });
    $('karta').on('mouseleave', function(){
        $(thumbKarty).get(0).style.setProperty("top", "2rem");
        $(thumbKarty).get(0).style.setProperty("background", puvodniThumb);
    });

    $('tr').on('mouseenter', function() {
        console.log('Myš vevnitř tr');
        var vyska = $(this).outerHeight();
        console.log(vyska);

        $("body").get(0).style.setProperty("--zvyrazneniVyska", vyska + "px");
    });
});*/

[...document.querySelectorAll('tr')].forEach(function(item) {
    item.addEventListener('mouseenter', function (event) {
        var vyska = this.offsetHeight;
        $("body").get(0).style.setProperty("--zvyrazneniVyska", vyska + "px");
    });
});