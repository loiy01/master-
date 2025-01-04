<!DOCTYPE html>
<html lang="en">
@include("auth.user.partials.header")


<body>
    <div class="images">
    @include("auth.user.partials.navbar")
    </div>
    @yield('content')
    @include("auth.user.partials.footer")
</body>
</html>