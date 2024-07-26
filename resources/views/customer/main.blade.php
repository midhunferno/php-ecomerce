<DOCTYPE html>
    <html lang="en">

    <head>

        @include('customer.layoute.header')

    </head>

    <body>
        @include('customer.layoute.nave')
        @if(url() == route('base'))
            @include('customer.banar')
        @endif

        <div style="margin-top: 200px;">
            @yield('content')
        </div>

        @include('customer.layoute.footer')

        @stack('script')

    </body>

    </html>
