$(document).ready(function() { // make sure the page is ready for jquery

    // this is a one line comment

    /* this is
    a multi line comment */

    $('#vote_button').click(function(event) {  // when the submit button gets clicked

      if ($("input:checked").length == 0) {  // if the there are no inputs that are checked
        event.preventDefault(); // stop the functionality of the click on the submit button
        alert('You need to select a movie'); // tell the user what's happening
      }

    });

    // add additional javascript here
    $('.movie').click(function () {
      /* everything inside here only
      happens after the click */
      var title = $(this).find('span').text();
      alert(title + ' was picked!');
    });

});
