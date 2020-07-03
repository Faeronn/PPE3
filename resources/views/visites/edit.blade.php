@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la visite pour ID = {{$visite->ID_VISITE}} :</h2> <br>
    <form method="post" action="{{ action('VisiteController@update', $id)}}" enctype="mulipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-6 form-goup">
                <label for="ID_PRACTITIEN">Id Practitien : </label>
                <input value="{{$visite->ID_PRACTITIEN}}" type="number" class="form-control" name="ID_PRACTITIEN">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup">
                <label for="LIEU">Lieu : </label>
                <input value="{{$visite->LIEU}}" type="text" class="form-control" name="LIEU">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup">
                <label for="DATE_V">Date : </label>
                <input value="{{$visite->DATE_V}}" type="date" class="form-control" name="DATE_V">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup">
                <label for="DESCRIPTION">Description : </label>
                <textarea class="form-control" name="DESCRIPTION">{{$visite->DESCRIPTION}}</textarea>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup">
                <label for="H_DEBUT">Heure de début : </label>
                <input value="{{$visite->H_DEBUT}}" type="time" class="form-control" name="H_DEBUT">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup">
                <label for="H_FIN">Heure de fin : </label>
                <input value="{{$visite->H_FIN}}" type="time" class="form-control" name="H_FIN">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Valider</button>
            </div>
            <div class="col-md-6"></div>
        </div>
    </form>
</div>
@endsection