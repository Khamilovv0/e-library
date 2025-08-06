@extends('backend.layouts.app')

@section('content')
    <style>
        .box-solid{
            padding: 17px;
        }
        textarea{
            width: 7rem !important;
            height: 1.5rem !important;
            margin-left: 5px !important;
        }
        .select2-container--default{
            width: 100%;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            padding: 1px 7px !important;
            padding-left: 30px !important;
        }
        .select2-selection__choice__remove{
            padding: 1px 7px !important;
            margin: 0 !important;
        }
        .select2-selection__choice__remove:hover{
            background-color: #0e5b44; !important;
        }
        .note-editor .note-toolbar .dropdown-menu,
        .note-editor .note-toolbar button,
        .note-editor .note-toolbar i,
        .note-editor .note-toolbar select {
            color: black !important;
            background-color: white !important;
        }

        .note-editor .note-toolbar .dropdown-menu {
            border: 1px solid #ccc;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Добавить книгу</h3>
        </div>
        <div class="card-body">
            <form action="{{route('book_store')}}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-solid" style="border: 1px solid #888; margin: 0px;">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Название литературы (на оригинале)</label>
                                            <input name="id_book" type="hidden" value="1">
                                            <textarea name="name_book" class="form-control" placeholder="Қазақ хрестоматиясы" style="max-width: 100%; min-width: 100%; max-height: 200px; min-height: 40px; width: 569px; height: 87px;" required=""></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Место издания (город)</label>
                                            <select name="place_publication" class="form-control" required="">
                                                <option value=""> Выберите из списка </option>
                                                @foreach($city as $c)
                                                    <option value="{{$c->name}}"> {{$c->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Издательство</label>
                                            <select name="place_publication" class="form-control" required>
                                                <option value="">Выберите из списка</option>
                                                @foreach($publishing as $p)
                                                    <option value="{{$p->name}}"> {{$p->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Год издания</label>
                                            <select name="publishing_year" class="form-control" required="">
                                                <option value=""> Выберите из списка </option>
                                                @for ($i = 2025; $i >= 1900; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Обьем страниц</label>
                                            <input name="pages_number" type="number" class="form-control" placeholder="0" value="" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Язык основного текста</label>
                                            <select name="language" class="form-control" required="">
                                                <option value=""> Выберите из списка </option>
                                                @foreach($lang as $l)
                                                    <option value="{{$l->id}}"> {{$l->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Вид литературы</label>
                                            <select name="type_literature" class="form-control" required="">
                                                <option value=""> Выберите из списка </option>
                                                @foreach($literature as $lit)
                                                    <option value="{{$lit->id}}"> {{$lit->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input name="isbn" type="text" class="form-control" placeholder="978-601-292-732-0" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Индекс УДК</label>
                                            <input name="udc_index" type="text" class="form-control" placeholder="579">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Индекс ББК</label>
                                            <input name="bbk_index" type="text" class="form-control" placeholder="28">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="control-label">Вид издания</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label style="font-weight: normal">
                                                        <input type="checkbox" name="printed" class="flat-red" value="1">
                                                        Печатный
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label style="font-weight: normal">
                                                        <input type="checkbox" name="electronic" class="flat-red" value="1">
                                                        Электронный
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Кол. экз.</label>
                                            <input name="col_copy" type="number" class="form-control" placeholder="0" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box box-solid" style="border: 1px solid #888; margin: 0px;">

                            <div class="box-header with-border">
                                <div class="row">
                                    <div class="col-md-12"><label class="control-label">Авторы</label></div>
                                </div>
                            </div>
                            <select name="author_name[]" id="" class="form-control select2-multiple" multiple required>
                                @foreach($author as $a)
                                    <option value="{{ $a->short_name }}">{{ $a->short_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="box box-solid" style="border: 1px solid #888; margin-top: 20px;">
                            <div class="box-header with-border">
                                <div class="row" >
                                    <div class="col-md-12"><label class="control-label">Аннотация</label></div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12 summernote-wrapper">
                                        <textarea style="color: black;" id="summernote" name="content"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-solid" style="border: 1px solid #888; margin: 0px; margin-top: 15px;">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fileInput">Загрузите книгу</label>
                                            <!-- Поле для загрузки файлов -->
                                            <div class="file-upload" id="fileUpload">
                                                <input type="file" id="fileInput" multiple accept=".pdf, .doc, .docx" name="file_path">
                                                <i style=" font-size: 100px; color: gray; padding-right: 80px" class="fa fa-upload" aria-hidden="true"></i>
                                                <p>Перетащите файлы сюда или нажмите для загрузки</p>
                                            </div>

                                            <!-- Отображение выбранных файлов -->
                                            <div id="fileList" class="file-list"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

