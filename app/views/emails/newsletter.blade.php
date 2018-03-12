<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        body {
            font-family: "Helvetica Neue", Arial, sans-serif;
        }
    </style>
</head>
<body>

<table style="width: 800px; border: none;" align="center">
    <tr>
        <td>
            <a href="{{ getenv('SECURE_URL') }}"><img src="{{ getenv('SECURE_URL') }}/assets/images/alantra-logo.png" alt="Logo" height="55" width="154"></a>
        </td>
        <td align="right">
            <a href="mailto:info@alantraleasing.com">info@alantraleasing.com</a>
            &bull;
            800-456-1800
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <hr>
        </td>
    </tr>
    @if(strlen($image) > 1)
    <tr>
        <td colspan="2">
            <img src="{{ getenv('SECURE_URL') . "/newsletter_images/" . $image }}">
        </td>
    </tr>
    @endif
    <tr>
        <td colspan="2">
            {{ $content }}
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <hr>
        </td>
    </tr>
    <tr style="background: silver;">
        <td colspan="2" align="center">
            <br />
            <span style="font-size: 10pt">
                New Brunswick &bull; Nova Scotial &bull; Prince Edward Island &bull; Newfoundland &amp; Labrador &bull; Quebec &bull; Ontario
                <a href="{{ getenv('SECUREURL') }}">www.alantraleasing.com</a><br />
                1-800-456-1800
                <a href="mailto:melissa@alantraleasing.com?subject=Unsubscribe">Click here to unsubscribe from our newsletter</a>
            </span>
            <br /><br />
        </td>
    </tr>
</table>

</body>
</html>