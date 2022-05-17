<?php
function string_split($input, $seperater)
{
    return explode($seperater, $input);
}

var_dump(string_split("a,b,c,d,ef,ghi,j", ","));
exit();