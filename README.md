<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Robusta-Competiton
This application where an administrator can use it to see how much money that company needs to pay for its employees as salaries and bonuses and can also see when is the due date for that payment

## Getting Started
- This company is handling their sales payroll in the following way,Employees get a monthly fixed base salary and a monthly bonus(calculated as 10% of the base salary as default).
- The base salaries are paid on the last day of the month unless that day is a Friday or a Saturday (weekend) -> payday will be the last weekday before the last day of the month.
- On the 15th of every month bonuses are paid for the previous month, unless that day is a weekend. In that case: they are paid on the first Thursday after the 15th.

## Running Instructions 
The project is a laravel project implemented with a docker image containing ngnix and mysql, Inorder to run the project:

- Clone this git repo.
- Run ```cd Robusta-Competiton```.
- Inside docker-compose.yml update the values for MYSQL_DATABASE and MYSQL_ROOT_PASSWORD.
- Run ```cp .env.example .env``` to create an env file.
- Run ```nano .env``` and inside add these variables
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=laraveluser
    DB_PASSWORD=your_laravel_db_password
    JWT_SECRET=GNG6nOwUJZctoqXHEGu4KETBmyRh2iCEftWhvgp71VCdhi6azFI0uuxEDC630nhL
- Run ```docker-compose up -d```.

## EndPoints

- All endponts are secured using JWT.
- The admins can login using email and password through http://127.0.0.1:8000/api/admin/login [POST] / this route would return JWT token of the login. 
- The admins can register using email and password through http://127.0.0.1:8000/api/admin/logout [POST] / this route would return admin and succesfull registeration message.
- The admins can logout through http://127.0.0.1:8000/api/admin/logout [POST].
- The admins can view salaries using month and year through http://127.0.0.1:8000/api/admin/salaries [POST] / and the response would be 
    {Month: ‘Jan’,Salaries_payment_day: 30,Bonus_payment_day: 15,Salaries_total: $20000,Bonus_total: $2000,Payments_total: $22000}
    
## Ports 
- Mysql : 3306.
- Nginx : 81.
- Laravel : 8080.


