<?php
    interface Utilisateur{
        public const ABONNEMENT = 15;
        public function getNom();
        public function setPrixAbo();
        public function getPrixAbo();
    }


    class Abonne implements Utilisateur{
        protected $user_name;
        protected $user_region;
        protected $prix_abo;
        protected $user_pass;
        
        public function __construct($n, $p, $r){
            $this->user_name = $n;
            $this->user_pass = $p;
            $this->user_region = $r;
        }
        
        public function getNom(){
            echo $this->user_name;
        }

        public function getPrixAbo(){
            echo $this->prix_abo;
        }
        
        public function setPrixAbo(){
            if($this->user_region === 'Sud'){
                return $this->prix_abo = Utilisateur::ABONNEMENT / 2;
            }else{
                return $this->prix_abo = Utilisateur::ABONNEMENT;
            }
        }
    }


    
    class Admin implements Utilisateur{
        protected $user_name;
        protected $user_region;
        protected $prix_abo;
        protected $user_pass;
        protected static $ban;
        
        public function __construct($n, $p, $r){
            $this->user_name = strtoupper($n);
            $this->user_pass = $p;
            $this->user_region = $r;
        }
        
        public function getNom(){
            echo $this->user_name;
        }

        public function getPrixAbo(){
            echo $this->prix_abo;
        }
        
        public function setBan(...$b){
            foreach($b as $banned){
                self::$ban[] .= $banned;
            }
        }
        public function getBan(){
            echo 'Utilisateurs bannis : ';
            foreach(self::$ban as $valeur){
                echo $valeur .', ';
            }
        }
        
        public function setPrixAbo(){
            if($this->user_region === 'Sud'){
                return $this->prix_abo = Utilisateur::ABONNEMENT / 6;
            }else{
                return $this->prix_abo = Utilisateur::ABONNEMENT / 3;
            }
        }
    }



    


