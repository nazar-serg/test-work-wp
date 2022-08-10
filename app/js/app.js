//menu responsive
$(document).ready(function() {
    $('.header__burger').click(function(event) {
        $('.header__burger, .header__menu').toggleClass('header__active');
        $('body').toggleClass('lock');
    });
});

/* Isotope Active
      ============================*/
$(".speakers").imagesLoaded(function() {
    var grid = $(".grid").isotope({
        itemSelector: ".grid-item",
        percentPosition: true,
        masonry: {
            columnWidth: ".grid-item"
        }
    });

    $(".speakers__aside").on("click", "button", function() {
        var filterValue = $(this).attr("data-filter");
        grid.isotope({
            filter: filterValue
        });
    });

    /* Isotope Menu Active
    ============================*/
    $(".speakers__aside button").on("click", function(event) {
        $(this)
            .siblings(".active")
            .removeClass("active");
        $(this).addClass("active");
        event.preventDefault();
    });
});

//year footer
let date = new Date().getFullYear();

document.getElementById("year").innerHTML = date;

//menu fixed
window.onscroll = () => {
    const menu = document.querySelector('.header');
    const Y = window.scrollY;

    if (Y > 300) {
        menu.classList.add('menu-fixed');
    } else if (Y < 100) {
        menu.classList.remove('menu-fixed');
    }
}