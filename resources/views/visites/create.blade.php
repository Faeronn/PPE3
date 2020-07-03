@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Enregistrer une nouvelle visite :</h2> <br>
    <form method="post" action="{{ route('visites.store')}}" enctype="mulipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 form-goup">
                <label for="ID_PRACTITIEN">Id Practitien : </label>
                <input type="number" class="form-control" name="ID_PRACTITIEN">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup">
                <label for="LIEU">Lieu : </label>
                <input type=""class="form-control" name="LIEU">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup">
                <label for="DATE_V">Date : </label>
                <input type="date" class="form-control" name="DATE_V">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup">
                <label for="DESCRIPTION">Description : </label>
                <textarea class="form-control" name="DESCRIPTION"></textarea>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup">
                <label for="H_DEBUT">Heure de début : </label>
                <input type="time" class="form-control" name="H_DEBUT">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 form-goup">
                <label for="H_FIN">Heure de fin : </label>
                <input type="time" class="form-control" name="H_FIN">
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