<?php
    function currency_format($value, $use_symbol = true){
        return ($use_symbol ? 'Rp. ' : '') . number_format($value, 0, ',', '.');
    }
?>