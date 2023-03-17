# Aparat API

Simple and smooth service for using <a href="https://www.aparat.com/api" target="_blank">aparat api</a>.

## Installation

### Getting

- Via composer

```
SOON
```

- Via Git

```
git clone https://github.com/im-javad/aparat-API.git
```

### Set the user name and pass of your aparat account in the `.env` file

```
APARAT_USERID = your user name
APARAT_PASS = sha1(MD5(your password))
```

## Usage

- Go to the public folder
- Start php server by running command

```
php artisan serve --host=localhost --port=80
```

- Open in browser http://localhost/

## APIs

- Getting the most viewed videos

```
http://localhost/popular-videos
```

- Login

```
http://localhost/login
```

- Delete video

```
http://localhost/delete?uid=videoUid
```

- Information of a video

```
http://localhost/video-information?uid=videoUid
```

- Upload video

```
-open Postman
-go to the Body>raw and choose json type and and placing =>
    {
      "filename": "video name in storage>app>public",
      "title": "your custom title",
      "category": categoryNum
    }
 -select the post method
 -define this route => http://localhost/upload
```
