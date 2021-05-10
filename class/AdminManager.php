<?php


class adminManager
{
    private $db; // Instance de PDO

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add(Admin $admin)
    {
        $q = $this->db->prepare('INSERT INTO admin (pseudo,pass) VALUES(:pseudo,:pass)');

        $q->bindValue(':pseudo', $admin->getPseudo());
        $q->bindValue(':pass', $admin->getPass());


        $q->execute();

        $admin->hydrate([
            'id' => $this->db->lastInsertId()
        ]);
    }
    public function get(Admin $admin)
    {
        $q = $this->db->prepare('SELECT * FROM admin WHERE pseudo = :pseudo AND pass = :pass');

        $q->bindValue(':pseudo', $admin->getPseudo());
        $q->bindValue(':pass', $admin->getPass());


        $q->execute();
        $result = $q->fetch(PDO::FETCH_ASSOC);
        if ($result){
            $admin->hydrate([
                'id' => $result['id']
            ]);
        }else{
            throw new Exception('erreur connection');
        }

    }

}