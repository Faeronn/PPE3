@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Tableau de bord
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @auth
            <h3>Mes Visites</h3>
        @endauth
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID_PRACTITIEN</th>
                    <th>Lieu</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Heure début</th>
                    <th>Heure fin</th>
                    @auth
                        <th colspan="2">Action</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach($visites as $visite)
                <tr>
                    <td>{{$visite['ID_PRACTITIEN']}}</td>
                    <td>{{$visite['LIEU']}}</td>
                    <td>{{$visite['DATE_V']}}</td>
                    <td>{{$visite['DESCRIPTION']}}</td>
                    <td>{{$visite['H_DEBUT']}}</td>
                    <td>{{$visite['H_FIN']}}</td>
                    @auth
                        <td>
                            <a href="{{action('VisiteController@edit', $visite['ID_VISITE'])}}" class="btn btn-warning">Modifier</a>
                        </td>
                        <td>
                            <form action="{{action('VisiteController@destroy', $visite['ID_VISITE'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
        @auth
            <div>
                <a href="{{route('visites.create')}}" class="btn btn-secondary">Ajouter une visite</a>
            </div>
        @endauth
    </div>
</div>
@endsection