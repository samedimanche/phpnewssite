<?php
include_once 'includes/database.php';
include_once 'includes/news.php';

if (isset($_GET['id'])) {
    $newsId = $_GET['id'];
    $newsObj = new News($db);
    $news = $newsObj->getNewsById($newsId);
    $similarNews = $newsObj->getSimilarNews($newsId);
    $newsObj->incrementViewCount($newsId);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Новость: <?= $news['title'] ?? 'Не найдена' ?> </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <div class="container">
        <?php if ($news): ?>
            <h1><?php echo htmlspecialchars($news['title']); ?></h1>
            <p class="text-muted"><?php echo $news['date']; ?> | Категория: <?php echo htmlspecialchars($news['category']); ?> | Просмотров: <?php echo $news['view_count']; ?></p>
            <hr>
            <p><?php echo $news['detailed_text']; ?></p>

            <?php if (count($similarNews) > 1): ?>
                <h3>Похожие новости</h3>
            <?php elseif (count($similarNews) == 1): ?>
                <h3>Похожая новость</h3>
            <?php endif; ?>

            <?php if (!empty($similarNews)): ?>
                <?php foreach ($similarNews as $similar): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><a href="news.php?id=<?php echo $similar['id']; ?>"><?php echo htmlspecialchars($similar['title']); ?></a></h5>
                            <p class="card-text"><?php echo htmlspecialchars($similar['announcement']); ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $similar['date']; ?></small></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Похожие новости не найдены.</p>
            <?php endif; ?>
        <?php else: ?>
            <p>Новостная статья не найдена.</p>
        <?php endif; ?>
    </div>

    <?php include_once 'templates/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>