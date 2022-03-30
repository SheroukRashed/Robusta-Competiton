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
- Laravel : 8000.

