<!DOCTYPE html>
<html>
<head>
  <title>vocabulary</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <div id="container">
    <h1 id="title">IT Vocabulary</h1>
    <input type="text" id="word" placeholder="Enter a word">
    <div id="suggestions"></div>
    <button id="search">Search</button>
    <div id="meaning"></div>
  </div>

  <script>
    $(document).ready(function() {
      $('#word').on('keyup', function() {
        var word = $(this).val();
        if (word.length > 0) {
          $.ajax({
            type: 'POST',
            url: 'vocabulary.php',
            data: {action: 'suggest', word: word},
            dataType: 'json',
            success: function(data) {
              $('#suggestions').html('');
              $.each(data, function(index, value) {
                $('#suggestions').append('<div>' + value + '</div>');
              });
              $('#suggestions').show();
            }
          });
        } else {
          $('#suggestions').hide();
        }
      });

      $('#suggestions').on('click', 'div', function() {
        var word = $(this).text();
        $('#word').val(word);
        $('#suggestions').hide();
        $.ajax({
          type: 'POST',
          url: 'vocabulary.php',
          data: {action: 'search', word: word},
          success: function(data) {
            $('#meaning').html(data);
          }
        });
      });

      $('#search').click(function() {
        var word = $('#word').val();
        $.ajax({
          type: 'POST',
          url: 'vocabulary.php',
          data: {action: 'search', word: word},
          success: function(data) {
            $('#meaning').html(data);
          }
        });
      });
    });
  </script>
</body>
</html>
