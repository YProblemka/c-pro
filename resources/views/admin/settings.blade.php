@extends('layouts/admin-structure')
@section('title')
    Контакты
@endsection
@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Контакты</h1>
        </div>
    </div>
    <div class="row g-4 all-cards">
        <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-body p-3">
                    <h4 class="app-doc-title truncate mb-0" title="Телеграм"><span>Телеграм</span></h4>
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li><span class="text-muted">uri:</span> {{App\Models\Setting::getByName("telegram")->value}}</li>
                            <input type="text" class="change-input-value" placeholder="Новый uri" value="{{App\Models\Setting::getByName("telegram")->value}}">
                        </ul>
                    </div>
                    <button class="change-btn change-btn-settings btn btn-primary">Изменить</button>
                    <button class="save-btn save-btn-settings btn btn-primary" data-name="telegram">Сохранить</button>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-body p-3">
                    <h4 class="app-doc-title truncate mb-0" title="Телеграм"><span>Телефон 1</span></h4>
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li><span class="text-muted">uri:</span> {{App\Models\Setting::getByName("phone")->value}}</li>
                            <input type="text" class="change-input-value" placeholder="Новый uri" value="{{App\Models\Setting::getByName("phone")->value}}">
                        </ul>
                    </div>
                    <button class="change-btn change-btn-settings btn btn-primary">Изменить</button>
                    <button class="save-btn save-btn-settings btn btn-primary" data-name="phone1">Сохранить</button>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-body p-3">
                    <h4 class="app-doc-title truncate mb-0" title="Телеграм"><span>Телефон 2</span></h4>
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li><span class="text-muted">uri:</span> {{App\Models\Setting::getByName("phone")->value}}</li>
                            <input type="text" class="change-input-value" placeholder="Новый uri" value="{{App\Models\Setting::getByName("phone")->value}}">
                        </ul>
                    </div>
                    <button class="change-btn change-btn-settings btn btn-primary">Изменить</button>
                    <button class="save-btn save-btn-settings btn btn-primary" data-name="phone2">Сохранить</button>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-body p-3">
                    <h4 class="app-doc-title truncate mb-0" title="Телеграм"><span>Почта 1</span></h4>
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li><span class="text-muted">uri:</span> {{App\Models\Setting::getByName("email")->value}}</li>
                            <input type="text" class="change-input-value" placeholder="Новый uri" value="{{App\Models\Setting::getByName("email")->value}}">
                        </ul>
                    </div>
                    <button class="change-btn change-btn-settings btn btn-primary">Изменить</button>
                    <button class="save-btn save-btn-settings btn btn-primary" data-name="email1">Сохранить</button>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-body p-3">
                    <h4 class="app-doc-title truncate mb-0" title="Телеграм"><span>Почта 2</span></h4>
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li><span class="text-muted">uri:</span> {{App\Models\Setting::getByName("email")->value}}</li>
                            <input type="text" class="change-input-value" placeholder="Новый uri" value="{{App\Models\Setting::getByName("email")->value}}">
                        </ul>
                    </div>
                    <button class="change-btn change-btn-settings btn btn-primary">Изменить</button>
                    <button class="save-btn save-btn-settings btn btn-primary" data-name="email2">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
@endsection
