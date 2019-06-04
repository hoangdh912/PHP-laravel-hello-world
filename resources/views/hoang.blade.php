<html>
  <body>
    <h1>Fuq this world</h1>
    <p>{{ $message2 }}</p>
  </body>
</html>

/*
 *Using blade template:
*/

+ Must end with .blade.php
+ {{ $hoang }} = <?php echo $hoang; ?>
-> auto escape HTML tag
-> no need to type ";"

+ {!! !!}
-> turn off auto escape HTML tag

+pure PHP:
<? if ($something) : ?>
   <p>Something is true!</p>
<? else : ?>
   <p>Something is false!</p>
<? endif; ?>

-> Blade:

@if ($something)
  <p>Something is true!</p>
@else
  <p>Something is false!</p>
@endif
