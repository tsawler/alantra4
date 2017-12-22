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
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1064340703677336');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1"
         src="https://www.facebook.com/tr?id=1064340703677336&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
