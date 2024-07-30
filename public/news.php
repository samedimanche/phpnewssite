<?php
class News {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getNewsList($sortBy, $categoryFilter, $dateFilter) {
        $query = "SELECT n.*, c.name AS category, a.name AS author 
                  FROM news n
                  JOIN categories c ON n.category_id = c.id
                  JOIN authors a ON n.author_id = a.id";
    
        $conditions = [];
    
        if (!empty($categoryFilter)) {
            $conditions[] = "n.category_id = :category";
        }
    
        if (!empty($dateFilter)) {
            $conditions[] = "DATE(n.date) >= :date";
        }
    
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
    
        switch ($sortBy) {
            case 'old':
                $query .= " ORDER BY n.date ASC";
                break;
            case 'popular':
                $query .= " ORDER BY n.view_count DESC";
                break;
            default:
                $query .= " ORDER BY n.date DESC";
                break;
        }
    
        $stmt = $this->db->prepare($query);
    
        if (!empty($categoryFilter)) {
            $stmt->bindValue(':category', $categoryFilter, PDO::PARAM_INT);
        }
    
        if (!empty($dateFilter)) {
            $stmt->bindValue(':date', $dateFilter);
        }
    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($newsId) {
        $query = "SELECT n.*, c.name AS category, a.name AS author 
                  FROM news n
                  JOIN categories c ON n.category_id = c.id
                  JOIN authors a ON n.author_id = a.id
                  WHERE n.id = :id";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $newsId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSimilarNews($newsId) {
        $query = "SELECT n.*, c.name AS category, a.name AS author 
                  FROM news n
                  JOIN categories c ON n.category_id = c.id
                  JOIN authors a ON n.author_id = a.id
                  JOIN similar_news sn ON n.id = sn.similar_news_id
                  WHERE sn.news_id = :id";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $newsId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function incrementViewCount($newsId) {
        $query = "UPDATE news SET view_count = view_count + 1 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $newsId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function processNewsForm($postData) {
        $title = $postData['title'] ?? '';
        $announcement = $postData['announcement'] ?? '';
        $detailedText = $postData['detailed_text'] ?? '';
        $categoryId = $postData['category'] ?? '';
        $authorId = $postData['author'] ?? '';
        $similarNewsIds = $postData['similar_news'] ?? [];

        $errors = $this->validateNewsForm($title, $announcement, $detailedText, $categoryId, $authorId);

        if (empty($errors)) {
            $this->addNews($title, $announcement, $detailedText, $categoryId, $authorId, $similarNewsIds);
            return true;
        }

        return $errors;
    }

    public function validateNewsForm($title, $announcement, $detailedText, $categoryId, $authorId) {
        $errors = [];
        if (empty($title)) {
            $errors[] = "Требуется название";
        }
    
        if (empty($announcement)) {
            $errors[] = "Требуется анонс";
        }
    
        if (empty($detailedText)) {
            $errors[] = "Требуется текст";
        }
    
        if (empty($categoryId)) {
            $errors[] = "Требуется выбрать категорию";
        }
    
        if (empty($authorId)) {
            $errors[] = "Требуется выбрать автора";
        }
    
        return $errors;
    }

    public function addNews($title, $announcement, $detailedText, $categoryId, $authorId, $similarNewsIds) {
        $query = "INSERT INTO news (title, announcement, detailed_text, category_id, author_id)
                  VALUES (:title, :announcement, :detailed_text, :category_id, :author_id)";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':announcement', $announcement);
        $stmt->bindValue(':detailed_text', $detailedText);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':author_id', $authorId, PDO::PARAM_INT);
        $stmt->execute();
    
        $newsId = $this->db->lastInsertId();
        
    
        if (!empty($similarNewsIds)) {
            $this->addSimilarNews($newsId, $similarNewsIds);
        }
    }
    
    private function addSimilarNews($newsId, $similarNewsIds) {
        $query = "INSERT INTO similar_news (news_id, similar_news_id) VALUES (:news_id, :similar_news_id)";
        $stmt = $this->db->prepare($query);
    
        foreach ($similarNewsIds as $similarNewsId) {
            $stmt->bindValue(':news_id', $newsId, PDO::PARAM_INT);
            $stmt->bindValue(':similar_news_id', $similarNewsId, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function getAllNews() {
        $sql = "SELECT id, title FROM news ORDER BY date DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
