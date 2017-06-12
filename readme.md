# LaraEventTickets: Laravel 5.4 based system for event organizers to manage and sell tickets.

It is a demo project for demonstrating what can be generated with [QuickAdminPanel](https://quickadminpanel.com) tool.
LaraEventTickets admin area is all generated with __QuickAdminPanel__, front-end is done with simple Bootstrap.

There is Stripe integrated into the system for payments, don't forget to configure your __.env__ file by addind STRIPE_KEY and STRIPE_SECRET (see __.env.example__ file).

![LaraEventTickets screenshot](http://webcoderpro.com/laraeventtickets-demo.png)

![LaraEventTickets screenshot2](http://webcoderpro.com/laraeventtickets-demo2.png)

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL. You can also login at __/login__ with default credentials __admin@admin.com__ - __password__

## License

Basically, feel free to use and re-use any way you want.

### Credits

This project is created by [David Lun](https://github.com/mc0de/).

