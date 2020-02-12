@php
$api = App::make('chat-api');
$qrcode = $api->getQrCode();
@endphp

<img src="{{$qrcode}}" alt="">