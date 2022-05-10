<?php

// namespace aymeric;

function checkPassword($password) {
    echo '<h1 class="text-center">Aymeric</h1>';
    echo '<h5>Mot de passe : </h5>';
    echo '<h5 class=text-end>Force du mot de passe</h5>';
    
    $chiffre = preg_match ( '@[0-9]@', $password );
    $minuscule = preg_match ( '@[a-z]@', $password );
    $majuscule = preg_match ( '@[A-Z]@', $password );
    $special = preg_match ( '@[^\w]@', $password );
    $caractere = strlen($password) >= 12;

    
    if(empty($password == $chiffre xor $majuscule xor $minuscule xor $special)){
        //Si le password contient 1 condition validé
        echo '<div class="progress">
            <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" 
                role="progressbar" style="width: 20%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>';
    }        
    
    elseif($password == $chiffre and $minuscule xor  $chiffre and $majuscule xor $chiffre and $special xor $minuscule and $majuscule xor $minuscule and $special xor $majuscule and $special){
        //Si le password contient 2 conditions validé
        echo '<div class="progress">
            <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" 
                role="progressbar" style="width: 40%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>';
    }
    
    elseif($password == $majuscule && $minuscule && $chiffre or $majuscule && $minuscule && $special){
        //Si le password contient 3 conditions validé
        echo '<div class="progress">
        <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" 
        role="progressbar" style="width: 60%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>';
    }
    
    elseif($password == $majuscule && $minuscule && $chiffre && $special){
        //Si le password contient 4 conditions validé
        echo '<div class="progress">
        <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" 
        role="progressbar" style="width: 80%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>';
    }
    
    elseif(strlen($password) >= 12 && $password == $chiffre && $minuscule && $majuscule && $special){ 
        // Si le password contient 5 conditions validé alors boutton OK
        echo '<div class="progress">
        <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" 
        role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>';
    }
    
    else{
        // Si le password est vide
        echo '<div class="progress">
                <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" 
                role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>';
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
        echo '<h6 class="text-center btn btn-success position-absolute top-50 start-50 translate-middle py-2 px-3">OK</h6>';
    }    
}