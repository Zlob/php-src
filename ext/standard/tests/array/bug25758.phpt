--TEST--
Bug #25758 (var_export does not escape ' & \ inside array keys)
--FILE--
<?php
	$a = array ("quote'" => array("quote'"));
	echo var_export($a, true);
?>
--EXPECT--
[
  'quote\'' => 
  [
    0 => 'quote\'',
  ],
]
