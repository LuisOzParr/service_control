# Live demo

http://service-control.herokuapp.com/

http://service-control.herokuapp.com/api/users

# Installation

1. Run  `composer install`.

2. Rename `.env.example` to `.env` and configure environment variables.

3. Use this command `php artisan key:generate` to generate APP_KEY.

4. Create new db and config environment variables. Example:
    
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=homestead
        DB_USERNAME=homestead
        DB_PASSWORD=secret
    
5. Run `php artisan migrate --seed`.

6. Now run `php artisan serv` to run server. 

7. Run `php artisan passport:install` to create oauth keys to passport.

# Features

1. Login / Register
2. Services
3. Roles (Users and admins)
    * Users: can register services
    * Admins: can banner users
4. Users endpoint that include services by users (`http://localhos/api/users`)
5. Passport (OAuth2)

# Passport features
### Register `/api/register`

#### Petition HTTP
Method: POST
Headers:
 * Accept: application/json
 
#### Parameters
* name (string)
* email (string)
* age (int)
* gender (enum:male|female|other)
* password (string)
* password_confirmation (string)

#### Response

Success:
```
{
    "data": {
        "user": {
            "id": 6,
            "name": "Luis Ozuna",
            "email": "lgozuna@gmail.com",
            "rol_id": null
        },
        "tokens": {
            "auth": {
                "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImM4OTM0OTZiZmU0OTNlODRmYmMyYTA3YzIxMjEzNjg3MmFjMDQwZDQ5Y2VmYzllMDQ5YjQxMTQyNjQwMGI2OGIzODVkZTVmNWYyNDI0ZGQ3In0.eyJhdWQiOiIyIiwianRpIjoiYzg5MzQ5NmJmZTQ5M2U4NGZiYzJhMDdjMjEyMTM2ODcyYWMwNDBkNDljZWZjOWUwNDliNDExNDI2NDAwYjY4YjM4NWRlNWY1ZjI0MjRkZDciLCJpYXQiOjE1OTY4NDUyOTcsIm5iZiI6MTU5Njg0NTI5NywiZXhwIjoxNjI4MzgxMjk3LCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.djOSOTGx-iNdklRHyeMi4Jklfv4DihEm4eeq_A6F5TNfYSeUeyai6QsoCRotaZ0H1DxlmEVUHI2IIvg1KP21Dd0Otlje65CmOQYr_fkO9bhFpVxVkddjBI7ah1VlZI7zTbEvHaY_aKR3N1uv_tOWSAt561J65zlhOWFRNXwYPY6G0rIxaDr-RJsehJ0jw9LOoILQyVqvEA3iTINDaxK-S3rtJAKPj_LiJslTz5_RtkMW7kaIhMXRl92HI1aD-AtuB27E8GB_rwPZn9jh6OnhYBnunb_VG3EMbIVL1misNuPdxixj30MF2Af9mk4xnf8dsk1iXQ5RaYvNYaDKKKqxh-uS9SrZm1KGs3HsgdJVA9mZm823kDD9tMF6RD5QYW2YywTUlk_JlLrIXutKIUjP8RuEc4RWnhL1Ltp_kZywFPLYHsigJxe2ZTMqQaK_cCeLQVT6a_-7K5I53kpRrSHNgGIna0E0AEJH0rWDNM-ZwONz_K2e6eQpxm7TYx8HiepyjMYCfae0t77aGAdzWlQ_hhUPLhFnXNIxAeFEMEr3TVtVsjA4vh9shnde1GCgUBHtQlzZ9_3TYahV68dEFwaM1yTbUv8EyY0iV1kvP47ea6CMJjwzbp4rpuK-gkf-AwR5yoDcI-Xas2ThHWXDKOoS8sUJSYrjYYM6xoUpmb3VsXU",
                "refresh_token": "def502001eacedb12865651a77a3df54a4822bc38af76df69c022e5b8ca9759aba1ecd63b3d6e3a6be8bc49798d5ddc2654019386e990755710c04f4160c1614ad1ca1554572b2c2881975493b969e1ac4a5d27ba3818c891b9cd0698a9965927d175510a274eec4283352dd2ff9dfc2a2bcc38d42584fcff3da315980cb56ef2d8b0133062d4b929d4c108a7ac39fb7a279d2e3ba552313d9ea5e25958d84ac0378bfe1796ee51458007fc78d16f1d70718b6a0e37ef599e42691c4174a59d67849df2542ca6be5dcc56b0c6199035d409bb28c9d7fddc6f8b6b4eb6822208859a09c9d020c6e04572879659f96c1387666d118abd8a2dd2b8506107bdda83690c69bbcdebaefba85fbedecd2b94ea29275c7ceff1e572cccf238409606cae3a9984bdb90a67f8b4fedd602ed4e1188f44fa599467f0a9115451705f953f243786eb30689e1caae31b464714e89dd0204e1e03316a3ad22dbdd271f42cd400751",
                "expires_in": 31536000
            }
        }
    }
}
```

