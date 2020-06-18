window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '552f47d5d4aeaf6a0cff',
    cluster: 'ap2',
    forceTLS: true,
});

// var alert_div = $('#alert-new-chat');
// var new_chat_link = $('#new-chat-link');
//
// var channel = window.Echo.private('my-channel');
// channel.listen('.my-event', function (data) {
//     var result = JSON.stringify(data);
//     new_chat_link.attr("href", window.origin + '/chat/' + data.data.chat_id);
//     alert_div.show();
//     console.log(data.data)
// });
