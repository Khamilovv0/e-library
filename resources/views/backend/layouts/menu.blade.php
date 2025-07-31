<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="/" class="nav-link">
            <i class="bi bi-house-fill"></i>
            <p>{{ __('Главная страница') }}</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="#spravochniki"
           class="nav-link"
           data-toggle="collapse"
           role="button"
           aria-expanded="false"
           aria-controls="spravochniki">
            <i class="bi bi-file-spreadsheet-fill"></i>
            <p>Справочники</p>
            <i class="bi bi-caret-right-fill right-icon"></i>
        </a>
        <ul class="nav nav-treeview collapse" id="spravochniki">
            <li class="nav-item">
                <a href="{{route('author')}}" class="nav-link">
                    <i class="bi bi-person-circle"></i>
                    <p>Автор</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('place')}}" class="nav-link">
                    <i class="bi bi-buildings-fill"></i>
                    <p>Место издания (город)</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('publishing')}}" class="nav-link">
                    <i class="bi bi-book"></i>
                    <p>Издательство</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('literature')}}" class="nav-link">
                    <i class="bi bi-badge-ar"></i>
                    <p>Вид литературы</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('edition')}}" class="nav-link">
                    <i class="bi bi-pen"></i>
                    <p>Вид издания</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('language')}}" class="nav-link">
                    <i class="bi bi-translate"></i>
                    <p>Язык текста</p>
                </a>
            </li>
        </ul>
    </li>
</ul>
