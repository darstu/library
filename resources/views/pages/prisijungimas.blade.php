@extends('layouts.app')

@section('content')
    <div id="content">
        {{--<p>
            Rezervacijos ID:<input type="text" name="ID"> </br>
            Pavardė:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Pavardė"></br>
            <button>Prisijungti</button>
        </p>--}}

        <h2 class="title">Knygų sąrašas:</h2>
        <div class="post">
        <div style="clear: both;">&nbsp;</div>
        <table>
            <tr>
                <th> ID</th>
                <th>Pavadinimas</th>
                <th>Metai</th>
                <th>Kalba</th>
                <th>Puslapiai</th>
                <th>Santrauka</th>
            </tr>
            @foreach($allKny as $asKny)
                <tr>
                    <td>{{$asKny->id_Knygos}}</td>
                    <td>{{$asKny->pavadinimas}}</td>
                    <td>{{$asKny->metai}}</td>
                    <td>{{$asKny->kalba}}</td>
                    <td>{{$asKny->puslapiai}}</td>
                    <td>{{$asKny->santrauka}}</td>
                    <td><a class="btn custom-btn2" onclick="return confirm('Ar tikrai norite istrinti sia knyga?')" href="{{route('deletePrisijungimas', $asKny->id_Knygos)}}" >
                            <span>Pašalinti</span>
                        </a></td>
                    <td><a class="btn custom-btn2" href="{{ route('editPrisijungimas', $asKny->id_Knygos)}}">
                            <span>Redaguoti</span>
                        </a></td></tr>
            @endforeach
            <br/>
            <br/>
            <br/>
            <a class="btn btn-primary " href="{{route('addPrisijungimas', $asKny->id_Knygos)}}">
                <span>Pridėti Knyga</span>
            </a>

        </table>

        <div style="clear: both;">&nbsp;</div>
        </div>
             </br>
        </br>
        </br>
        <h1>Mylimiausi mūsų <a href="skaitytojai">skaitytojai</a></h1>
        </br>
        </br>
        </br>
        <h3>Padarytos <a href="rezervacijos">rezervacijos</a></h3>

    </div>
@endsection
