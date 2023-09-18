<?php
function currency_format($value, $use_symbol = true)
{
    return ($use_symbol ? 'Rp. ' : '') . number_format(intval($value), 0, ',', '.');
}

function deformat_currency($value)
{
    return str_replace('Rp', '', str_replace('.', '', $value));
}
?>