### Login `/api/login`

#### Petition HTTP
Method: POST
Headers:
 * Accept: application/json
 
#### Parameters
* email (string)
* password (string)

#### Response

Success:
```
{
    "data": {
        "user": {
            "id": 6,
            "name": "Luis Ozuna",
            "email": "lgozuna@gmail.com",
            "rol_id": 1
        },
        "tokens": {
            "auth": {
                "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJhNWEzNzFlZTkwNWMwOGU4ZjU0NWZlOGIxOGUyMjEyNjI4NDhjZDljZmE0YTE4MTkzYjA4NTRlNjU5ZDI2NzdhMmNkYWMwMDRmZGFmZTA4In0.eyJhdWQiOiIyIiwianRpIjoiMmE1YTM3MWVlOTA1YzA4ZThmNTQ1ZmU4YjE4ZTIyMTI2Mjg0OGNkOWNmYTRhMTgxOTNiMDg1NGU2NTlkMjY3N2EyY2RhYzAwNGZkYWZlMDgiLCJpYXQiOjE1OTY4NDYzNTMsIm5iZiI6MTU5Njg0NjM1MywiZXhwIjoxNjI4MzgyMzUzLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.joWemjBiIKPMmoGngNQ03hIPi50ZBYqjK10rSnFwRbOR4HN1I6z9_aQTrXCInRn8ucffyw-hGoNUynoBMGu21Pf45kbuLhHAxapyy3IVLofqsxfbslD2gGvsTdbGJuzGsPvi5AlH1coUQ-_lsW1iAoXKjvRFLIH3D8ppIxQXf1pOLD6CQeGdTt3954m5uE9sWtagC_vwQ1vET0SB0UVrviv5jX-65FguyR33Q1dcXWd-XhqwFU5P-5A3jPeJ8FEl3oKVzAP3RHsoMwS2GVApUk4IrLNpDm_LlSMnmrsfejbXoeR2aeWdtnlG7hGGJzRGIC3-opP5DZw7F2B2kHtg_MeNOZuyESjCTMYz6gc4tbBKXlrCI0MCaKAudGNsAka57UAdcO3zO2XLLwdSoRSl2BE_rJphaN_zd-CPnbwAXPDlpHWQZj-b1rywCzE6NpNlBcxeHb14LGWB9M1Xa6eOij8VLSiZjF_UeGHgGTTeNoCGjp6-NDCZm5StcDOy3wFzNCcLwLwij63vhUF0XbSgRaiqhUUM18n95s7XdRP5xI4G1RdyHylKe6urC4_tN-keEZmASGDxrE2nHWsAs03a8fXyIVNDKBYs--5Yn2iyxB1jJ9ua4BX5Br35YavMpRQIPWIv6mSrNlD62m8Nw6TOBDAWaE86xduCalqJh7IAdGM",
                "refresh_token": "def5020098b1a89d44d2879310f5566468746b04c976bc19db8c798a462089433a3e4b3ec4e04f7df30ea6ebc0775d59745be780b252a9ee42db095279ed4240c84cff110574fe5e553f066ba752ff4f98bb2d0c2e6f6d61cce39ee8ba56b88607e2e5cc1978c72c0c417471c5780e0d4aa47b9a6366af2db93f6c50a73d00823f78a10f0dda293725af3c86d542f865377e1a3bf81da9f6a1b81d681dc5651753b48b962e4695dbc76dfba4fe3eadfc6e6f7ad3b1a6e44549a0497b344248c173cc17f03ff4234cc6e93c39f524da537b78b934db571178a3a4a56332eb2726ef5266627127466499fc9ec1a76426660f08406e054e0c93f91beb31f7693b1034306b88e852a731391d87b1b0fe00d7de6ee501790ecdfaf2bf57973bc117d08321801cf291abca863d88f9a17e522a2e77220c372483dc20283c247248644f028efee1274ae16b1b8c676e9d52c3341b182cc30f1688d0ee36e12b5ccba73f8d",
                "expires_in": 31536000
            }
        }
    }
}
```

### SignOut `/api/sign-out`

#### Petition HTTP
Method: POST
Headers:
 * Accept: application/json
 * Authorization: Bearer {Here add access_token}

#### Response

Success:
```
{
    "status": "OK",
    "message": "Se cerro sección correctamente"
}
```

### TestAuthenticated `/api/test-authenticated`

#### Petition HTTP
Method: POST
Headers:
 * Accept: application/json
 * Authorization: Bearer {Here add access_token}

#### Response

Success:
```
{
    "status": "OK",
    "message": "Authenticated"
}
```

Error:

```
{
    "message": "Unauthenticated."
}
```

