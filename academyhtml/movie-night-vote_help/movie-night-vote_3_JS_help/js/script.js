$(document).ready(function() { // make sure the page is ready for jquery

    // this is a one line comment

    /* this is
    a multi line comment */

    $('#vote_button').click(function(event) {  // when the submit button gets clicked

      if ($("input:checked").length == 0) {  // if the there are no inputs that are checked
        event.preventDefault(); // stop the functionality of the click on the submit button
        alert('You need to select a movie'); // tell the user
      }

    });

    // add additional javascript here
    $('.poster').click(function () {
      /* everything inside here only
      happens after the click */

      // Test
      // var title = $(this).find('span').text();
      // alert(title + ' was picked!');

      // Step 3

      // 1+2
      $('.poster').find('img').css('border', '4px solid #ffffff');
      // 3+4
      $('.poster').find('img').css('height', '150px');
      $('.poster').find('img').css('margin-top', '0px');

      // 1+2
      $(this).find('img').css('border', '4px solid #ff0000');

      // 3+4
      $(this).find('img').animate({
        'height': '170px',
        'margin-top': '-20px'
      })
    });
});
