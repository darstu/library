@extends('layouts.app')

@section('content')
    <div id="content">
        <h2 class="title">Leidyklų sąrašas:</h2>

        <div style="clear: both;">&nbsp;</div>
        <table>
            <tr>
                <th>ID</th>
                <th>Pavadinimas</th>
            </tr>
            @foreach($allLeid as $asLei)
                <tr>
                    <td>{{$asLei->id_Leidykla}}</td>
                    <td>{{$asLei->name}}</td>

                <td><a class="btn custom-btn2" onclick="return confirm('Ar tikrai norite istrinti sia leidykla?')" href="{{route('deleteLeidyklos', $asLei->id_Leidykla)}}" >
                    <span>Pašalinti</span>
                </a></td>
                <td><a class="btn custom-btn2" href="{{ route('editLeidyklos', $asLei->id_Leidykla)}}">
                    <span>Redaguoti</span>
                </a></td></tr>
            @endforeach

            <br/>
            <br/>
            <br/>
            <a class="btn btn-primary " href="{{route('addLeidyklos', $asLei->id_Leidykla)}}">
                <span>Pridėti Leidykla</span>
            </a>
        </table>

        <div style="clear: both;">&nbsp;</div>
    </div>
@endsection
