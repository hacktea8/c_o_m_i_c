<?php

$f='common.js';
$t= file_get_contents($f);
$t=iconv('GBK','UTF-8',$t);
file_put_contents($f,$t);
