<?php


class Tour_operatorsManager
{
    private $db; // Instance de PDO

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function add(Tour_operators $tour_operator)
    {
        $q = $this->db->prepare('INSERT INTO tour_operators (name,link,is_premium,logo) VALUES(:name,:link,:is_premium,:logo)');

        $q->bindValue(':name', $tour_operator->getName());
        $q->bindValue(':link', $tour_operator->getLink());
        $q->bindValue(':is_premium', intval($tour_operator->isIsPremium()));
        $q->bindValue(':logo',$tour_operator->getLogo());

        $q->execute();

        $tour_operator->hydrate([
            'id' => $this->db->lastInsertId()
        ]);
    }

    public function getList()
    {
        $tourop = [];

        $q = $this->db->prepare('SELECT tour_operators.* FROM `tour_operators`');
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {

            array_push($tourop,new Tour_operators($donnees));

        }

        return $tourop;
    }

    public function getOnBy(Tour_operators $tour_operators){

        $q = $this->db->prepare('SELECT * FROM tour_operators WHERE name = :name');

        $q->bindValue(':name', $tour_operators->getName());
        $q->execute();
        $arrayTour = $q->fetch(PDO::FETCH_ASSOC);
        $tour_operators->hydrate($arrayTour);
    }

    public function getOnById(Tour_operators $tour_operators){

        $q = $this->db->prepare('SELECT * FROM tour_operators WHERE id = :id');

        $q->bindValue(':id', $tour_operators->getId());
        $q->execute();
        $arrayTour = $q->fetch(PDO::FETCH_ASSOC);
        $tour_operators->hydrate($arrayTour);
    }

    public function getMoyenne (Tour_operators $tour_operator){
        $q = $this->db->prepare('SELECT AVG (note) FROM reviews WHERE id_tour_operator =?');
        $q->execute([intval($tour_operator->getId())]);
        $moyenne = $q->fetch(PDO::FETCH_BOTH);

        return $moyenne[0];
    }

    public function addGrade(Tour_operators $tour_operator){
        $q = $this->db->prepare('UPDATE tour_operators SET grade = :grade WHERE id = :id');

        $q->bindValue(':grade', $this->getMoyenne($tour_operator));
        $q->bindValue(':id', ($tour_operator->getId()));
        $q->execute();

        $tour_operator->hydrate([
            'grade'=>$this->getMoyenne($tour_operator)
        ]);
    }



    public function getBestTo()
    {
        $bestTo = [];

        $q = $this->db->prepare('SELECT * FROM tour_operators ORDER BY grade DESC LIMIT 3');
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {

            array_push($bestTo,new Tour_operators($donnees));

        }

        return $bestTo;
    }

    public function getBestPrice(Tour_operators $tour_operator):Destinations
    {


        $q = $this->db->prepare('SELECT * FROM destinations WHERE id_tour_operator = :id ORDER BY price ASC LIMIT 1');
        $q->bindValue(':id', intval($tour_operator->getId()));
        $q->execute();
         $donnees = $q->fetch(PDO::FETCH_ASSOC);
           return  new Destinations($donnees);
    }
}