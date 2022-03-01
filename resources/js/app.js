require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Echo.private(`App.Models.User.${userId}`)
        .notification((data) => {
            alert(data.title)
            //$('#ordersTable').append(data.title);
        })
