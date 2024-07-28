<?php
class Author {
    public static function getAllAuthors($db) {
        $query = "SELECT * FROM authors";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}