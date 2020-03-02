<?php

function validateInput($str)
{
    return stripslashes(htmlspecialchars(trim($str)));
}

function comparePwd($pwd1, $pwd2)
{
    if ($pwd1 === $pwd2) {
        return true;
    }

    return false;
}
