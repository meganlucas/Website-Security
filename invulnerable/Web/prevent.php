<?php# function to parse XSS attacks
function checkScript($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
