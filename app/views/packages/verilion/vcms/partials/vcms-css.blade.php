@if ((Auth::check()) && (Auth::user()->access_level == 3))
<link rel="stylesheet" href="/packages/verilion/vcms/js/contextmenu/jquery.contextMenu.css" type="text/css" media="screen">
<link rel="stylesheet" href="/packages/verilion/vcms/css/admin.css">
@endif
<link rel="stylesheet" href="/packages/verilion/vcms/css/vcms.css">
<link rel="stylesheet" href="/packages/verilion/vcms/css/datepicker.css">
<link rel="stylesheet" href="/packages/verilion/vcms/fullcal/fullcalendar.min.css">
<link rel="stylesheet" href="/packages/verilion/vcms/css/pnotify.custom.min.css">
<style>
    .admin-hidden {
        display: none;
    }
</style>
