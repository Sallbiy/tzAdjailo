@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">
            Список заявок
        </h3>
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Тема</th>
                <th scope="col">Статус заявки</th>
                <th scope="col">Дата публикации</th>
                <th scope="col">Стадия заявки</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        @if($item->is_read == 0)
                            <span class="bg-primary">Не просмотрено</span>
                        @else
                            <span class="bg-danger">Просмотрено</span>
                        @endif
                    </td>
                    <td>
                        @if($item->has_answer == 0)
                            <span>
                                Без ответа
                            </span>
                        @else
                            <span>
                                Дан ответ
                            </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.orders.show', ['order'=>$item])}}" class="btn btn-primary">
                            Перейти
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
