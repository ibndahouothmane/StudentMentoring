<?php 

namespace Calendar;


class Event
{

    private $id;
    private $titre;
    private $pseudo_etudiant;
    private $pseudo_mentor;
    private $message;
    private $debut;
    private $fin;




    public function gettitre(): string
    {
        return $this->titre;
    }
 
    public function getid(): int
    {
        return $this->id;
    }
    public function getuser_etudiant(): string
    {
        return $this->pseudo_etudiant;
    }

    public function getuser_mentor(): string
    {
        return $this->pseudo_mentor;
    }

    public function getmessage(): string
    {
        return $this->message;
    }
    public function getdebut(): \DateTime
    {
        return new \DateTime($this->debut);
    }
    public function getfin(): \DateTime
    {
        return new \DateTime($this->fin);
    }
}





?>