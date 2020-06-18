<li class="{{request()->is('/')?'current-menu-item':''}}">
    <a href="{{url('/')}}">Home</a>
</li>
<li class="{{request()->is('how-it-works-page')?'current-menu-item':''}}">

    <a href="{{url('how-it-works')}}">How-it-works-page</a>
</li>
<li class="{{request()->is('reservation')?'current-menu-item':''}}">

    <a href="{{url('service')}}">Service</a>
</li>
<li class="{{request()->is('about')?'current-menu-item':''}}">

    <a href="{{url('about')}}">About</a>
</li>
<li class="{{request()->is('contact')?'current-menu-item':''}}">
    <a href="{{url('contact')}}">Contact</a>
</li>
