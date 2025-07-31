@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Добавить место издания</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('add_place') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">ФИО автора</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Список изданий</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10%">№</th>
                    <th width="55%">Город</th>
                    <th width="35%">Управление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $index => $list)
                    <tr id="list-{{ $list->id }}">
                        <td>{{ $index + 1 }}</td> <!-- Порядковый номер -->
                        <td>{{ $list->name }}</td>
                        <td>
                            {{--<button type="button"
                                    class="btn btn-sm btn-info"
                                    data-toggle="modal"
                                    data-target="#editModal"
                                    data-id="{{ $list->id }}"
                                    data-name="{{ $list->name }}">
                                Редактировать
                            </button>--}}
                            <form action="{{ route('delete_place', $list->id) }}" method="POST" style="display:inline-block;">
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
                    <th>Город</th>
                    <th>Управление</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
