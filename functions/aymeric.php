<?php

namespace aymeric;

function checkPassword($password) {
    echo '<h1 class="text-center">Aymeric</h1>';
    echo "<h5>Mot de passe : $password </h5>";
    echo '<h5 class=text-end>Force du mot de passe</h5>';
    
    $chiffre = preg_match ( '@[0-9]@', $password );
    $minuscule = preg_match ( '@[a-z]@', $password );
    $majuscule = preg_match ( '@[A-Z]@', $password );
    $special = preg_match ( '@[-&=(_)+$^ù*:!;,?]@', $password );
    $caractere = strlen($password) >= 12;
    $table = array(
        "chiffre" => $chiffre,
        "minuscule" => $minuscule,
        "majuscule" => $majuscule,
        "special" => $special,
        "caractere" => $caractere,
    );

    $all = array_filter($table);

    if ($table){
        if (count($all) == 1){
            echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 20%" aria valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>';

        }   

        elseif (count($all) == 2){
            echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 40%" aria valuenow="40" aria-valuemin="0" aria-valuemax="100"></div></div>';

        }

        elseif (count($all) == 3){
            echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 60%" aria valuenow="60" aria-valuemin="0" aria-valuemax="100"></div></div>';

        }

        elseif (count($all) == 4){
            echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%" aria valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>';

        }

        elseif (count($all) == 5){
            echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>';

        }
    
        elseif (count($all) == 0){
            echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>';

        } 
    }
    if(!$chiffre || !$minuscule || !$majuscule || !$special || !$caractere ) {
            
        if($chiffre || $minuscule || $majuscule || $special || !$caractere ) {
            echo '<ul class="list-group position-absolute top-50 start-50 translate-middle w-15">
                <li class="list-group-item active" aria-current="true">Le mot de passe doit contenir au moins:</li>';
        }
        
        if( !$chiffre ) {
            echo '<li class="list-group-item">1 chiffre</li>';
        }

        if( !$minuscule ) {
            echo '<li class="list-group-item">1 minuscule</li>';
        }

        if( !$majuscule ) {
            echo '<li class="list-group-item">1 majuscule</li>';
        }

        if( !$special ) {
            echo '<li class="list-group-item">1 caractère spécial</li>';
        }

        if( !$caractere ) {
            echo '<li class="list-group-item">12 caractères</li>';
        }
        echo '</ul>';
    } 

    else {
        echo '<a href="index.php" class="text-center btn btn-success position-absolute top-50 start-50 translate-middle py-2 px-3">OK</a>';
    }    
}