@if ((Auth::user()) && (Auth::user()->hasRole('pages')))
    <h1>
    <article style='width: 100%; display: inline'>
        <span id="editablecontenttitle" class="editablecontenttitle">{{ $page_title }}</span>
    </article>
    </h1>
    @else
    <h1>{{ $page_title }}</h1>
@endif