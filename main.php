<?php

//inclusion de la classe Game.php
require_once 'Game.php';

// VARIABLES
$toggle = true;
$i = 0;


while(true)
{
    $u_input = readline("Choissisez un pseudo :");
    if(strlen($u_input) > 20)
    {
        echo "Whoa, c'est un énorme pseudo que tu nous as choisis là....Choisis en un plus petit";
        continue;
    }
    else break;
}


$game = new Game($u_input);
echo $game->splashScreen();


// BOUCLE PRINCIPALE
while($toggle)
{
    //affichage du menu
    $choice = $game->menu();

    switch ($choice)
    {

        case 1: // jouer
            while(true)
            {
                echo " Voici toutes les attaques dont tu dispose ! \n";

                //affichages des attaques dispo
                foreach ($game->getAttack() as $attack)
                {
                    echo "($i) - ". $attack . " / ";
                    $i++;
                }

                //reset du compteur
                $i = 0;


                //lecture de la réponse de l'utilisateur
                $input = readline("\nChoisissez un numéro >");

                //l'ia choisit son attaque
                $ia = $game->getRandomItem();


                //verification des attaque
                if($game->verif($game->getAttack()[$input],$ia))
                {
                    echo "Tu gagne ce round ! Bravo :)\n\n";
                    $game->upScorePlayer();
                }
                else
                {
                    echo "Tu perd ce round ! Nul :(\n\n";
                    $game->upScoreIA();
                }

                // si la partie est finie alors on reviens au début( menu)
                if ($game->isDone())
                {
                    echo "Le vainqueur est " . $game->getWinner();
                    break;
                }//sinon on va au prochain round
                else
                {
                    $game->nextRound();
                    continue;
                }

            }
            break;
        case 2: // règles
            echo $game->getRules();
            break;
        case 3: // quitter
            echo "Choo l'ami ;)";
            $toggle = false;
    }
}






