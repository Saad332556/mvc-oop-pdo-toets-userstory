<?php

/**
 * Dit is de model voor de controller Mangekenten
 */

class Mankement
{
    //properties
    private $db;

    // Dit is de constructor van de Mankement model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getMankementen()
    {
        $this->db->query('SELECT * FROM Mankement');
        return $this->db->resultSet();
    }

    public function getMankement($id)
    {
        $this->db->query("SELECT * FROM Mankement WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateMankement($data)
    {
        // var_dump($data);exit();
        $this->db->query("UPDATE Mankement
                          SET AutoId = :autoid,
                              Datum = :datum,
                              Mankement = :mankement
                          WHERE id = :id");

        $this->db->bind(':autoid', $data['autoid'], PDO::PARAM_INT);
        $this->db->bind(':datum', $data['datum'], PDO::PARAM_STR);
        $this->db->bind(':mankement', $data['mankement'], PDO::PARAM_STR);
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function deleteMankement($id)
    {
        $this->db->query("DELETE FROM Mankement WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function createMankement($post)
    {
        $this->db->query("INSERT INTO Mankement (id, 
                                               AutoId, 
                                               Datum, 
                                               Mankement)
                          VALUES              (:id,
                                               :autoid,
                                               :datum,
                                               :mankement)");
        $this->db->bind(':id', NULL, PDO::PARAM_NULL);
        $this->db->bind(':autoid', $post['autoid'], PDO::PARAM_INT);
        $this->db->bind(':datum', $post['datum'], PDO::PARAM_STR);
        $this->db->bind(':mankement', $post['mankement'], PDO::PARAM_STR);
        return $this->db->execute();

    }


}