@extends("layouts.layout")
@section("content")

    <a href="create-post" class="btn btn-primary" style="margin-bottom: 30px;">Добавить задачу</a>

    @if(count($posts) > 0)
        <?php $iterable = 0; ?>
        @foreach($posts as $post)
            <div @if($iterable % 2 == 1)style="float: right;"@endif>
                <div class="card mb-3" style="width: 760px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset($post->picture) }}" style="width: 250px; height: 180px; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->content }}</p>
                                @if($ip == "::1")
                                    <a href="{{ "delete/" . $post->id }}" class="btn btn-danger">Удалить</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $iterable += 1; ?>
        @endforeach
    @endif

@endsection
