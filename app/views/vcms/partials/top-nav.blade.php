<div id="header"><!-- class="sticky" for sticky menu -->

    <!-- Top Bar -->
    <header id="topBar">
        <div class="container">

            <div class="pull-right fsize13 margin-top10 hide_mobile">



                <!-- mail , phone -->
                <a href="mailto:info@alantraleasing.com">info@alantraleasing.com</a> &bull; 800-456-1800

                <div class="block text-right"><!-- social -->
                    <a href="https://twitter.com/AlantraLeasing" target="_blank"  class="social fa fa-twitter"></a>
                    <a href="https://www.facebook.com/alantratrailers" target="_blank"  class="social fa fa-facebook"></a>
                    <a href="https://www.linkedin.com/company/5065231" target="_blank" class="social fa fa-linkedin"></a>
                </div><!-- /social -->
                <br>
                @include('vcms::partials.language-menu')

            </div>

            <!-- Logo -->
            <a class="logo" href="/">
                <img src="/assets/images/alantra-logo.png" height="75" alt="" />
            </a>

        </div><!-- /.container -->
    </header>
    <!-- /Top Bar -->


    <!-- Top Nav -->
    <header id="topNav">
        <div class="container">

            <!-- Mobile Menu Button -->
            <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Search -->
            {{ Form::open(array('url' => '/search', 'method' => 'post', 'class' => 'search')) }}
            {{ Form::text('q', null, array('class' => 'form-control', 'placeholder' => 'Search...')) }}
            <button class="fa fa-search"></button>
            {{ Form::close() }}
            <!-- /Search -->

            <!-- Top Nav -->
            <div class="navbar-collapse nav-main-collapse collapse">
                <nav class="nav-main">

                    <ul id="topMain" class="nav nav-pills nav-main">
                        @if((Auth::check()) && (Auth::user()->access_level == 3))
                            @foreach((verilion\vcms\MenuItem::where('menu_id','=','1')
                                    ->orderBy('sort_order')
                                    ->remember(Config::get('vcms::cache_lifetime'))
                                    ->get()) as $item)
                                @if ($item->has_children == 0)
                                    @if ($item->active == 1)
                                        @if ($item->page_id == 0)
                                            <li>
                                                <a class='mitem' data-mitem-id="{{ $item->id }}" href='{{ $item->url }}'>
                                                    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                        {{ $item->menu_text_fr }}
                                                    @else
                                                        {{ $item->menu_text }}
                                                    @endif
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a class='mitem' data-mitem-id="{{ $item->id }}"
                                                   href='/{{ $item->targetPage->slug }}'>
                                                    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                        {{ $item->menu_text_fr }}
                                                    @else
                                                        {{ $item->menu_text }}
                                                    @endif
                                                </a>
                                            </li>
                                        @endif
                                    @else
                                        @if ($item->page_id == 0)
                                            <li>
                                                <a class='mitem' data-mitem-id="{{ $item->id }}"
                                                   href='{{ $item->url }}'>
                                                    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                        <em class="text-warning">{{ $item->menu_text_fr }}</em>
                                                    @else
                                                        <em class="text-warning">{{ $item->menu_text }}</em>
                                                    @endif
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a class='mitem' data-mitem-id="{{ $item->id }}"
                                                   href='/{{ $item->targetPage->slug }}'>
                                                    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                        <em class="text-warning">{{ $item->menu_text_fr }}</em>
                                                    @else
                                                        <em class="text-warning">{{ $item->menu_text }}</em>
                                                    @endif
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                @else
                                    @if ($item->active == 1)
                                        <li class="dropdown">
                                            <a href="#"
                                               class="mitem dropdown-toggle"
                                               data-mitem-id="{{ $item->id }}"
                                               data-toggle="dropdown" role="button" aria-expanded="false">
                                                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                    {{ $item->menu_text_fr }}
                                                @else
                                                    {{ $item->menu_text }}
                                                @endif
                                                
                                            </a>
                                    @else
                                        <li class="dropdown">
                                            <a href="#"
                                               class="mitem dropdown-toggle"
                                               data-mitem-id="{{ $item->id }}"
                                               data-toggle="dropdown" role="button" aria-expanded="false">
                                                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                    <em class="text-warning">{{ $item->menu_text_fr }}</em>
                                                @else
                                                    <em class="text-warning">{{ $item->menu_text }}</em>
                                                @endif
                                                
                                            </a>
                                            @endif
                                            <ul class="dropdown-menu" role="menu">
                                                @foreach ($item->dropdownItems as $dd)
                                                    @if ($dd->active == 1)
                                                        @if ($dd->page_id == 0)
                                                            <li><a class='ddmitem' data-ddmitem-id="{{ $dd->id }}"
                                                                   data-mitem-id="{{ $item->id }}"
                                                                   href="{{ $dd->url }}">
                                                                    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                        {{ $dd->menu_text_fr }}
                                                                    @else
                                                                        {{ $dd->menu_text }}
                                                                    @endif
                                                                </a></li>
                                                        @else
                                                            <li><a class='ddmitem' data-ddmitem-id="{{ $dd->id }}"
                                                                   data-mitem-id="{{ $item->id }}"
                                                                   href="/{{ $dd->targetPage->slug }}">
                                                                    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                        {{ $dd->menu_text_fr }}
                                                                    @else
                                                                        {{ $dd->menu_text }}
                                                                    @endif
                                                                </a></li>
                                                        @endif
                                                    @else
                                                        @if ($dd->page_id == 0)
                                                            <li><a class="ddmitem" data-ddmitem-id="{{ $dd->id }}"
                                                                   data-mitem-id="{{ $item->id }}"
                                                                   href="{{ $dd->url }}">
                                                                    <em class='text-warning'>
                                                                        @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                            {{ $dd->menu_text_fr }}
                                                                        @else
                                                                            {{ $dd->menu_text }}
                                                                        @endif
                                                                    </em>
                                                                </a></li>
                                                        @else
                                                            <li><a class="ddmitem" data-ddmitem-id="{{ $dd->id }}"
                                                                   data-mitem-id="{{ $item->id }}"
                                                                   href="/{{ $dd->targetPage->slug }}">
                                                                    <em class='text-warning'>
                                                                        @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                            {{ $dd->menu_text_fr }}
                                                                        @else
                                                                            {{ $dd->menu_text }}
                                                                        @endif
                                                                    </em>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                <li><a href='#' onclick="addDDMenuItem({{ $item->id }})">[Add item]</a></li>
                                            </ul>
                                            @endif
                                            @endforeach
                                            @else
                                                @foreach((verilion\vcms\MenuItem::where('menu_id','=','1')
                                                        ->where('active','=','1')
                                                        ->orderBy('sort_order')
                                                        ->remember(Config::get('vcms::cache_lifetime'))
                                                        ->get()) as $item)
                                                    @if ($item->has_children == 0)
                                                        @if ($item->page_id == 0)
                                        <li>
                                            <a href='{{ $item->url }}'>
                                                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                    {{ $item->menu_text_fr }}
                                                @else
                                                    {{ $item->menu_text }}
                                                @endif
                                            </a>
                                        </li>
                                        @else
                                            <li>
                                                <a href='/{{ $item->targetPage->slug }}'>
                                                    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                        {{ $item->menu_text_fr }}
                                                    @else
                                                        {{ $item->menu_text }}
                                                    @endif
                                                </a>
                                            </li>
                                        @endif
                                        @else
                                            <li class="dropdown">
                                                <a href="#"
                                                   class="dropdown-toggle"
                                                   data-toggle="dropdown" role="button" aria-expanded="false">
                                                    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                        {{ $item->menu_text_fr }}
                                                    @else
                                                        {{ $item->menu_text }}
                                                    @endif
                                                    
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    @foreach ($item->dropdownItems as $dd)
                                                        @if ($dd->active == 1)
                                                            @if ($dd->page_id == 0)
                                                                <li><a href="{{ $dd->url }}">
                                                                        @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                            {{ $dd->menu_text_fr }}
                                                                        @else
                                                                            {{ $dd->menu_text }}
                                                                        @endif
                                                                    </a></li>
                                                            @else
                                                                <li><a href="/{{ $dd->targetPage->slug }}">
                                                                        @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                            {{ $dd->menu_text_fr }}
                                                                        @else
                                                                            {{ $dd->menu_text }}
                                                                        @endif
                                                                    </a></li>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                @endif
                                                @endforeach
                                                @endif

                                                @if((Auth::check()) && (Auth::user()->access_level == 3))
                                            <li class="dropdown">
                                                <a href="#"
                                                   class="dropdown-toggle"
                                                   data-toggle="dropdown" role="button" aria-expanded="false">
                                                    <i class="fa fa-wrench"></i>
                                                    
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="/admin/dashboard">Dashboard</a></li>
                                                    @if ((Auth::user()) && ((Auth::user()->hasRole('pages')) || (Auth::user()->hasRole('blogs'))
                                                        || (Auth::user()->hasRole('news'))))
                                                        <li><a href="#!" class="menu-item" onclick="makePageEditable(this)">Edit
                                                                page</a></li>
                                                    @endif
                                                    @if ((Auth::user()) && (Auth::user()->hasRole('pages')))
                                                        <li><a href="/admin/page/page?id=0">Add Page</a></li>
                                                    @endif
                                                    @if ((Auth::user()) && (Auth::user()->hasRole('menus')))
                                                        <li><a href="#!" onclick="addMenuItem()">Add Menu Item</a></li>
                                                    @endif
                                                    {{--@if ((Auth::user()) && (Auth::user()->hasRole('calendars')))--}}
                                                        {{--<li><a href="/events/calendar">Add Calendar Event</a></li>--}}
                                                    {{--@endif--}}
                                                    {{--@if ((Auth::user()) && (Auth::user()->hasRole('galleries')))--}}
                                                        {{--<li><a href="#!">Add Gallery Image</a></li>--}}
                                                    {{--@endif--}}
                                                    <li><a href="/admin/logout">Logout</a></li>
                                                </ul>
                                            </li>
                                            @endif

                    </ul>

                </nav>
            </div>
            <!-- /Top Nav -->

        </div><!-- /.container -->
    </header>
    <!-- /Top Nav -->

</div>