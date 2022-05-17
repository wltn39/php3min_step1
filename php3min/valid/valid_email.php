<?php
$emails = array(
    'aaa@bbb.com',
    'abc',
    '.com',
    '@.com'
);

foreach ($emails as $email) {
    echo "$email : ";
    var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
    echo "<br />";
}