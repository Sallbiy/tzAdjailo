@extends('layouts.app')

@section('admin-content')
    <div class="container">
        <h3 class="text-center">
            Панель модератора
        </h3>
        <div class="mt-5">
            <h5 class="text-center">Вы можете посмотреть все заявки перейдя по ссылке <a href="{{route('admin.orders.index')}}" class="btn btn-outline-primary">Перейти</a></h5>
        </div>
    </div>
@endsection
