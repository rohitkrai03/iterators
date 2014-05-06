<?php
//* presence
// use trim() so empty spaces don't count.
// use === to avoid false positives.
// empty() would consider "0" to be empty.

  $errors = array();

  function fieldname_as_text($fieldname){
  	$fieldname = str_replace("_", " ", $fieldname);
  	$fieldname = ucfirst($fieldname);
  	return $fieldname;
  }

  function has_presence($value){
  	return isset($value) && $value !== "";
  }

  function validate_presences($required_fields){
  	global $errors;
  	foreach ($required_fields as $field) {
  		$value = trim($_POST[$field]);
  		if(!has_presence($value)){
  			$errors[$field] = fieldname_as_text($field) . " can't be blank";
  		}
  	}
  }

  // *String length
  // max lentgh
  function has_max_length($value, $max){
  	return strlen($value) <= $max;
  }

  function validate_max_lengths($fields_with_max_lengths){
  	global $errors;
  	// Expects an assoc. array
  	foreach ($fields_with_max_lengths as $field => $max) {
  		$value = trim($_POST[$field]);
  		if (!has_max_length($value, $max)) {
  			$errors[$field] = fieldname_as_text($field) . " is too long.";
  		}
  	}
  }

  function validate_password($pass1, $pass2){
    global $errors;
    if ($pass1 === $pass2) {
        return $pass1;
      } else {
        $errors["password"] = "Passwords don't match. Please try again";
      }
  }

// Inclusion in a set.
  function has_inclusion_in($value, $set){
  	return in_array($value, $set);
  }

?>