@extends('layouts.app')
@section('content')
    <h1 class="align">Pridėti Skaitytoją</h1>
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('manageSkaitytojai') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pavardė:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pavarde" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Vardas:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="vardas" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Gimimo data:</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="gimimo_data" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Gyvenamoji vieta:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="gyvenamoji_vieta" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Telefonas:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="telefonas" value="">
                            </div>
                        </div>
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
