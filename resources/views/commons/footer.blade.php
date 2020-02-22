<footer>
    @if (Auth::check())
        <div id="footer_navi">
            <ul>
                <li>{!! link_to_route('commons.description', 'このサイトについて') !!}</li>
            </ul>
        </div>
    @endif
            <small>&copy; 2020 Connect.</small>
</footer>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">