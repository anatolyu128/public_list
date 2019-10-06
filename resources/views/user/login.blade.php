@extends("layouts.layout")

@section("content")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row" method="post" action="confirm-auth">
        @csrf
        <div class="form-group col-6">
            <label>Email адрес</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="ivanpetrov@yandex.ru">
        </div>
        <div class="form-group col-6">
            <label>Пароль</label>
            <small style="font-size: 8pt;">(от 8-ми символов)</small>
            <input type="password" class="form-control" name="password" placeholder="SomeSuperPassword">
        </div>
        <button type="submit" class="btn btn-primary ml-3">Зарегистрироваться</button>
    </form>
@endsection
