@extends('layout.app')

@section('links')
    <link rel="stylesheet" href="/css/homeStyle.css">
    <link rel="stylesheet" href="/css/mediaSettings.css">
@endsection
@section('content')

    <div class="settingsContainer">
        <div class="informationContainer">
            <img src="../img/img_avatar.png" alt="Avatar" class="avatar">
            <div>
                <p class="fullNameSettings">
                    {{\Illuminate\Support\Facades\Auth::user()->fullName}}
                </p>
            </div>
        </div>
        <div class="settingInfoContainer">
            <h1>
                Изменить информацию о пользователе
            </h1>
            <form action="{{route('updateUser')}}" method="POST">
                @csrf
                <div class="settingInfoGridContainer">
                    <div class="fullNameElement">
                        <legend>ФИО</legend>
                        <input type="text" name="fullName" id="fullName" value="{{\Illuminate\Support\Facades\Auth::user()->fullName}}">
                    </div>
                    <div class="emailAddressElement">
                        <legend>Email</legend>
                        <input type="email" name="email" id="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                    </div>
                    <div class="addressElement">
                        <legend>Адрес</legend>
                        <input type="text" name="address" id="address" value="{{\Illuminate\Support\Facades\Auth::user()->address}}">
                    </div>
                    <div class="cityElement">
                        <legend>Город</legend>
                        <input type="text" name="city" id="city" value="{{\Illuminate\Support\Facades\Auth::user()->city}}">
                    </div>
                    <div class="countryElement">
                        <legend>Гражданство</legend>
                        <input type="text" name="country" id="country" value="{{\Illuminate\Support\Facades\Auth::user()->country}}">
                    </div>
                    <div class="companyElement">
                        <legend>Компания</legend>
                        <input type="text" name="company" id="company" value="{{\Illuminate\Support\Facades\Auth::user()->company}}" readonly>
                    </div>
                    <div class="objectElement">
                        <legend>Объект</legend>
                        <input type="text" name="object" id="object" value="{{\Illuminate\Support\Facades\Auth::user()->object}}" readonly>
                    </div>
                    <button class="submitButtonSettings" type="submit">Сохранить информацию</button>
                </div>
            </form>
        </div>
    </div>

@endsection
