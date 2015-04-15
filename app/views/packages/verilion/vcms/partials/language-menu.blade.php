@if (Config::get('vcms::use_french'))
    <span style="padding: 2px; padding-top: 11px;">
        &nbsp;&nbsp;<a class="btn btn-xs btn-primary" style="color: white" href="{{ Lang::get('vcms::menu.lang') }}&amp;url={{ URL::current() }}" style="color: black;">
        {{ Lang::get('vcms::menu.language_switch') }}
        </a>
    </span>
@endif