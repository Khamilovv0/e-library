@extends('backend.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header info">
                    <h3 class="card-title">Список книг</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped" style="font-size: 14px !important">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Авторы</th>
                            <th>Название литературы</th>
                            <th>Место издания | Издательство</th>
                            <th>Год издания</th>
                            <th>Язык текста</th>
                            <th>Вид литературы</th>
                            <th>Кол. страниц</th>
                            <th>ISBN</th>
                            <th>Индекс УДК</th>
                            <th>Индекс ББК</th>
                            <th>Кол. экз.</th>
                            <th>Вид издания</th>
                            <th>Эл. книга</th>
                            <th>Редактор</th>
                            <th>Действие</th>
                            <th>Аннотация</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $index => $l)
                            <tr style="text-align: center">
                                <td>{{ $index + 1 }}</td>
                                <td>{!! $l->authors_initials !!}</td>
                                <td>{{ $l->name_book }}</td>
                                <td>{{ $l->place_publication }} | {{ $l->publishing_house }}</td>
                                <td>{{ $l->publishing_year }}</td>
                                <td>{{ $l->language_name }}</td>
                                <td>{{ $l->literature_name }}</td>
                                <td>{{ $l->pages_number }}</td>
                                <td>{{ $l->isbn }}</td>
                                <td>{{ $l->udc_index }}</td>
                                <td>{{ $l->bbk_index }}</td>
                                <td>{{ $l->col_copy }}</td>
                                <td>
                                    @php
                                        $format = [];
                                        if ($l->printed) $format[] = 'Печатный';
                                        if ($l->electronic) $format[] = 'Электронный';
                                    @endphp
                                    {{ implode(' | ', $format) }}
                                </td>
                                <td>
                                    @if($l->electronic && $l->file_path)
                                        <a href="{{ asset('path/to/files/' . $l->file_path) }}" class="form-control" target="_blank">Посмотреть книгу</a>
                                    @else
                                        <p class="text-muted">Нет данных</p>
                                    @endif
                                </td>
                                <td>{{ $l->uploaded_user }}</td>
                                <td>
                                    <form action="{{--{{ route('edit.route', $l->id_book) }}--}}" method="POST">
                                        @csrf
                                        <button class="btn btn-block btn-info" type="submit">Редактировать</button>
                                    </form>
                                    <br>
                                    <form action="{{--{{ route('delete.route', $l->id_book) }}--}}" method="POST">
                                        @csrf
                                        <button class="btn btn-block btn-danger" type="submit">Удалить</button>
                                    </form>
                                </td>
                                <td>{!! $l->annotation_book !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <style>
        /* Основные стили таблицы */
        #example2 {
            width: 100% !important;
        }

        /* Стили для мобильных устройств */
        @media screen and (max-width: 768px) {
            #example2 th,
            #example2 td {
                padding: 5px !important;
                font-size: 12px;
            }
        }
    </style>
@endsection
