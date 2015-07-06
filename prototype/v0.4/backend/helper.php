<?php 

function break_array($array, $page_size) {

  $arrays = array();
  $i = 0;

  foreach ($array as $index => $item) {
    if ($i++ % $page_size == 0) {
      $arrays[] = array();
      $current = & $arrays[count($arrays)-1];
    }
    $current[] = $item;
  }

  return $arrays; 
}

?>