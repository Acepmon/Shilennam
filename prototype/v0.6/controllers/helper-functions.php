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

function break_into($array, $element) {
  $arrays = [];

  $tmp_arr = [];
  $tmp_item = "";
  for ($i = 0; $i < count($array); $i++) {
    if ($i == 0) {
      $tmp_item = $array[$i][$element];
      array_push($tmp_arr, $array[$i]);
    } else {
      if ($array[$i][$element] == $tmp_item) {
        array_push($tmp_arr, $array[$i]);
      } else {
        array_push($arrays, $tmp_arr);
        $tmp_arr = [];
        $tmp_item = $array[$i][$element];
      }
    }
  }

  return $arrays;
}

function proper_strrpos($haystack,$needle){
        while($ret = strrpos($haystack,$needle))
        {
                if(strncmp(substr($haystack,$ret,strlen($needle)),
                                $needle,strlen($needle)) == 0 )
                        return $ret;
                $haystack = substr($haystack,0,$ret -1 );
        }
        return $ret;
}

?>
