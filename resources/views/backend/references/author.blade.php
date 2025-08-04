@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Добавить автора</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('add') }}" method="POST">
                @csrf
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table style="width: 100%">
                                    <tbody>
                                        <tr style="height: 40px;" id="author_2_1">
                                            <td style="padding: 0 15px;" width="40%">
                                                <div class="form-group">
                                                    <input name="lastname" type="text" class="form-control" required="" placeholder="Фамилия*">
                                                </div>
                                            </td>
                                            <td style="padding: 0 15px;" width="25%">
                                                <div class="form-group">
                                                    <input name="firstname" type="text" class="form-control" required="" placeholder="Имя*">
                                                </div>
                                            </td>
                                            <td style="padding: 0 15px;" width="25%">
                                                <div class="form-group">
                                                    <input name="patronymic" type="text" class="form-control" placeholder="Отчество">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Список авторов</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10%">№</th>
                    <th width="55%">Имя</th>
                    <th width="35%">Управление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $index => $list)
                    <tr id="list-{{ $list->id }}">
                        <td>{{ $index + 1 }}</td> <!-- Порядковый номер -->
                        <td>{{ $list->short_name }}</td>
                        <td>
                            {{--<button type="button"
                                    class="btn btn-sm btn-info"
                                    data-toggle="modal"
                                    data-target="#editModal"
                                    data-id="{{ $list->id }}"
                                    data-name="{{ $list->name }}">
                                Редактировать
                            </button>--}}
                            <form action="{{ route('delete', $list->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить автора?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Управление</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
