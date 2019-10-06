<!DOCTYPE html>
<html>
<head>
    <title>Основная страница</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container" style="padding-top: 30px;">

    <form method="post" action="upload-post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Название задачи</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Название задачи">
        </div>
        <div class="form-group">
            <label for="content">Описание задачи</label>
            <input type="text" class="form-control" id="content" name="content" placeholder="Описание задачи">
        </div>
        <div class="form-group">
            <label for="picture">Изображение</label>
            <input type="file" class="form-control-file" id="picture" name="picture">
        </div>
        <input type="submit" class="btn btn-primary" value="Создать">
    </form>

</div>
</body>
</html>
