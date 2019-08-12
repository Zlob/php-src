--TEST--
Bug #61780 (Inconsistent PCRE captures in match results): named subpatterns
--FILE--
<?php
preg_match('/(?<a>4)?(?<b>2)?\d/', '23456', $matches, PREG_UNMATCHED_AS_NULL);
var_export($matches);
echo "\n\n";
preg_match('/(?<a>4)?(?<b>2)?\d/', '23456', $matches, PREG_OFFSET_CAPTURE | PREG_UNMATCHED_AS_NULL);
var_export($matches);
echo "\n\n";
preg_match_all('/(?<a>4)?(?<b>2)?\d/', '123456', $matches, PREG_UNMATCHED_AS_NULL);
var_export($matches);
echo "\n\n";
preg_match_all('/(?<a>4)?(?<b>2)?\d/', '123456', $matches, PREG_OFFSET_CAPTURE | PREG_UNMATCHED_AS_NULL);
var_export($matches);
echo "\n\n";
preg_match_all('/(?<a>4)?(?<b>2)?\d/', '123456', $matches, PREG_SET_ORDER | PREG_UNMATCHED_AS_NULL);
var_export($matches);
echo "\n\n";
preg_match_all('/(?<a>4)?(?<b>2)?\d/', '123456', $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE | PREG_UNMATCHED_AS_NULL);
var_export($matches);
?>
--EXPECT--
[
  0 => '23',
  'a' => NULL,
  1 => NULL,
  'b' => '2',
  2 => '2',
]

[
  0 => 
  [
    0 => '23',
    1 => 0,
  ],
  'a' => 
  [
    0 => NULL,
    1 => -1,
  ],
  1 => 
  [
    0 => NULL,
    1 => -1,
  ],
  'b' => 
  [
    0 => '2',
    1 => 0,
  ],
  2 => 
  [
    0 => '2',
    1 => 0,
  ],
]

[
  0 => 
  [
    0 => '1',
    1 => '23',
    2 => '45',
    3 => '6',
  ],
  'a' => 
  [
    0 => NULL,
    1 => NULL,
    2 => '4',
    3 => NULL,
  ],
  1 => 
  [
    0 => NULL,
    1 => NULL,
    2 => '4',
    3 => NULL,
  ],
  'b' => 
  [
    0 => NULL,
    1 => '2',
    2 => NULL,
    3 => NULL,
  ],
  2 => 
  [
    0 => NULL,
    1 => '2',
    2 => NULL,
    3 => NULL,
  ],
]

[
  0 => 
  [
    0 => 
    [
      0 => '1',
      1 => 0,
    ],
    1 => 
    [
      0 => '23',
      1 => 1,
    ],
    2 => 
    [
      0 => '45',
      1 => 3,
    ],
    3 => 
    [
      0 => '6',
      1 => 5,
    ],
  ],
  'a' => 
  [
    0 => 
    [
      0 => NULL,
      1 => -1,
    ],
    1 => 
    [
      0 => NULL,
      1 => -1,
    ],
    2 => 
    [
      0 => '4',
      1 => 3,
    ],
    3 => 
    [
      0 => NULL,
      1 => -1,
    ],
  ],
  1 => 
  [
    0 => 
    [
      0 => NULL,
      1 => -1,
    ],
    1 => 
    [
      0 => NULL,
      1 => -1,
    ],
    2 => 
    [
      0 => '4',
      1 => 3,
    ],
    3 => 
    [
      0 => NULL,
      1 => -1,
    ],
  ],
  'b' => 
  [
    0 => 
    [
      0 => NULL,
      1 => -1,
    ],
    1 => 
    [
      0 => '2',
      1 => 1,
    ],
    2 => 
    [
      0 => NULL,
      1 => -1,
    ],
    3 => 
    [
      0 => NULL,
      1 => -1,
    ],
  ],
  2 => 
  [
    0 => 
    [
      0 => NULL,
      1 => -1,
    ],
    1 => 
    [
      0 => '2',
      1 => 1,
    ],
    2 => 
    [
      0 => NULL,
      1 => -1,
    ],
    3 => 
    [
      0 => NULL,
      1 => -1,
    ],
  ],
]

[
  0 => 
  [
    0 => '1',
    'a' => NULL,
    1 => NULL,
    'b' => NULL,
    2 => NULL,
  ],
  1 => 
  [
    0 => '23',
    'a' => NULL,
    1 => NULL,
    'b' => '2',
    2 => '2',
  ],
  2 => 
  [
    0 => '45',
    'a' => '4',
    1 => '4',
    'b' => NULL,
    2 => NULL,
  ],
  3 => 
  [
    0 => '6',
    'a' => NULL,
    1 => NULL,
    'b' => NULL,
    2 => NULL,
  ],
]

[
  0 => 
  [
    0 => 
    [
      0 => '1',
      1 => 0,
    ],
    'a' => 
    [
      0 => NULL,
      1 => -1,
    ],
    1 => 
    [
      0 => NULL,
      1 => -1,
    ],
    'b' => 
    [
      0 => NULL,
      1 => -1,
    ],
    2 => 
    [
      0 => NULL,
      1 => -1,
    ],
  ],
  1 => 
  [
    0 => 
    [
      0 => '23',
      1 => 1,
    ],
    'a' => 
    [
      0 => NULL,
      1 => -1,
    ],
    1 => 
    [
      0 => NULL,
      1 => -1,
    ],
    'b' => 
    [
      0 => '2',
      1 => 1,
    ],
    2 => 
    [
      0 => '2',
      1 => 1,
    ],
  ],
  2 => 
  [
    0 => 
    [
      0 => '45',
      1 => 3,
    ],
    'a' => 
    [
      0 => '4',
      1 => 3,
    ],
    1 => 
    [
      0 => '4',
      1 => 3,
    ],
    'b' => 
    [
      0 => NULL,
      1 => -1,
    ],
    2 => 
    [
      0 => NULL,
      1 => -1,
    ],
  ],
  3 => 
  [
    0 => 
    [
      0 => '6',
      1 => 5,
    ],
    'a' => 
    [
      0 => NULL,
      1 => -1,
    ],
    1 => 
    [
      0 => NULL,
      1 => -1,
    ],
    'b' => 
    [
      0 => NULL,
      1 => -1,
    ],
    2 => 
    [
      0 => NULL,
      1 => -1,
    ],
  ],
]
