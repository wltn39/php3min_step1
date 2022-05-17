<?php

function sanitize_email($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL )){
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    return false;
}

$emails = array(
    'aaa@bbb.com',
    'abc',
    '.com',
    '@.com',
    'aaa@bbb.com ds'
);

foreach ($emails as $email) {
    echo "$email : ";
    var_dump(sanitize_email($email));
    echo "<br />";
}