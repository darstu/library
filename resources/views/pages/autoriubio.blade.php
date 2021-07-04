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
            <li><a href="../index">Pagrindinis</a></li>
            <li><a href="../prisijungimas">Knygos</a></li>
            <li><a href="../autoriai">Autoriai</a></li>
            <li><a href="../kontaktai">Kontaktai</a></li>
        </ul>
    </div>
    <!-- end #menu -->
</div>
<div id="header-wrapper">
    <div id="header">
        <div id="logo">
            <h1><a href="../index"><span>Biblioteka</span></a></h1>

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
            <ul>

                <li>

                    <h2>Žanrai</h2>
                    <button id="show">Rodyti žanrų sąrašą</button></br>
                    <button id="hide">Paslėpti žanrų sąrašą</button>
                    <ul>

                        <li><li1><a href="../siaubas">Siaubas</a></li1></li>
                        <li><li1><a href="../antastika">Fantastika</a></li1></li>
                        <li><li1><a href="../romanai">Romanai</a></li1></li>
                        <li><li1><a href="../detektyvai">Detektyvai</a></li1></li>
                        <li><li1><a href="../psichologiniai">Psichologiniai</a></li1></li>
                        <li><li1><a href="../mistiniai">Mistiniai</a></li1></li>
                        <li><li1><a href="../moksliniai">Moksliniai</a></li1></li>
                        <li><li1><a href="../biografiniai">Biografiniai</a></li1></li>
                    </ul>



                </li>
            </ul>
        </div>

        <div id="page-bgbtm">

    <div id="content">

        <h2 class="title">Autorius:</h2>

        <div style="clear: both;">&nbsp;</div>

        <h3>{{$autoriai->vardas}} {{$autoriai->pavarde}}</h3>
        <p>Gimimo data:{{$autoriai->data}}</p>
        <p>-----------------------------------------------------</p>
        <p>Biografija:</p>
        <p>{{$autoriai->biografija}}</p>

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

