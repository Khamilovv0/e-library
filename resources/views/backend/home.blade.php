@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-bottom-0 py-3">
                        <h5 class="mb-0 text-white">{{ __('Информация о пользователе') }}</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row align-items-start">
                            @foreach($info as $data)
                                <div class="col-md-4 text-center mb-4 mb-md-0">
                                    <div class="position-relative d-inline-block">
                                        <img class="profile-avatar rounded-circle border border-light shadow-sm"
                                             src="https://ais.kazetu.kz/dist/users/{{$data->avatar_url}}"
                                             alt="User avatar"
                                             width="150"
                                             height="150">
                                    </div>
                                    <div class="mt-3">
                                        <h4 class="font-weight-semibold mb-1">{{ $data->fio_rus }}</h4>
                                        <p class="text-muted mb-1">{{ $data->name_job_rus }}</p>
                                        <p class="text-muted">{{ $data->division_name_rus }}</p>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-8">
                                <div class="user-details p-3 bg-light rounded">
                                    @foreach($info as $data)
                                        <div class="detail-item mb-3">
                                            <span class="text-secondary small">Логин</span>
                                            <p class="font-weight-medium mb-0">{{ Auth::user()->Login }}</p>
                                        </div>

                                        <div class="detail-item mb-3">
                                            <span class="text-secondary small">Почта</span>
                                            <p class="font-weight-medium mb-0">{{ $data->email }}</p>
                                        </div>

                                        <div class="detail-item">
                                            <span class="text-secondary small">Моб. телефон</span>
                                            <p class="font-weight-medium mb-0">{{ $data->mobile_phone }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
