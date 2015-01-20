@if ((Auth::user()) && (Auth::user()->hasRole('pages')))
    <h2>
    <article style='width: 100%; display: inline'>
        <span id="editablecontenttitle" class="editablecontenttitle">{{ $page_title }}</span>
    </article>
    </h2>
    @else
    <h2>{{ $page_title }}</h2>
@endif