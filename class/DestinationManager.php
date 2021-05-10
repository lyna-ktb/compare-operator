<?php


class DestinationManager
{

    private $db; // Instance de PDO

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function add(Destinations $destination, Tour_operators $tour_operator)
    {
        $q = $this->db->prepare('INSERT INTO destinations (location, price,id_tour_operator,img,descri) VALUES(:location, :price,:id_tour_operator,:img,:descri)');

        $q->bindValue(':location', $destination->getLocation());
        $q->bindValue(':price', $destination->getPrice());
        $q->bindValue(':id_tour_operator', $tour_operator->getId());
        $q->bindValue(':img', $destination->getImg());
        $q->bindValue(':descri', $destination->getDescri());

        $q->execute();

        $destination->hydrate([
            'id' => $this->db->lastInsertId()
        ]);
    }



    public function getList()
    {
        $destinations = [];

        $q = $this->db->prepare('SELECT destinations.* FROM `destinations`');
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {

            array_push($destinations,new Destinations($donnees));

        }

        return $destinations;
    }

    public function getOneByLoc(Destinations $destinations){
        $q = $this->db->prepare('SELECT * FROM destinations WHERE location = :location');

        $q->bindValue(':location', $destinations->getLocation());
        $q->execute();
        $arrayDest = $q->fetch(PDO::FETCH_ASSOC);
        $destinations->hydrate($arrayDest);
    }


    public function getDestinationByLocation($location){

        $destinationCollection = [];

        $q = $this->db->prepare('SELECT * FROM destinations WHERE location=?');


        $q->execute([$location]);
        $destinations = $q->fetchAll(PDO::FETCH_ASSOC);
        foreach ($destinations as $destinationArray) {
            array_push($destinationCollection, new Destinations($destinationArray));
        }
        return $destinationCollection;
    }

    public function getDestibyTo(Destinations $destination){

        $q = $this->db->prepare('SELECT * FROM tour_operators WHERE id=?');

        $q->execute([$destination->getIdTourOperator()]);
        $To = $q->fetch(PDO::FETCH_ASSOC);
        $test = new Tour_operators($To);

        return $test;
    }

    public function getDestinationByTo(Tour_operators $tour_operator){

        $q = $this->db->prepare('SELECT destinations.* FROM `destinations` WHERE id_tour_operator = ?');

        $destinations=[];
        $q->execute([intval($tour_operator->getId())]);
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {

            array_push($destinations,new Destinations($donnees));

        }

        return $destinations;
    }

    public function getListGroupByName(){
        $q = $this->db->prepare('SELECT location, img,`descri`  FROM `destinations` GROUP BY location,img,`descri`');

        $destinations=[];
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {

            array_push($destinations,new Destinations($donnees));

        }

        return $destinations;
    }

}