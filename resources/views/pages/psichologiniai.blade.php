@extends('layouts.app')

@section('content')
    <div id="content">
        <div class="post">
            <h2 class="title"><a href="#">Psichologinių knygų sąrašas:</a></h2>
            <!--<p class="meta"><span class="date">April 1, 2012</span><span class="posted">Posted by <a href="#">Someone</a></span></p>-->
            <div style="clear: both;">&nbsp;</div>
            <div class="entry">
                <p>Kol kas knygų neturime.</p>
                <!--<p>Hermanas Hesė <a href="#">Stiklo Karoliukų Žaidimas</a>.</p>-->
            </div>
        </div>
        <?php
/*        use Carbon\Carbon;
        echo "<p>Dabartinės jūsų sesijos laikas: </p>";
        echo session('entryTime');
        */?>
        <div style="clear: both;">&nbsp;</div>
    </div>
@endsection
