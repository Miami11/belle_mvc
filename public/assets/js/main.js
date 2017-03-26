$(function () {

    //跑馬燈
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $('.play').on('click', function () {
        owl.trigger('play.owl.autoplay', [800])
    });

    $('.stop').on('click', function () {
        owl.trigger('stop.owl.autoplay')
    });


    // //視差
    // var parallax = document.querySelectorAll(".prlx_lyr_1"),
    //     speed = -0.5;
    //
    // window.onscroll = function () {
    //     [].slice.call(parallax).forEach(function (el, i) {
    //
    //         var windowYOffset = window.pageYOffset,
    //             elBackgrounPos = "50% " + (windowYOffset * speed) + "px";
    //
    //         el.style.backgroundPosition = elBackgrounPos;
    //
    //     });
    // };

    //加入子nav的內容
    if($("#loginhead"))
    {
        var nav = $("#loginhead");
        $("#loginhead_child").append(nav.html());
    }
    //nav
    if($("#main_nav")){

        var main_nav = $("#main_nav");
        $("#main_nav_child").append(main_nav.html());
    }
});

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it

if(document.getElementById("defaultOpen"))
{
    document.getElementById("defaultOpen").click();
}









var navTop = 140;
var scrollbarTop = 0;

$(window).scroll(
    function () {
        scrollbarTop = $(window).scrollTop();

        if (scrollbarTop > navTop && $(window).width() > 768) {

            // $('.onTop').css('display','none');
            $('.fixed-nav').css('display','block');

        } else {
            // $('.onTop').css('display','block');
            $('.fixed-nav').css('display','none');
        }
    }
);


new Waypoint({
    element: document.getElementById('element-waypoint'),
    handler: function (direction) {
        //notify(this.element.id + ' triggers at ' + this.triggerPoint)
       var item = document.getElementById("sBtn");
        item.className += " animated";
        item.className += " fadeInUp";

    },
    offset: '75%'
});


new Waypoint({
    element: document.getElementById('introduce'),
    handler: function (direction) {

        var obj = document.getElementById('introduce');
        obj.style.opacity = 1;
        var item_array = [];
        item_array.push(document.getElementById("introduce_item_0"));
        item_array.push(document.getElementById("introduce_item_1"));
        item_array.push(document.getElementById("introduce_item_2"));
        item_array.push(document.getElementById("introduce_item_3"));


        for (var num in item_array) {
            item_array[num].className += " animated";
            item_array[num].className += " fadeInUp";
        }

    },
    offset: '75%'
});




new Waypoint({
    element: document.getElementById('expert'),
    handler: function (direction) {

        var obj = document.getElementById('expert');
        obj.style.opacity = 1;
        var item_array = [];
        item_array.push(document.getElementById("expert_item_0"));
        item_array.push(document.getElementById("expert_item_1"));
        item_array.push(document.getElementById("expert_item_2"));

        for (var num in item_array) {
            item_array[num].className += " animated";
            item_array[num].className += " fadeInUp";
        }

    },
    offset: '75%'
})
