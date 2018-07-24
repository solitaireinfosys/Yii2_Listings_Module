$(document).ready(function ()
{   
    var limit = 10;
    var offset = 0;
    var busy = false;

    $( window ).scroll(function(e) 
    {
        e.preventDefault();
        var btn = $(".more_item");
        var url = btn.attr('href');
        var data_page = btn.attr('data-page');
        var page = parseInt(data_page);    

        if ($(window).scrollTop() + $(window).height() > $("#more_items_data").height() && !busy) {

            var vars = {};
            var param = "SearchItems%5Bsearch%5D";
            window.location.href.replace( location.hash, '' ).replace(/[?&]+([^=&]+)=?([^&]*)?/gi, 
            function( m, key, value )
            { 
              vars[key] = value !== undefined ? value : '';
            });

            var search = (vars[param] !== undefined) ? vars[param] : ''; 
            busy = true;
            offset = limit + offset;
            var url_params = "&limit=" + limit + "&offset=" + offset + "&SearchItems[search]=" + search;
            $.get(url + page + url_params, function (data) { 
                busy = false;
                $("#more_items_data").append(data); 
            });
        }
    });
});