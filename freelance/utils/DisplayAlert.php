<?php

namespace app\utils;

class DisplayAlert
{

    public static function displayAlert($alert)
    {
        if ($alert != null) {
            echo '<div class="alert">';
            echo '<span class="alert-closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
            echo $alert;
            echo '</div>';
        }
    }

    public static function displayError($error)
    {
        echo "<div class='alert danger'>
                <span class='alert-closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                $error
            </div>";
    }
}