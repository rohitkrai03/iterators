<?php 
  
  function redirect_to($new_location){
  	header("Location: " . $new_location);
  	exit;
  }	

  function mysql_prep($string){
  	global $connection;
  	$escaped_string = mysqli_real_escape_string($connection, $string);
  	return $escaped_string;
  }

  function confirm_query($result_set){
  	global $connection;
    if(!$result_set){
  		die("Database query failed. " . mysqli_error($connection));
  	}
  }

  function find_data_for_stock($stock, $field){
  	global $connection;
  	$query = "SELECT {$field} ";
    $query .= "FROM {$stock} ";
    $query .= "WHERE 1";
  	$data_set = mysqli_query($connection, $query);
  	
  	confirm_query($data_set);
    
    while($data = mysqli_fetch_assoc($data_set)){
      $data_array[] = $data[$field]; 
    }
    mysqli_free_result($data_set);
    return $data_array;
  	

  }

  function find_max_data($stock, $field){
    global $connection;
    $query = "SELECT max({$field}) ";
    $query .= "FROM {$stock} ";
    $query .= "WHERE 1";
    $max_data_set = mysqli_query($connection, $query);
    confirm_query($max_data_set);
    if ($max_data = mysqli_fetch_row($max_data_set)) {
      mysqli_free_result($max_data_set);
      return $max_data[0];
    } else{
      return null;
    }
    
    
  }

  function find_min_data($stock, $field){
    global $connection;
    $query = "SELECT min({$field}) ";
    $query .= "FROM {$stock} ";
    $query .= "WHERE 1";
    $min_data_set = mysqli_query($connection, $query);
    confirm_query($min_data_set);
    if ($min_data = mysqli_fetch_row($min_data_set)) {
      mysqli_free_result($min_data_set);
      return $min_data[0];
    }else{
      return null;
    }
    
    
  }

  function find_no_of_fields($stock, $field){
    global $connection;
    $query = "SELECT count({$field}) ";
    $query .= "FROM {$stock} ";
    $query .= "WHERE 1";
    $count_set = mysqli_query($connection, $query);
    confirm_query($count_set);
    if ($count = mysqli_fetch_row($count_set)) {
      mysqli_free_result($count_set);
      return $count[0];
    }else{
      return null;
    }
  }

  function find_bin($stock, $field){
    $count = find_no_of_fields($stock, "id");
    $k = sqrt($count);
    $max = find_max_data($stock, "{$field}_diff");
    $min = find_min_data($stock, "{$field}_diff");
    $h = ($max-$min)/$k;
    $bin[] = $min;
    while ($min<=$max) {
      $bin[] = $min + $h;
      $min += $h;
    }

    return $bin;
  }

  function find_freq($stock, $field, $bin){
    $count = find_no_of_fields($stock, "id");
    $freq = array_fill(0, count($bin), 0);
    $diff = find_data_for_stock($stock, "{$field}_diff");

    for ($i=0; $i < $count; $i++) { 
      for ($j=0; $j < count($bin) ; $j++) { 
        if($bin[$j] <= $diff[$i] && $diff[$i] < $bin[$j+1]){
          $freq[$j]++;
        }
      }
    }

    return $freq;
  }

  function find_cum_freq($freq){

    $cum_freq = array_fill(0, count($freq), 0);
    for ($i=0; $i < count($freq) ; $i++) { 
      for ($j=0; $j <= $i; $j++) { 
        $cum_freq[$i] += $freq[$j];
      }
    }
    
    return $cum_freq;
  }

  function find_quartile_range($bin, $freq, $cum_freq){
    $n = end($cum_freq);
    $n1 = $n/4;
    $n2 = $n/2;
    $n3 = ($n*3)/4;
    $range[] = $bin[0];
    for ($i=0; $i < count($cum_freq) ; $i++) { 
      if ($cum_freq[$i]<=$n1 && $n1<$cum_freq[$i+1]) {
        $range[] = ($n1-$cum_freq[$i])<($cum_freq[$i+1]-$n1) ? $bin[$i] : $bin[$i+1];
      }
      if ($cum_freq[$i]<=$n2 && $n2<$cum_freq[$i+1]) {
        $range[] = ($n2-$cum_freq[$i])<($cum_freq[$i+1]-$n2) ? $bin[$i] : $bin[$i+1];
      }
      if ($cum_freq[$i]<=$n3 && $n3<$cum_freq[$i+1]) {
        $range[] = ($n3-$cum_freq[$i])<($cum_freq[$i+1]-$n3) ? $bin[$i] : $bin[$i+1];
      }
    }
    $range[]=end($bin);

    return $range;

  }

  function find_p_states($stock, $field, $range){
    $diff = find_data_for_stock($stock, "{$field}_diff");
    foreach ($diff as $key => $value) {
      if ($range[0] <= $value && $value < $range[1]) {
        $p_states[$key] = "P1";
      }elseif ($range[1] <= $value && $value < $range[2]) {
        $p_states[$key] = "P2";
      }elseif ($range[2] <= $value && $value < $range[3]) {
        $p_states[$key] = "P3";
      }elseif ($range[3] <= $value && $value < $range[4]) {
        $p_states[$key] = "P4";
      }else{
        $p_states[$key] = null;
      }
    }
    return $p_states;
  }

  function find_transition_states($p_states){
    for($key=0; $key < count($p_states)-1; $key++) {
      for ($i=1; $i <= 4; $i++) { 
        for ($j=1; $j <= 4 ; $j++) { 
          if (($p_states[$key] == "P" . $i) && ($p_states[$key+1] == "P" . $j) ) {
            $transition_states[$key+1] = "P_" . $i . $j;
          }
        }
      }
    }
    return $transition_states;
  }

  function find_state_count($p_states, $transition_states){
    $state_count = array(
      'P1' => 0 ,'P2' => 0 ,'P3' => 0 ,'P4' => 0 ,
      'P_11' => 0 ,'P_12' => 0 ,'P_13' => 0 ,'P_14' => 0 ,
      'P_21' => 0 ,'P_22' => 0 ,'P_23' => 0 ,'P_24' => 0 ,
      'P_31' => 0 ,'P_32' => 0 ,'P_33' => 0 ,'P_34' => 0 ,
      'P_41' => 0 ,'P_42' => 0 ,'P_43' => 0 ,'P_44' => 0 
      );
    foreach ($p_states as $key => $value) {
      if ($value == "P1") {
        $state_count["P1"]++; 
      }elseif ($value == "P2") {
        $state_count["P2"]++;
      }elseif ($value == "P3") {
        $state_count["P3"]++;
      }elseif ($value == "P4") {
        $state_count["P4"]++;
      }
    }
    foreach ($transition_states as $key => $value) {
      for ($i=1; $i <= 4; $i++) { 
        for ($j=1; $j <= 4 ; $j++) { 
          if ( $value == "P_" . $i . $j) {
            $state_count["P_" . $i . $j]++;
          }
        }
      }
    }

    return $state_count;
  }

  function create_transition_matrix($state_count){
    $transition_matrix = array(

        array($state_count["P_11"]/$state_count["P1"] , $state_count["P_12"]/$state_count["P1"], $state_count["P_13"]/$state_count["P1"], $state_count["P_14"]/$state_count["P1"]),
        array($state_count["P_21"]/$state_count["P2"] , $state_count["P_22"]/$state_count["P2"], $state_count["P_23"]/$state_count["P2"], $state_count["P_24"]/$state_count["P2"]),
        array($state_count["P_31"]/$state_count["P3"] , $state_count["P_32"]/$state_count["P3"], $state_count["P_33"]/$state_count["P3"], $state_count["P_34"]/$state_count["P3"]),
        array($state_count["P_41"]/$state_count["P4"] , $state_count["P_42"]/$state_count["P4"], $state_count["P_43"]/$state_count["P4"], $state_count["P_44"]/$state_count["P4"])

      );
    return $transition_matrix;
  }

  function matrix_mult_4_4($m1,$m2){
    for($row = 0; $row < 4; $row++){ 
      for($column = 0; $column < 4; $column++){  
         $sum = 0;
         for($ctr = 0; $ctr < 4; $ctr++){
           
          $sum = $sum + ($m1[$row][$ctr] * $m2[$ctr][$column]);          
         
         }
         $sol[$row][$column] = $sum;                          
      }                
    }
    return $sol;
  }

  function find_transition_probabilities($transition_matrix){
    $q[1] = $transition_matrix;
    for ($i=2; $i < 9; $i++) { 
      $q[$i] = matrix_mult_4_4($q[$i-1], $transition_matrix);
    }
    $probabilities = array($q[8][0][0], $q[8][0][1], $q[8][0][2], $q[8][0][3]);
    
    return $probabilities;
  }

  function find_probable_range($stock, $field, $range){
    $price = find_data_for_stock($stock, $field);
    $last_price = reset($price);
    for ($i=0; $i < 5; $i++) { 
      $probable_range[] = $last_price + $range[$i];
    }
    return $probable_range;
  }

  function predict_for_opening_price($stock){
    $bin = find_bin($stock,"open");

    $freq = find_freq($stock, "open", $bin);
    
    $cum_freq = find_cum_freq($freq);

    $range = find_quartile_range($bin, $freq, $cum_freq);

    $p_states = find_p_states($stock, "open", $range);

    $transition_states = find_transition_states($p_states);

    $state_count = find_state_count($p_states, $transition_states);

    $transition_matrix = create_transition_matrix($state_count);
    
    $probabilities = find_transition_probabilities($transition_matrix);
  
    $probable_range = find_probable_range($stock, "open", $range);

    for ($i=0; $i < 4 ; $i++) { 
      echo "<p>There is a " . $probabilities[$i]*100 . "% chance that the tommorrows opening price of {$stock} will lie from $" . $probable_range[$i] . " to $" . $probable_range[$i+1] . "</p>";
      echo "<br/>";
    }
  }

  function predict_for_closing_price($stock){
    $bin = find_bin($stock,"close");

    $freq = find_freq($stock, "close", $bin);
    
    $cum_freq = find_cum_freq($freq);

    $range = find_quartile_range($bin, $freq, $cum_freq);

    $p_states = find_p_states($stock, "close", $range);

    $transition_states = find_transition_states($p_states);

    $state_count = find_state_count($p_states, $transition_states);

    $transition_matrix = create_transition_matrix($state_count);
    
    $probabilities = find_transition_probabilities($transition_matrix);
  
    $probable_range = find_probable_range($stock, "close", $range);

    for ($i=0; $i < 4 ; $i++) { 
      echo "<p>There is a " . $probabilities[$i]*100 . "% chance that the tommorrows closing price of {$stock} will lie from $" . $probable_range[$i] . " to $" . $probable_range[$i+1] . "</p>";
      echo "<br/>";
    }
  }

  function fill_input($field){
    if (isset($_POST["$field"])) {
      echo "value=\"" . $_POST["$field"] . "\"";
    }
  }
  

  function form_errors($errors=array()) {
    $output = "";
    if(!empty($errors)){
      $output .= "<div class=\"alert alert-danger\">";
      $output .= "Please fix the following errors : - ";
      $output .= "<ul>";
      foreach ($errors as $key => $error) {
        $output .= "<li>" . htmlentities($error) . "</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
    }
    return $output;
  }
?>