@extends('vcms.base')

@section('content')
    <h1>Search Results</h1>
    @foreach ($results as $result)
        @if ((Session::get('lang') == 'en') || (Session::get('lang') == null))
            <div class="well">
                <h4><a href="/{{ $result->slug }}">{{ $result->page_title }}</a></h4>
                @if (strlen(strip_tags($result->page_content)) > 150)
                    {{ substr(strip_tags($result->page_content),0,149) }} ...
                @else
                    {{ strip_tags($result->page_content) }}
                @endif
            </div>
        @else
            <div class="well">
                <h4><a href="/{{ $result->slug }}">{{ $result->page_title_fr }}</a></h4>
                @if (strlen(strip_tags($result->page_content_fr)) > 150)
                    {{ substr(strip_tags($result->page_content_fr),0,149) }} ...
                @else
                    {{ strip_tags($result->page_content_Fr) }}
                @endif
            </div>

        @endif
    @endforeach
@stop