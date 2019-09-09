<?php
// Template name: Test

use Divalesi\Promotions\Loop;
use Divalesi\Promotions\Args;
use Divalesi\Promotions\Simple;
use Divalesi\Promotions\ParseCsv;

$csv_path = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSSZYAQnRQ97mqx2mX8sTYwAKStcLUhFnTdRNLbwOqopp8Brl6D_HYfkvmQ_m3iGZ2LcVtVjmSNT_bB/pub?gid=0&single=true&output=csv";

$csv = new ParseCsv($csv_path);

foreach ($csv->data() as $discount_value => $rule) {
    $args = new Args($rule);
    $discount = new Simple($discount_value,$rule["type"][0]);
    $promotion = new Loop($args,$discount);

    $promotion->run();
}