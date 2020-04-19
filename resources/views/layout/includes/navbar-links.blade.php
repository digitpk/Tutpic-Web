<li class="{{request()->is('/')?'current-menu-item':''}}">
    <a href="{{url('/')}}">Home</a>
</li>
<li class="{{request()->is('about')?'current-menu-item':''}}">

    <a href="{{url('about')}}">About</a>
</li>
<li class="{{request()->is('menu')?'current-menu-item':''}}">

    <a href="{{url('menu')}}">Menu</a>
</li>
<li class="{{request()->is('reservation')?'current-menu-item':''}}">

    <a href="{{url('reservation')}}">Reservations</a>
</li>
<li class="{{request()->is('catering')?'current-menu-item':''}}">

    <a href="{{url('catering')}}">Catering</a>
</li>
<li class="{{request()->is('gallery')?'current-menu-item':''}}">

    <a href="{{url('gallery')}}">Gallery</a>
</li>
<li class="{{request()->is('contact')?'current-menu-item':''}}">
    <a href="{{url('contact')}}">Contact</a>
</li>
