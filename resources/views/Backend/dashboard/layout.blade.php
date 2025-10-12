<!DOCTYPE html>
<html>

<head>
   @include('Backend.dashboard.component.head')
</head>

<body>
    <div id="wrapper">
            @include('Backend.dashboard.component.sidebar')

        <div id="page-wrapper" class="gray-bg">
            @include('Backend.dashboard.component.nav')
            @include($template)
            @include('Backend.dashboard.component.footer')
        </div>
    </div>
    @include('Backend.dashboard.component.script')
</body>
</html>
