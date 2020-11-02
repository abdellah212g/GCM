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
 * Autolader add
 *
 * @return void
 */
function autoload(){
    spl_autoload_register(function ($class) {
        include_once 'core/classes/' . $class . '.php';
    });
}

/**
 * Print warning
 *
 * @return void
 */
function warning($string)
{
    $warning = <<<EOT
    <div class="w3-panel w3-card w3-yellow w3-animate-top" style="float:left;width:100%;padding:auto;margin-top: 50px;">
        <p style="position:relative;text-align:center;">$string</p>
    </div>
    EOT;

    echo $warning;
}