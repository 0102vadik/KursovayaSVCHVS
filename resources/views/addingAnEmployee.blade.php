@extends('layout.app')

@section('links')
    <link rel="stylesheet" href="/css/addEmployeeStyle.css">
@endsection

@section('content')
    <div class="addEmployeeCard">
        <h1>
            Создание пользователя
        </h1>
        <form action="{{route('user.registration')}}" method="POST">
            @csrf
            <div class="addEmployeeGridContainer">
                <div class="addEmployeeFullName">
                    <legend>ФИО</legend>
                    <input type="text" name="fullName" id="fullName" placeholder="Введите ФИО сотрудника">
                </div>
                <div class="addEmployeeEmail">
                    <legend>Email</legend>
                    <input type="email" name="email" id="email" placeholder="Введите e-mail сотрудника">
                </div>
                <div class="addEmployeeAddress">
                    <legend>Адрес</legend>
                    <input type="text" name="address" id="address" placeholder="Введите адрес сотрудника">
                </div>
                <div class="addEmployeeCity">
                    <legend>Город</legend>
                    <input type="text" name="city" id="city" placeholder="Введите город сотрудника">
                </div>
                <div class="addEmployeeCountry">
                    <legend>Гражданство</legend>
                    <input type="text" name="country" id="country" placeholder="Введите гражданство сотрудника">
                </div>
                <div class="addEmployeeCompany">
                    <legend>Компания</legend>
                    <input type="text" name="company" id="company" placeholder="Введите компанию сотрудника">
                </div>
                <div class="addEmployeeObject">
                    <legend>Объект</legend>
                    <input type="text" name="object" id="object" placeholder="Введите объект сотрудника">
                </div>
                <div class="addEmployeeLogin">
                    <legend>Логин</legend>
                    <input type="text" name="login" id="login" placeholder="Введите компанию сотрудника">
                </div>
                <div class="addEmployeePassword">
                    <legend>Пароль</legend>
                    <input type="password" name="password" id="password" placeholder="Введите объект сотрудника">
                </div>
                <button class="submitButtonAddEmployee" type="submit">Создать сотрудника</button>
            </div>
        </form>
    </div>
@endsection
