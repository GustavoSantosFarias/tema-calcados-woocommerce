<?php
// Template name: Test

use Divalesi\Promotions;
use Divalesi\Promotions\ParseCsv;

//error_reporting(E_ALL ^ E_NOTICE);

$promotionCsv = new ParseCsv("https://docs.google.com/spreadsheets/d/e/2PACX-1vSSZYAQnRQ97mqx2mX8sTYwAKStcLUhFnTdRNLbwOqopp8Brl6D_HYfkvmQ_m3iGZ2LcVtVjmSNT_bB/pub?gid=0&single=true&output=csv");

echo "<pre>";
print_r($promotionCsv->data());

//$promotion = new Promotions($promotionCsv);

//$promotion->run();