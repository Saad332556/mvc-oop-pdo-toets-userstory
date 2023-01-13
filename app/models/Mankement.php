<?php
   class Mankement
   {
      private $db;
      public function __construct()
      {
         $this->db = new Database();
      }
      public function getMankementen()
      {
         $this->db->query('SELECT Mankement.Datum, Mankement.Mankement, Instructeur1.Naam, Instructeur1.Email, Auto.Kenteken 
                        FROM Mankement INNER JOIN Auto ON Mankement.AutoId = Auto.Id
                        INNER JOIN Instructeur1 ON Instructeur1.Id = Auto.InstructeurId1 WHERE Instructeur1.Id = :id ORDER BY Mankement.Datum desc');
         $this->db->bind(':id', 2);
         $result = $this->db->resultSet();
         return $result;
      }
      public function create($post)
      {
         $sql = "INSERT INTO Mankement(AutoId
                                      ,Mankement
                                      ,Datum)
               VALUES                 (:autoid
                                      ,:mankement
                                      ,:datum)";
         $this->db->query($sql);
         $this->db->bind(':autoid', $post['autoid'], PDO::PARAM_INT);
         $this->db->bind(':mankement', $post['mankement'], PDO::PARAM_STR);
         $this->db->bind(':datum', date("Y-m-d"), PDO::PARAM_STR);
         return $this->db->execute();
      }
   }