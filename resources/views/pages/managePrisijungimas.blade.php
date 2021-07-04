@extends('layouts.app')
@section('content')
    <h2 id="pageTitle" class="align"> Pridėkite knygą</h2>
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('managePrisijungimas')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Pavadinimas</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pavadinimas" value="{{ old('pavadinimas') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Leidimo metai:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="metai" value="{{ old('metai') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Kalba:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="kalba" value="{{ old('kalba') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Puslapiu skaicius:</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="puslapiai" value="{{ old('puslapiai') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Santrauka:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="santrauka" value="{{ old('santrauka') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Zanras:</label>
                            <div class="col-md-12">
                                <select class="form-control" name="zanras" value="{{ old('zanras') }}">
                                    @foreach($allZan as $nt)
                                        <option value="{{$nt->id_Zanras}}">{{$nt->names}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Leidykla</label>
                            <div class="col-md-12">
                                <select class="form-control" name="leidykla" >
                                    <option value="{{ old('leidykla') }}"></option>
                                    @foreach($allLeid as $nt)
                                        <option value="{{$nt->id_Leidykla}}">{{$nt->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Autorius:</label>
                            <div class="col-md-12">
                                <select class="form-control" name="fk_autorius" value="{{ old('fk_autorius') }}">
                                    @foreach($allAut as $nt)
                                        <option value="{{$nt->id}}">{{$nt->pavarde}} {{$nt->vardas}}</option>
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
