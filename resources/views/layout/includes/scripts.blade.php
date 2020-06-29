<!-- JS
============================================ -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- Modernizer JS -->
<script src="{{asset('/')}}assets/js/vendor/modernizr.min.js"></script>
<!-- jQuery JS -->
<!-- Bootstrap JS -->
<script src="{{asset('/')}}assets/js/vendor/bootstrap.min.js"></script>
<script src="{{asset('/')}}assets/js/vendor/stellar.js"></script>
<script src="{{asset('/')}}assets/js/vendor/particles.js"></script>
<script src="{{asset('/')}}assets/js/vendor/masonry.js"></script>
<script src="{{asset('/')}}assets/js/vendor/stickysidebar.js"></script>
<script src="{{asset('/')}}assets/js/plugins/plugins.min.js"></script>
<!-- Main JS -->
<script src="{{asset('/')}}assets/js/main.js"></script>


<script>
    particlesJS('particles-js',

        {
            "particles": {
                "number": {
                    "value": 50,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 4
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 4,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true,
            "config_demo": {
                "hide_card": false,
                "background_color": "#b61924",
                "background_image": "",
                "background_position": "50% 50%",
                "background_repeat": "no-repeat",
                "background_size": "cover"
            }
        }

    );
</script>


<script !src="">


{{--    ion.sound({--}}
{{--        sounds: [--}}
{{--            {name: "beer_can_opening"},--}}
{{--            {name: "bell_ring"}--}}
{{--        ],--}}
{{--        path: "{{asset('sounds')}}/",--}}
{{--        preload: true,--}}
{{--        volume: 1.0--}}
{{--    });--}}

{{--function messageAlert() {--}}
{{--    ion.sound.play("bell_ring");--}}

{{--}--}}

{{--function chatAlert() {--}}
{{--    ion.sound.play("bell_ring");--}}

{{--}--}}

</script>
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="{{asset('/')}}app-assets/js/app.js"></script>

<!-- Insert this line after script imports -->
<script>if (window.module) module = window.module;</script>
