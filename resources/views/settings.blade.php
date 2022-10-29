@extends('layout.app')

@section('content')

    <div class="settingsContainer">
        <div class="informationContainer">
            <img src="../img/imgAvatar.jpg" alt="Avatar" class="avatar">
            <div>
                <p class="fullNameSettings">
                    Милько Вадим Дмитриевич
                </p>
                <p>
                    Инженер-программист
                </p>
            </div>
        </div>
        <div class="settingInfoContainer">
            <h1>
                Изменить информацию о пользователе
            </h1>
            <form action="/settings/addInformation" method="POST">
                <div class="settingInfoGridContainer">
                    <div class="fullNameElement">
                        <legend>ФИО</legend>
                        <input type="text" id="name" value="Милько Вадим Дмитриевич">
                    </div>
                    <div class="emailAddressElement">
                        <legend>Email</legend>
                        <input type="text" id="email" value="milko.vadimka@mail.ru">
                    </div>
                    <div class="addressElement">
                        <legend>Адрес</legend>
                        <input type="text" id="address" value="ул.Колсмонавтов, д.11, к.223">
                    </div>
                    <div class="cityElement">
                        <legend>Город</legend>
                        <input type="text" id="city" value="Могилёв">
                    </div>
                    <div class="div5">
                        <legend>Город</legend>
                        <input type="text" id="city" value="Могилёв">
                    </div>
                    <div class="div6">
                        <legend>Город</legend>
                        <input type="text" id="city" value="Могилёв">
                    </div>
                    <div class="div7">
                        <legend>Город</legend>
                        <input type="text" id="city" value="Могилёв">
                    </div>
                    <button class="submitButtonSettings" type="submit">Сохранить информацию</button>
                </div>
            </form>
        </div>
    </div>

@endsection
