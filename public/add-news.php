<?php
include_once 'includes/database.php';
include_once 'includes/news.php';
include_once 'includes/category.php';
include_once 'includes/author.php';

$newsObj = new News($db);
$categories = Category::getAllCategories($db);
$authors = Author::getAllAuthors($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $newsObj->processNewsForm($_POST);
    
    if ($result === true) {
        header('Location: index.php');
        exit();
    } else {
        $errors = $result;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавить новость</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <div class="container">
        <h1>Добавить новость</h1>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="title">Заголовок:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="announcement">Анонс:</label>
                <textarea name="announcement" id="announcement" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="detailed_text">Подробный текст:</label>
                <textarea name="detailed_text" id="detailed_text" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="category">Категория:</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="">Выбрать категорию</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="author">Автор:</label>
                <select name="author" id="author" class="form-control" required>
                    <option value="">Выбрать автора</option>
                    <?php foreach ($authors as $author): ?>
                        <option value="<?php echo $author['id']; ?>"><?php echo $author['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="similar_news">Похожие новости:</label>
                <select name="similar_news[]" id="similar_news" class="form-control" multiple>
                    <?php
                    $allNews = $newsObj->getAllNews();
                    foreach ($allNews as $news):
                    ?>
                        <option value="<?php echo $news['id']; ?>"><?php echo htmlspecialchars($news['title']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add News</button>
        </form>
</div>

<?php include 'templates/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body></html>
