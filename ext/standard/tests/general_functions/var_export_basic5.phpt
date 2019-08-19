--TEST--
Test var_export() function with valid arrays
--INI--
serialize_precision=17
--FILE--
<?php
/* Prototype  : mixed var_export(mixed var [, bool return])
 * Description: Outputs or returns a string representation of a variable
 * Source code: ext/standard/var.c
 * Alias to functions:
 */


echo "*** Testing var_export() with valid arrays ***\n";
// different valid  arrays
$valid_arrays = array(
           "array()" => array(),
           "array(NULL)" => array(NULL),
           "array(null)" => array(null),
           "array(true)" => array(true),
           "array(\"\")" => array(""),
           "array('')" => array(''),
           "array(array(), array())" => array(array(), array()),
           "array(array(1, 2), array('a', 'b'))" => array(array(1, 2), array('a', 'b')),
           "array(1 => 'One')" => array(1 => 'One'),
           "array(\"test\" => \"is_array\")" => array("test" => "is_array"),
           "array(0)" => array(0),
           "array(-1)" => array(-1),
           "array(10.5, 5.6)" => array(10.5, 5.6),
           "array(\"string\", \"test\")" => array("string", "test"),
           "array('string', 'test')" => array('string', 'test')
);

/* Loop to check for above arrays with var_export() */
echo "\n*** Output for arrays ***\n";
foreach($valid_arrays as $key => $arr) {
	echo "\n--Iteration: $key --\n";
	var_export( $arr );
	echo "\n";
	var_export( $arr, FALSE);
	echo "\n";
	var_dump( var_export( $arr, TRUE) );
	echo "\n";
}
?>
===DONE===
--EXPECT--
*** Testing var_export() with valid arrays ***

*** Output for arrays ***

--Iteration: array() --
[
]
[
]
string(3) "[
]"


--Iteration: array(NULL) --
[
  0 => NULL,
]
[
  0 => NULL,
]
string(16) "[
  0 => NULL,
]"


--Iteration: array(null) --
[
  0 => NULL,
]
[
  0 => NULL,
]
string(16) "[
  0 => NULL,
]"


--Iteration: array(true) --
[
  0 => true,
]
[
  0 => true,
]
string(16) "[
  0 => true,
]"


--Iteration: array("") --
[
  0 => '',
]
[
  0 => '',
]
string(14) "[
  0 => '',
]"


--Iteration: array('') --
[
  0 => '',
]
[
  0 => '',
]
string(14) "[
  0 => '',
]"


--Iteration: array(array(), array()) --
[
  0 => 
  [
  ],
  1 => 
  [
  ],
]
[
  0 => 
  [
  ],
  1 => 
  [
  ],
]
string(37) "[
  0 => 
  [
  ],
  1 => 
  [
  ],
]"


--Iteration: array(array(1, 2), array('a', 'b')) --
[
  0 => 
  [
    0 => 1,
    1 => 2,
  ],
  1 => 
  [
    0 => 'a',
    1 => 'b',
  ],
]
[
  0 => 
  [
    0 => 1,
    1 => 2,
  ],
  1 => 
  [
    0 => 'a',
    1 => 'b',
  ],
]
string(89) "[
  0 => 
  [
    0 => 1,
    1 => 2,
  ],
  1 => 
  [
    0 => 'a',
    1 => 'b',
  ],
]"


--Iteration: array(1 => 'One') --
[
  1 => 'One',
]
[
  1 => 'One',
]
string(17) "[
  1 => 'One',
]"


--Iteration: array("test" => "is_array") --
[
  'test' => 'is_array',
]
[
  'test' => 'is_array',
]
string(27) "[
  'test' => 'is_array',
]"


--Iteration: array(0) --
[
  0 => 0,
]
[
  0 => 0,
]
string(13) "[
  0 => 0,
]"


--Iteration: array(-1) --
[
  0 => -1,
]
[
  0 => -1,
]
string(14) "[
  0 => -1,
]"


--Iteration: array(10.5, 5.6) --
[
  0 => 10.5,
  1 => 5.5999999999999996,
]
[
  0 => 10.5,
  1 => 5.5999999999999996,
]
string(43) "[
  0 => 10.5,
  1 => 5.5999999999999996,
]"


--Iteration: array("string", "test") --
[
  0 => 'string',
  1 => 'test',
]
[
  0 => 'string',
  1 => 'test',
]
string(35) "[
  0 => 'string',
  1 => 'test',
]"


--Iteration: array('string', 'test') --
[
  0 => 'string',
  1 => 'test',
]
[
  0 => 'string',
  1 => 'test',
]
string(35) "[
  0 => 'string',
  1 => 'test',
]"

===DONE===
