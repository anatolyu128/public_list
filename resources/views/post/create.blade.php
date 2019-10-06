@extends("layouts.layout")

@section("content")
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
@endsection
