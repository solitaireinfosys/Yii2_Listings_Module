$(document).ready(function ()
{
    var vars = {};
    var limit = 10;
    var offset = 0;
    var param = "SearchItems%5Bsearch%5D";
    window.location.href.replace( location.hash, '' ).replace(/[?&]+([^=&]+)=?([^&]*)?/gi, 
    function( m, key, value )
    { 
      vars[key] = value !== undefined ? value : '';
    });

    var search = (vars[param] !== undefined) ? vars[param] : ''; 
    busy = true;
    offset = limit + offset;
    var url_params = "&SearchItems[search]=" + search; 

    $('#container').waterfall({
        itemCls: 'item',
        colWidth: 240,  
        gutterWidth: 15,
        gutterHeight: 15,
		maxPage: 5,
        checkImagesLoaded: false,
        path: function(page) {  
            return 'item?page=' + page + url_params;        
        }
    });
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-1245097-16']);
    _gaq.push(['_trackPageview']);
    _gaq.push(['_trackPageLoadTime']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = 'https://ssl.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

});