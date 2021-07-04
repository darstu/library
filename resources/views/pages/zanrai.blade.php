<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Biblioteka</title>
    <link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Coda:400,800" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#hide").click(function(){
                $("li1").delay(2000);
                $("li1").hide(2000);
            });
            $("#show").click(function(){
                $("li1").show();
            });
        });
    </script>
</head>
<body>
<div id="menu-wrapper">
    <div id="menu">
        <ul>
            <li><a href="index">Pagrindinis</a></li>
            <li><a href="prisijungimas">Knygos</a></li>
            <li><a href="autoriai">Autoriai</a></li>
            <li><a href="kontaktai">Kontaktai</a></li>
        </ul>
    </div>
    <!-- end #menu -->
</div>
<div id="header-wrapper">
    <div id="header">
        <div id="logo">
            <h1><a href="index"><span>Biblioteka</span></a></h1>

        </div>
    </div>
</div>
<div id="wrapper">
    <!-- end #header -->
    <div id="page">
        <div id="page-bgtop">
            <div style="clear: both;">&nbsp;</div>
        </div>
        <div id="sidebar">
            <h1><a href="leidyklos">Leidyklos</a></h1>
            <small>su kuriom bendradarbiaujam</small>
        </div>

        <div id="page-bgbtm">

            <div id="content">

                <h2 class="title">Žanrų sąrašas:</h2>

                <div style="clear: both;">&nbsp;</div>
                <table>
                    <tr>
                    <th> ID</th>
                    <th>Pavadinimas</th>
                    </tr>
                @foreach($allZan as $asZan)
                    <tr>
                        <td>{{$asZan->id_Zanras}}</td>
                        <td>{{$asZan->names}}</td>
                        <td><a class="btn custom-btn2" onclick="return confirm('Ar tikrai norite istrinti si zanra?')" href="{{route('deleteZanrai', $asZan->id_Zanras)}}" >
                                <span>Pašalinti</span>
                            </a></td>
                        <td><a class="btn custom-btn2" href="{{ route('editZanrai', $asZan->id_Zanras)}}">
                                <span>Redaguoti</span>
                            </a></td></tr>
                @endforeach
                    <br/>
                    <br/>
                    <br/>
                    <a class="btn btn-primary " href="{{route('addZanrai', $asZan->id_Zanras)}}">
                        <span>Pridėti Zanra</span>
                    </a>

                </table>
                <div style="clear: both;">&nbsp;</div>
            </div>
            <div style="clear: both;">&nbsp;</div>
        </div>
    </div>
</div>
<!-- end #page -->
<div id="footer">
    <p>Prie puslapio dirbo Darija.</p>
</div>
</body>
</html>


