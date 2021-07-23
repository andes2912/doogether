## Test Backend Doogether 
### Fitur
- Login
- Register
- Logout
- Refresh Token
- Profile
- List Session
- Create Session
- Detail Session
- Update Session
- Delete Session

### How to install this project ?
```bash
# install dependencies
$ composer install

# setting .env
$ php artisan cp .env.example .env

# generate key
$ php artisan key:generate

# run server
$ php artisan serve
```

## REQUEST
```bash
# Request Login
http://127.0.0.1:8000/api/auth/login

Parameter : 
- email 
- password

Method : 
- POST
```

```bash
# Request Register
http://127.0.0.1:8000/api/auth/register

Parameter : 
- name
- email 
- password
- password_confirmation

Method : 
- POST
```

```bash
# Request Profile
http://127.0.0.1:8000/api/auth/profile

Headers :
- Authorzation => Bearer Token

Method : 
- GET
```

```bash
# Request List Session
http://127.0.0.1:8000/api/session/

Headers :
- Authorzation => Bearer Token

Method : 
- GET
```

```bash
# Request Detail Session
http://127.0.0.1:8000/api/session/{id}

Headers :
- Authorzation => Bearer Token

Method : 
- GET
```

```bash
# Request Create Session
http://127.0.0.1:8000/api/session/

Headers :
- Authorzation => Bearer Token

Params :
- name
- description
- duration
- start

Method : 
- POST
```

```bash
# Request Update Session
http://127.0.0.1:8000/api/session/{id}

Headers :
- Authorzation => Bearer Token

Params :
- name
- description
- duration
- start

Method : 
- PUT
```


```bash
# Request Delete Session
http://127.0.0.1:8000/api/session/{id}

Headers :
- Authorzation => Bearer Token

Method : 
- DELETE
```


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
