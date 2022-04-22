@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('orders.index')}}" class="btn btn-outline-info">Вернуться назад</a>
        <div class="card mx-auto w-50">
            @foreach($orders as $item)
                <div class="card-header">
                    <ul class="list-group list-group-flush text-justify font-weight-bold">
                        <li class="list-group-item">
                            Тема - <span>{{$item->title}}</span>
                        </li>
                        <li class="list-group-item">
                            Сообщение - <span>{{$item->message}}</span>
                        </li>
                        <li class="list-group-item">
                            Имя клиента - <span>{{$item->user->name}}</span>
                        </li>
                        <li class="list-group-item">
                            Файл -
                            <span>
                                {{$item->file}}
                            </span>
                        </li>
                        <li class="list-group-item">
                            Статус -
                            <span>
                                {{$item->status}}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <div class="row mx-auto">
                                <div class="col-md text-center">
                                    <form method="post" action="{{route('orders.close', ['id' => $item->id])}}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-outline-danger">Закрыть</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @foreach($message as $el)
                        <div class="card w-100 mt-3" style="border-radius:20px;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    @if($el->user->i)
                                            <span class="text-primary">
                                                {{$el->user->name}}
                                            <span>
                                    @else
                                                    <span class="">
                                                {{$el->user->name}}
                                            <span>
                                    @endif
                                </h5>
                                <p class="card-text">{{$el->text}}</p>
                                <div class="text-dark float-right">
                                    {{$el->created_at}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if($item->isNew())
                            <form id="new_requests" method="post" action="{{ route('details.store')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $item['id'] }}">
                                <div class="form-group">
                                    <label for="">Новое сообщение </label>
                                    <textarea class="@error('text') is-invalid @enderror form-control" id="text" name="text"
                                              placeholder="message..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                    @else
                            <div class="mt-5 text-center">
                                <h5>
                                    Сообщение отправить невозможно статус - {{$item->status}}
                                </h5>
                            </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
@endsection
