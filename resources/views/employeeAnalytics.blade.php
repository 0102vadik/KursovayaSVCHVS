@extends('layout.app')

@section('links')
    <link rel="stylesheet" href="/css/employeeAnalyticsStyle.css">
@endsection

@section('content')
    <div class="companyName">
        <h1 id="companyName">
            {{$companyName}}
        </h1>
    </div>
    <div class="chartCanvas">
        <canvas class="chartNeedEmployee"></canvas>
    </div>
    <div class="informationCardContainer">
        <div class="div1">
            <p> Прогноз общей потребности </p>
            <span>{{$service->totalDemandForecast()}} чел.</span>
        </div>
        <div class="div2">
            <p>Коэффициент текучести кадров </p>
            <span> {{$service->staffTurnoverRate()}} </span>
        </div>
        <div class="div3">
            <p>Обязательное обучение персонала</p>
            <span>{{$service->implementationOfTheGeneralStaffTrainingPlan()}} %</span>
        </div>
        <div class="div4">
            <p>Задолжность по зароботным платам </p>
            <span>{{number_format($service->gettingPayrollProtection(), 2, ',', ' ')}} ₽</span>
        </div>
    </div>

    <div class="employeeTable">
        <input class="search-text" type="text" placeholder="Поиск..." id="search-text" onkeyup="tableSearch()">
        <table class="table" id="info-Employee-table">
            <thead>
            <tr>
                <th class="sort" data-sort="vehicle-name">Фио</th>
                <th class="sort" data-sort="vehicle-type">Долг перед сотрудником</th>
                <th class="sort" data-sort="vehicle-number">Объект</th>
                <th class="sort" data-sort="vehicle-year">Управление</th>
            </tr>
            </thead>
            @foreach($company->getStaff() as $item)
                <tr class="redirect">
                    <td class="vehicle-name">{{$item->getFullName()}}</td>
                    <td class="vehicle-type">{{number_format($item->getWageArrears(), 2, ',', ' ')}} ₽</td>
                    <td class="vehicle-number">{{$item->getObject()}}</td>
                    <td class="vehicle-year">
                        <button href="#popup" class="btn popup-link" onclick="onClickButton({{$item->getPersonalNumber()}},'{{$item->getFullName()}}','{{$item->getObject()}}','{{$item->getCompany()}}')">Управление</button>
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
    </div>
@endsection

@section('popup')
    <div id="popup" class="popup-container">
        <div class="popup-body">
            <div class="popup-content">
                <p id="fullName" >ФИО</p>
                <p id="idPerson">id</p>
                <img src="../img/closeButton.png" class="popup-close close-popup" alt="">
                <div class="popup-grid-container">
                    <div class="objectEmployeeAnalyticsContainer">
                        <legend>Объект</legend>
                        <input type="text" name="object" id="object" value="Объект">
                        <button class="buttonPopup" onclick="transferToAnotherObject()">Перевести</button>
                    </div>
                    <div class="objectEmployeeAnalyticsContainer">
                        <legend>Компания</legend>
                        <input type="text" name="company" id="company" value="Компания">
                        <button class="buttonPopup" onclick="transferToAnotherCompany()">Перевести</button>
                    </div>
                    <div class="objectEmployeeAnalyticsContainer">
                        <legend>Уволить сотрудника</legend>
                        <button  class="buttonPopup buttonPopupLong" onclick="deleteEmployee()">Уволить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerContent')

@endsection

@section('javaScriptLink')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/js/personnelManagement.js"></script>
    <script src="/js/analyticsChart.js"></script>
    <script src="/js/tableSearch.js"></script>
    <script src="/js/popUp.js"></script>
@endsection
