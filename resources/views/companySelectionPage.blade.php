@extends('layout.app')

@section('links')
    <link rel="stylesheet" href="/css/homeStyle.css">
@endsection

@section('content')

    <div class="companyCardContainer">
        <div class="companyCard" onclick="window.location.href='/analytics/ПК-2'">
            <div class="cardImg"></div>
            <div class="cardText">ПК-2</div>
        </div>
        <div class="companyCard" onclick="window.location.href='/analytics/ПК-5'">
            <div class="cardImg"></div>
            <div class="cardText">ПК-5</div>
        </div>
        <div class="companyCard" onclick="window.location.href='/analytics/ПК-6'">
            <div class="cardImg"></div>
            <div class="cardText">ПК-6</div>
        </div>
    </div>
@endsection
