
<?php
/**
 * In this case, we want to increase the default cost for BCRYPT to 12.
 * Note that we also switched to BCRYPT, which will always be 60 characters.
 */
$options = [
    'cost' => 12,
];

$hash = password_hash("AzertyTest01@", PASSWORD_BCRYPT, $options);
echo $hash;

if (password_verify('AzertyTest01@', $hash)) {

    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}


?>
