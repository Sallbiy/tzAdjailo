@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">
            Создание заявки
        </h1>
        <div class="w-50 mx-auto">
            <form id="new_request" method="post" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Тема</label>
                    <input type="text" class="@error('title') is-invalid @enderror form-control" id="title" name="title">
                </div>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Cообщение</label>
                    @error('message')
{{--                    <div class="alert alert-danger">{{ $message }}</div>--}}
                    @enderror
                    <textarea class="@error('message') is-invalid @enderror form-control" id="message" name="message"></textarea>

                </div>
                <div class="form-group">
                    <input type="file" name="file" id="file" class="form-control-file @error('message') is-invalid @enderror">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div>
            <table class="table">
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
                                <a href="{{route('details.show',['detail' => $item])}}" class="btn btn-primary">
                                    Перейти
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
