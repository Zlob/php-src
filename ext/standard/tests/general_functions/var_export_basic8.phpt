--TEST--
var_export(): simple test with arrays and objects
--FILE--
<?php
/* Prototype  : mixed var_export(mixed var [, bool return])
 * Description: Outputs or returns a string representation of a variable
 * Source code: ext/standard/var.c
 * Alias to functions:
 */

echo "\n\n-- Var export on a simple  object --\n";
$o1 = new stdclass;
$o1->p = '22';
$o2 = new stdclass;
$o2->a = 1;
$o2->b = array('k'=>2);
$o2->x = $o1;
var_export($o2);

echo "\n\n-- Var export on an simple array --\n";
$a = array(1,2,3,4);
var_export($a);

echo "\n\n-- Var export on an nested array --\n";
$a = array('one' => 'first');
$b = array('foo' => $a, 'bar' => $o2);
var_export($b);

?>
===DONE===
--EXPECT--
-- Var export on a simple  object --
(object) [
   'a' => 1,
   'b' => 
  [
    'k' => 2,
  ],
   'x' => 
  (object) [
     'p' => '22',
  ],
]

-- Var export on an simple array --
[
  0 => 1,
  1 => 2,
  2 => 3,
  3 => 4,
]

-- Var export on an nested array --
[
  'foo' => 
  [
    'one' => 'first',
  ],
  'bar' => 
  (object) [
     'a' => 1,
     'b' => 
    [
      'k' => 2,
    ],
     'x' => 
    (object) [
       'p' => '22',
    ],
  ],
]===DONE===
