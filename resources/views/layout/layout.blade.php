@include('layout.header')

<div class="main">
    <div class="sidebar">
        @section('sidebar')
        @show
    </div>
    <div class="content">
        @yield('content')
    </div>
</div>
@include('layout.message')
