@extends('master')
@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-9">
                    <div class="slider">
                        <ul class="slides">
                            <li><a href="#"><img src="{{ asset('dummy/slide-1.png') }}" alt="Slide 1"></a></li>
                            <li><a href="#"><img src="{{ asset('dummy/slide-2.jpg') }}" alt="Slide 2"></a></li>
                            <li><a href="#"><img src="{{ asset('dummy/slide-3.jpg') }}" alt="Slide 3"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <table class="table table-hover topgame_table">
                            <tbody>
                                <tr id="top_game" style="background-color: #222222;color: white"><td><h4 style="text-align: center; font-family: fipps" >Top games</h4></td></tr>
                                @foreach ($top_games as $game)
                                    <tr class="col-md-12" id="top_game">
                                        <td class="col-md-3" id="top_game_image">
                                            <img src="/resource/upload/game_image/{{ $game->image }}"></td>
                                        <td class="col-md-9" id="top_game_title">
                                           <div id="game_name">
                                             <a href="{{ route('games.show', $game->id )}}">{{ $game->name }}</a>
                                           </div>
                                           <div>
                                             System: {{ $game->system->name }}
                                           </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- .row -->
        {{-- </div>
    </div>
    <div class="container" style="margin-top: 20px;">
        <div class="page"> --}}
            <div class="content_title">All Games</div>
            <div class="row">
                @if (count($games) > 0)
                    <section class="games">
                        @include('layouts.allgame')
                    </section>
                @endif
            </div> <!-- .row -->
            <div class="content_title">New Games</div>
            <div class="row">
                <div class="col-md-3">
                    <h2 class="section-title">Nes</h2>
                    <ul class="movie-schedule">
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                    </ul> <!-- .movie-schedule -->
                </div>
                <div class="col-md-3">
                    <h2 class="section-title">Snes</h2>
                    <ul class="movie-schedule">
                        <li>
                            <div class="date">1</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">2</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">3</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">4</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                    </ul> <!-- .movie-schedule -->
                </div>
                <div class="col-md-3">
                    <h2 class="section-title">Gba</h2>
                    <ul class="movie-schedule">
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                    </ul> <!-- .movie-schedule -->
                </div>
                <div class="col-md-3">
                    <h2 class="section-title">Sega</h2>
                    <ul class="movie-schedule">
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                        <li>
                            <div class="date">16/12</div>
                            <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                        </li>
                    </ul> <!-- .movie-schedule -->
                </div>
            </div>
        </div>
    </div> <!-- .container -->
</main>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            $('#pagination_link').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="{{ asset('/images/loading.gif')}}" />');

            var url = $(this).attr('href');  
            getArticles(url);
            window.history.pushState("", "", url);
        });

        function getArticles(url) {
            $.ajax({
                url : url  
            }).done(function (data) {
                $('.games').html(data);  
            }).fail(function () {
                alert('Games could not be loaded.');
            });
        }
    });
</script>
@include ('layouts.footer')
@endsection
