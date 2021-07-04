@extends('layouts.app')
@section('content')
    <h2 id="pageTitle" class="align"> Atnaijinkite knygą</h2>
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('confirmEditedPrisijungimas', $selectedPrisijungimas->id_Knygos) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Pavadinimas</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pavadinimas" value="{{$selectedPrisijungimas->pavadinimas}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Leidimo metai:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="metai" value="{{$selectedPrisijungimas->metai}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Kalba:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="kalba" value="{{$selectedPrisijungimas->kalba}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Puslapiu skaicius:</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="puslapiai" value="{{$selectedPrisijungimas->puslapiai}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Santrauka:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="santrauka" value="{{$selectedPrisijungimas->santrauka}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Zanras:</label>
                            <div class="col-md-12">
                                <select class="form-control" name="zanras">
                                    <option value="{{$selectedPrisijungimas->zanras}}">{{$selectedPrisijungimas->names}}</option>
                                    @foreach($allZan as $nt)
                                        @if($selectedPrisijungimas->zanras != $nt->id_Zanras)
                                        <option value="{{$nt->id_Zanras}}">{{$nt->names}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Leidykla</label>
                            <div class="col-md-12">
                                <select class="form-control" name="leidykla">
                                <option value="{{$selectedPrisijungimas->leidykla}}">{{$selectedPrisijungimas->name}}</option>
                                    @foreach($allLeid as $nt)
                                        @if($selectedPrisijungimas->leidykla != $nt->id_Leidykla)
                                            <option value="{{$nt->id_Leidykla}}">{{$nt->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Autorius:</label>
                            <div class="col-md-12">
                                <select class="form-control" name="fk_autorius">
                                    <option value="{{$selectedPrisijungimas->fk_autorius}}">{{$selectedPrisijungimas->pavarde}} {{$selectedPrisijungimas->vardas}}</option>
                                    @foreach($allAut as $nt)
                                        @if($selectedPrisijungimas->fk_autorius != $nt->id)
                                        <option value="{{$nt->id}}">{{$nt->pavarde}} {{$nt->vardas}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                    Patvirtinti
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
