<?php
require_once('barcode.inc.php'); 
$code_number = '123456';
#new barCodeGenrator($code_number,0,'hello.gif'); 
new barCodeGenrator($code_number,0,'hello.gif', 190, 130, true);
?> 