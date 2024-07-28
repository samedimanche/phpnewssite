<?php
include_once 'includes/database.php';
include_once 'includes/news.php';
include_once 'includes/category.php';

$newsObj = new News($db);
$categories = Category::getAllCategories($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sortBy = $_GET['sort'] ?? 'new';
    $categoryFilter = $_GET['category'] ?? '';
    $dateFilter = $_GET['date'] ?? '';
    
    $newsList = $newsObj->getNewsList($sortBy, $categoryFilter, $dateFilter);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <div class="container">
        <h1>Список Новостей</h1>

        <form method="GET" action="">
            <div class="form-group">
                <label for="sort">Сортировать по:</label>
                <select name="sort" id="sort" class="form-control">
                    <option value="new" <?php if ($sortBy === 'new') echo 'selected'; ?>>Самая новая</option>
                    <option value="old" <?php if ($sortBy === 'old') echo 'selected'; ?>>Самая старая</option>
                    <option value="popular" <?php if ($sortBy === 'popular') echo 'selected'; ?>>популярности</option>
                </select>
            </div>

            <div class="form-group">
                <label for="category">Категория:</label>
                <select name="category" id="category" class="form-control">
                    <option value="">Все категории</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" <?php if ($categoryFilter == $category['id']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Дата:</label>
                <input type="date" name="date" id="date" class="form-control" value="<?php echo $dateFilter; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Отфильтровать</button>
        </form>

        <hr>

        <?php if (!empty($newsList)): ?>
            <?php foreach ($newsList as $news): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><a href="news.php?id=<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h5>
                        <p class="card-text"><?php echo $news['announcement']; ?></p>
                        <p class="card-text"><small class="text-muted"><?php echo $news['date']; ?></small></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Новостных статей не найдено.</p>
        <?php endif; ?>
    </div>

    <?php include 'templates/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>