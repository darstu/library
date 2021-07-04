@extends('layouts.app')
@section('content')
    <h1 class="align">Pridėti autorių</h1>
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('confirmEditedAutoriai', $selectedAutoriai->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Vardas:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="vardas" value="{{$selectedAutoriai->vardas}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pavardė:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pavarde" value="{{$selectedAutoriai->pavarde}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Biografija:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="biografija" value="{{$selectedAutoriai->biografija}}">
                            </div>
                        </div>
                        {{--<div class="form-group">
                            <label class="col-md-4 control-label">Turinys</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" name="content"></textarea>
                            </div>
                        </div>--}}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Gimimo data:</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="data" value="{{$selectedAutoriai->data}}">
                            </div>
                        </div>
                        {{--<div class="form-group">
                            <label class="control-label">Tipas</label>
                            <div class="col-md-12">
                                <select class="form-control" name="newsType">
                                    @foreach($newsType as $nt)
                                        <option value="{{$nt->getKey()}}">{{$nt->pavadinimas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>--}}
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
