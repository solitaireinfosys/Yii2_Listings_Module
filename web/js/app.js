window.addEventListener('DOMContentLoaded', function(e) {

    var waterfall = new Waterfall({ minBoxWidth: 200 });

    // button click handle
    var btn = document.getElementById('add-btn');
    var response = 0;
    busy = false;
    var limit = 10;
    var offset = 0;
    var boxHandle = newNode();
    //btn.addEventListener('click', function() {
    
    $( window ).scroll(function(e) {
    //console.log("window scroll");
        if ($(window).scrollTop() + $(window).height() > $("#more_items_data").height() && !busy) {    
            
        
            waterfall.addBox(boxHandle());
        }
    });

    var scaleUpbtn = document.getElementById('scaleup-btn');
    scaleUpbtn.addEventListener('click', function() {
        waterfall.minBoxWidth += 50;
        waterfall.compose(true);
    });

    var scaleDownbtn = document.getElementById('scaledown-btn');
    scaleDownbtn.addEventListener('click', function() {

        waterfall.minBoxWidth -= 50;
        waterfall.compose(true);
    });

    window.onscroll = function() {
        console.log("getHighestIndex==",i);
        var i = waterfall.getHighestIndex();
        if(i > -1) {
            // get last box of the column
            var lastBox = Array.prototype.slice.call(waterfall.columns[i].children, -1)[0];
            console.log(lastBox);
            if(checkSlide(lastBox)) {
                var count = 5;
                while(count--) waterfall.addBox(boxHandle());
            }
        }
    };

    function checkSlide(elem) {
        if(elem) {
            var screenHeight = (document.documentElement.scrollTop || document.body.scrollTop) +
                               (document.documentElement.clientHeight || document.body.clientHeight);
            var elemHeight = elem.offsetTop + elem.offsetHeight / 2;

            return elemHeight < screenHeight;
        }
    }

    function newNode() {

        var size = ['660x250', '300x400', '350x500', '200x320', '300x300'];
        var color = [ 'E97452', '4C6EB4', '449F93', 'D25064', 'E59649' ];
        var i = 0;

        var btn = $(".more_item");
        var url = btn.attr('href');
        var data_page = btn.attr('data-page');
        var page = parseInt(data_page); 
        var vars = {};
        var param = "SearchItems%5Bsearch%5D";
        window.location.href.replace( location.hash, '' ).replace(/[?&]+([^=&]+)=?([^&]*)?/gi, 
        function( m, key, value )
        { 
          vars[key] = value !== undefined ? value : '';
        });
        
        var search = (vars[param] !== undefined) ? vars[param] : ''; 
        
        offset = limit + offset;
        var url_params = "&limit=" + limit + "&offset=" + offset + "&SearchItems[search]=" + search;
        var full_url = url + page + url_params;
       
        var data = get_items(full_url,newNode);
 
        console.log("data===",data);
       
        

        return function() {

            var box = document.createElement('div');
            box.className = 'wf-box';
            var image = document.createElement('img');
            image.src = data[0].image_url;
            box.appendChild(image);
            var content = document.createElement('div');
            content.className = 'content';
            var title = document.createElement('h3');
            title.appendChild(document.createTextNode('Heading'));
            content.appendChild(title);
            var p = document.createElement('p');
            p.appendChild(document.createTextNode('Content here'));
            content.appendChild(p);
            box.appendChild(content);

            if(++i === data.length) i = 0;
             console.log("box=======",box);  
            return box;
            
            // var box = document.createElement('div');
            // box.className = 'wf-box';
            // var image = document.createElement('img');
            // image.src = "http://placehold.it/" + size[i] + '/' + color[i] + '/fff';
            // box.appendChild(image);
            // var content = document.createElement('div');
            // content.className = 'content';
            // var title = document.createElement('h3');
            // title.appendChild(document.createTextNode('Heading'));
            // content.appendChild(title);
            // var p = document.createElement('p');
            // p.appendChild(document.createTextNode('Content here'));
            // content.appendChild(p);
            // box.appendChild(content);

            // if(++i === size.length) i = 0;
            //  console.log("box=======",box);  
            // return box;
        
        }
    }

    function get_items(full_url,callback)
    {
        $.get(full_url, function (data) { 
            busy = false;           
            return data;
        });
        //Make sure the callback is a function​
        if (typeof callback === "function") {
            callback(data);
        }
        //return false;
    }
});