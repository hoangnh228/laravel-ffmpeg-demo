<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FFMpeg Encrypted HLS | Protone Media</title>

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl w-full mx-auto sm:px-6 lg:px-8">
                <video-js id="my_video_1" class="vjs-default-skin vjs-big-play-centered" controls preload="auto" data-setup='{"fluid": true}'>
                    {{-- <source src="/storage/videos/redfield.m3u8" type="application/x-mpegURL"> --}}
                    <source src="https://befeed.s3.ap-southeast-1.amazonaws.com/videos/streaming/117_1610944938_gJ15yIYJzkw2h8UJ/117_1610944938_gJ15yIYJzkw2h8UJ.m3u8?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIA6JU3EHGS4IBLLE6D/20210118/ap-southeast-1/s3/aws4_request&X-Amz-Date=20210118T045248Z&X-Amz-Expires=3600&X-Amz-SignedHeaders=host&X-Amz-Signature=71b59e771446abb76f08386160e77be5f6847783fdc95a1c6aad074024b04558" type="application/x-mpegURL">
                </video-js>

                <script src="https://unpkg.com/video.js/dist/video.js"></script>
                <script src="https://unpkg.com/@videojs/http-streaming/dist/videojs-http-streaming.js"></script>

                <script>
                    var player = videojs('my_video_1');
                </script>
            </div>
        </div>
    </body>
</html>
