//menu responsive
$(document).ready(function() {
    $('.header__burger').click(function(event) {
        $('.header__burger, .header__menu').toggleClass('header__active');
        $('body').toggleClass('lock');
    });
});

// /* Isotope Active
//       ============================*/
// $(".speakers").imagesLoaded(function() {
//     var grid = $(".grid").isotope({
//         itemSelector: ".grid-item",
//         percentPosition: true,
//         masonry: {
//             columnWidth: ".grid-item"
//         }
//     });

//     $(".speakers__aside").on("click", "button", function() {
//         var filterValue = $(this).attr("data-filter");
//         grid.isotope({
//             filter: filterValue
//         });
//     });

//     /* Isotope Menu Active
//     ============================*/
//     $(".speakers__aside button").on("click", function(event) {
//         $(this)
//             .siblings(".active")
//             .removeClass("active");
//         $(this).addClass("active");
//         event.preventDefault();
//     });
// });

jQuery(function($) {
    $('#filter').submit(function() {
        var filter = $('#filter');
        $.ajax({
            url: filter.attr('action'),
            data: filter.serialize(), // form data
            type: filter.attr('method'), // POST
            beforeSend: function(xhr) {
                filter.find('button').text('Processing...'); // changing the button label
            },
            success: function(data) {
                filter.find('button').text('Apply filter'); // changing the button label back
                $('#response').html(data); // insert data
            }
        });
        return false;
    });
});