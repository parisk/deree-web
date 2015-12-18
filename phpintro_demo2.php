<?php
/**
 * Created by PhpStorm.
 * User: f-mkotsovoulou
 * Date: 16/10/2015
 * Time: 12:31 μμ
 */

  $food = array('pizza', 'salad', 'burger');
  $salad = array('lettuce' => 'with',
            'tomato' => 'without',
            'tomato' => 'within', //overrides the key if duplicate
            'onions' => 'with');

      // Looping through an array using "for"
     for ($i = 0; $i < count($food); $i++) {
         echo $food[$i] . '<br />';
     }


      echo '<br /><br />I want my salad:<br />';

      // Loop through an associative array using "foreach":
      foreach ($salad as $ingredient=>$option) {
          echo $option . ' ' . $ingredient . '<br />';
      }

?>