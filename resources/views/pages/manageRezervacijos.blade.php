@extends('layouts.app')
@section('content')
    <h2 id="pageTitle" class="align"> Pridėkite rezervaciją</h2>
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('manageRezervacijos') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Paemimas:</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="paemimas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Grazinimas:</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="grazinimas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Skaitytojas:</label>
                            <div class="col-md-12">
                                <select class="form-control" name="fk_skaitytojas">
                                    @foreach($allSkai as $nt)
                                        <option value="{{$nt->id}}">{{$nt->vardas}} {{$nt->pavarde}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Knyga:</label>
                            <div class="col-md-12">
                                <select class="form-control" name="fk_objektas">
                                    @foreach($allKny as $nt)
                                        <option value="{{$nt->id_Knygos}}">{{$nt->pavadinimas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                    Pridėti
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
