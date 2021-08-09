<?php
namespace Calendar;

class Events
{
    private $pdo;
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getEventBetween(\DateTime $start, \DateTime $end,string $user):array
    {
        $sql = "SELECT * FROM rendez_vous WHERE pseudo_mentor = '$user' AND debut BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";
        $statement = $this->pdo->query($sql);
        $results = $statement->fetchAll();
        return $results;
    }

    
    public function geteventbetweenbyday(\DateTime $start, \DateTime $end,$user): array
    {
        $events = $this->getEventBetween($start, $end,$user);
        $jours = [];

        foreach ($events as $event) {
            $date = explode(' ', $event['debut'])[0];
            if (!isset($jours[$date])) {
                $jours[$date] = [$event];
            } else {
                $jours[$date][] = $event;
            }
        }
        return $jours;
    }

    public function find(int $id):\Calendar\Event
    {
        require 'event.php';
       $statement = $this->pdo->query("select * from rendez_vous where id = $id LIMIT 1");
       $statement->setFetchMode(\PDO::FETCH_CLASS,Event::class);
       $resultat = $statement->fetch();
        if($resultat === false){
            throw new \Exception('Aucun resultat n\'a ete trouve');
        }
        return $resultat;
    }


}
