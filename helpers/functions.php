<?php 

/**
 * Securisation d'une chaine de caractere
 * @param [type] $string
 * @return string
 */

function str_secur($string){
    return trim(htmlspecialchars($string));
}

/**
 * formated debug
 *
 * @param [type] $var
 * @return void
 */
function debug($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


/**
 *  function formattage de la date
 *
 * @param  $date
 * @return date 
 */
function formatDate($date)
{
    $date = date("F j, Y, g:i a", strtotime($date));
    return $date;
}

/**
 * Print warning
 *
 * @return void
 */
function alert($string, $color = 'light-grey', $top = 0)
{
    $message = <<<EOT
        <div class="w3-panel w3-card w3-$color w3-animate-top" style="position:absolute;width:100%;padding:auto;margin-top: $top;">
            <p style="text-align:center;">$string</p>
        </div>
    EOT;

    echo $message;
}
