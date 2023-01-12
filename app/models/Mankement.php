<?php
   class Mankement
   {
      private $db;
      public function __construct()
      {
         $this->db = new Database();
      }
      public function getMankement()
      {
         $this->db->query('SELECT Mankement.Datum, Mankement.Mankement, Instructeur1.Naam, Instructeur1.Email, Auto.Kenteken 
                        FROM Mankement INNER JOIN AUTO ON Mankement.AutoId = Auto.Id
                        INNER JOIN Instructeur1 ON Instructeur1.Id = Auto.InstructeurId WHERE Instructeur1.Id = :Id ORDER BY Mankement.Datum desc' );
         $this->db->bind(':Id', 2);
         $result = $this->db->resultSet();
         return $result;
      }
      public function addMankement($post)
      {
         $sql = "INSERT INTO Mankement(AutoId
                                    ,Mankement
                                    ,Datum)
               VALUES               (:autoid
                                    ,:mankement
                                    ,:datum)";
         $this->db->query($sql);
         $this->db->bind(':autoid', $post['autoid'], PDO::PARAM_INT);
         $this->db->bind(':mankement', $post['mankement'], PDO::PARAM_STR);
         $this->db->bind(':datum', date("y-m-d"), PDO::PARAM_STR);
         return $this->db->execute();
      }
   }