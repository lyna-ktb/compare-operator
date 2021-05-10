<?php


class ReviewManager
{

    private $db; // Instance de PDO

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function add(Reviews $review,Tour_operators $tour_operator)
    {
        $q = $this->db->prepare('INSERT INTO reviews (message, author,id_tour_operator, note) VALUES(:message, :author,:id_tour_operator,:note)');

        $q->bindValue(':message', $review->getMessage());
        $q->bindValue(':author', $review->getAuthor());
        $q->bindValue(':id_tour_operator', $tour_operator->getId());
        $q->bindValue(':note', $review->getNote());

        $q->execute();

        $review->hydrate([
            'id' => $this->db->lastInsertId()
        ]);
    }

    public function getList(Tour_operators $tour_operator)
    {
        $reviews = [];

        $q = $this->db->prepare('SELECT reviews.* FROM `reviews` JOIN tour_operators ON reviews.id_tour_operator = tour_operators.id WHERE tour_operators.id = ?');
        $q->execute([intval($tour_operator->getId())]);
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {

            array_push($reviews,new Reviews($donnees));

        }
        return $reviews;
    }




}