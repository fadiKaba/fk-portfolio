window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

 import Echo from 'laravel-echo';

 window.Pusher = require('pusher-js');

 Pusher.logToConsole = true;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'd4fd417b7e3040ccb4d1',
    cluster: 'mt1',
    encrypted: true
});

// window.Echo.channel('green')
// .listen('MessengerEvent', (e)=>{
//     console.log(e)
// })

// window.Echo.listen('green', 'messenger-event', (e) => {
//     console.log(e);
//     console.log(e);
// });

var pusher = new Pusher('d4fd417b7e3040ccb4d1', {
    cluster: 'mt1',
    forceTLS: true
  });

var channel = pusher.subscribe('green');
channel.bind('MessengerEvent', function(data) {
  console.log(data);
});