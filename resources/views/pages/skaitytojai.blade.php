@extends('layouts.app')

@section('content')
    <div id="content">

        <h2 class="title">Skaitytojai:</h2>

        <div style="clear: both;">&nbsp;</div>
        <table>
            @foreach($allSkait as $asSkait)
                <tr>
                   <td>{{$asSkait->vardas}}
                       {{$asSkait->pavarde}}
                       {{$asSkait->gimimo_data}}</td>
                    <td><a class="btn custom-btn2" onclick="return confirm('Ar tikrai norite istrinti si skaitytoja?')" href="{{route('deleteSkaitytojai', $asSkait->id)}}" >
                            <span>Pašalinti</span>
                        </a></td>
                    <td><a class="btn custom-btn2" href="{{ route('editSkaitytojai', $asSkait->id)}}">
                            <span>Redaguoti</span>
                        </a></td></tr>
            @endforeach
                <br/>
                <br/>
                <br/>
                <a class="btn btn-primary " href="{{route('addSkaitytojai', $asSkait->id)}}">
                    <span>Pridėti Skaitytoja</span>
                </a>

        </table>

        <div style="clear: both;">&nbsp;</div>
    </div>
@endsection
