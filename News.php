<!DOCTYPE html>
<html>
<head>
    <title>davaleba</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    <?php include 'components/design.php';
    //ERASURE
    $id = isset($_POST['id']) && $_POST['id']? $_POST['id'] : null;
    if ($id) {
        $ERASURE = "DELETE FROM news WHERE id = '$id'";
        mysqli_query($connection, $ERASURE);
    }
    //JOINER
    $JOIN = "SELECT news.*,categories.title as cat_title FROM news 
    LEFT JOIN categories ON 
    news.category_id = categories.id;";
    $NResult = mysqli_query($connection, $JOIN);
    $NJoin = mysqli_fetch_all($NResult, MYSQLI_ASSOC);

    //C
        $sql = 'SELECT * FROM `news`';
        $result = mysqli_query($connection, $sql);
        $news = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
<main>
        <div class="container-header">
            <h2>News</h2>
            <a href="addnew.php?Web=1" class="btn">Add New</a>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($NJoin as $value) :?>
                <tr>
                    <td><?= $value['title']?></td>
                    <td><?= $value['text']?></td>
                    <td><?= $value['cat_title']?></td>
                    <td class="actions">
                        <a class="edit" href="NEedit.php?id=<?=$value['id']?>">Edit</a>
                        <form class="Tform" method='post'>
                        <input type="hidden" name='id' value=<?=$value['id']?>>
                        <button class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
              </table>
        </div>
    </main>
</body>
</html>