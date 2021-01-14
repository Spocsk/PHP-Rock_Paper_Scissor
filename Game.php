<?php


class Game
{

    private $name;

    private $rules;

    private $rounds = 5;

    private $scoreUser = 0;
    private $scoreIA = 0;

    private $item = ["Pierre","Feuille","Sciseau","Lézard","Spocsk"];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function menu()
    {
        echo "Menu:
        1 - Jouer
        2 - Régles
        3 - Quitter";

        $input = readline("\nChoisissez un numéro >");

        return $input;
    }

    public function clear()
    {
        system('cls');
    }

    public function splashScreen()
    {
        return "
  ____            _        ____                              
 |  _ \ ___   ___| | __   |  _ \ __ _ _ __   ___ _ __        
 | |_) / _ \ / __| |/ /   | |_) / _` | '_ \ / _ \ '__|       
 |  _ < (_) | (__|   < _  |  __/ (_| | |_) |  __/ |_         
 |_|_\_\___/ \___|_|\_( ) |_|   \__,_| .__/ \___|_( )        
 / ___|  ___(_)___ ___|/___  _ __    |_|          |/         
 \___ \ / __| / __/ __|/ _ \| '__|                           
  ___) | (__| \__ \__ \ (_) | |_                             
 |____/ \___|_|___/___/\___/|_( )____                   _    
 | |   (_)______ _ _ __ __| | |// ___| _ __   ___   ___| | __
 | |   | |_  / _` | '__/ _` |   \___ \| '_ \ / _ \ / __| |/ /
 | |___| |/ / (_| | | | (_| |_   ___) | |_) | (_) | (__|   < 
 |_____|_/___\__,_|_|  \__,_( ) |____/| .__/ \___/ \___|_|\_\
                            |/        |_|                    

            Dev : COUTO DE OLIVEIRA Dylan
            Date: 14/01/2021
            For: NWS
";
    }

    public function getRules()
    {
        return "Les ciseaux coupent le papier,
le papier bat la pierre,
la pierre écrase le lézard,
le lézard empoisonne Spock.
Spock écrabouille les ciseaux,
les ciseaux décapitent le lézard,
le lézard mange le papier,
le papier repousse Spock,
Spock détruit la pierre.
La pierre bat les ciseaux";
    }

    public function getAttack()
    {
        return $this->item;
    }

    public function getName()
    {
        return $this->name;
    }

    public function upScoreIA()
    {
        $this->scoreIA += 1;
    }

    public function upScorePlayer()
    {
        $this->scoreUser += 1;
    }

    public function getScore()
    {
        return $this->name . " à " . $this->scoreUser . "\n" . "IA à " . $this->scoreIA;
    }

    public function getRandomItem()
    {
        return array_rand($this->item, 1);
    }

    public function getWinner()
    {

        if ($this->scoreUser > $this->scoreIA)
        {
            return $this->name . " avec " . $this->scoreUser . " point.";
        }
        else
        {
            return "l'IA" . " avec " . $this->scoreIA . " point.";
        }

    }

    public function isDone(): bool
    {
        if ( $this->rounds > 0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }

    public function nextRound()
    {
        $this->rounds -= 1;
    }

    public function verif($a, $b)
    {
        if($a == "Pierre" && $b == "Lézard" || $b == "Ciseaux") return true;

        else if($a == "Ciseau" && $b == "Papier" || $b == "Lézard") return true;

        else if($a == "Papier" && $b == "Spock" || $b == "Pierre") return true;

        else if($a == "Lézard" && $b == "Papier" || $b == "Spock") return true;

        else if($a == "Spock" && $b == "Pierre" || $b == "Ciseau") return true;

        else return false;

    }

}

//la pierre écrase le lézard
//La pierre bat les ciseaux

//Les ciseaux coupent le papier
//les ciseaux décapitent le lézard

//le papier repousse Spock
//le papier bat la pierre

//le lézard mange le papier
//le lézard empoisonne Spock

//Spock détruit la pierre
//Spock écrabouille les ciseaux
