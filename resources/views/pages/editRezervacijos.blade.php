@extends('layouts.app')
@section('content')
    <h2 id="pageTitle" class="align"> Pataisykite rezervaciją</h2>
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('confirmEditedRezervacijos', $selectedRezervacijos->id_rez) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Paemimas:</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="paemimas" value="{{$selectedRezervacijos->paemimas}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Grazinimas:</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="grazinimas" value="{{$selectedRezervacijos->grazinimas}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Skaitytojas:</label>
                            <div class="col-md-12">
                                <select class="form-control" name="fk_skaitytojas">
                                    <option value="{{$selectedRezervacijos->fk_skaitytojas}}">{{$selectedRezervacijos->vardas}} {{$selectedRezervacijos->pavarde}}</option>
                                    @foreach($allSkai as $nt)
                                        @if($selectedRezervacijos->fk_skaitytojas != $nt->id)
                                        <option value="{{$nt->id}}">{{$nt->vardas}} {{$nt->pavarde}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Knyga:</label>
                            <div class="col-md-12">
                                <select class="form-control" name="fk_objektas">
                                    <option value="{{$selectedRezervacijos->fk_objektas}}">{{$selectedRezervacijos->pavadinimas}}</option>
                                    @foreach($allKny as $nt)
                                        @if($selectedRezervacijos->fk_objektas != $nt->id_Knygos)
                                        <option value="{{$nt->id_Knygos}}">{{$nt->pavadinimas}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                    Pataisyti
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
