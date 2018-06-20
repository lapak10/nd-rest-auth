# ND Rest Auth (WordPress Plugin)

Enables token based authentication for your WordPress Rest APIs ( Including Custom EndPoints )

## Getting Started

This plugin gives your api a strong protection by adding a token based authentication system to wordpress.

### Prerequisites

As this is a WordPress based plugin, so you would need (you probably must be having already) a WordPress installation.


### Installing

Installing this plugin is simply straight forward

Login into your wp-admin with admin's account

```
Navigate to Plugins > Add New
```

```
Upload Plugin > Select this plugin's ZIP
```
```
Click Activate
```

End with an example of getting some data out of the system or using it for a little demo

## Endpoints for Tokens

To get a valid token, hit URL with POST

```
curl --header "Content-Type: application/json"   --data '

{"username":"imrokin","password":"imrokin"}'   

http://localhost/wp-json/rest_auth/login

```

which on success will return a JSON object like this
```
{"success":true,"user_login":"imrokin","user_id":2,"msg":"login ok","token":"Re7a7ZxWzg71U0INZ6RU5ErDcryGnXjVr9mTZlRWTyj"}
```

and simply to logout, 

```
curl --header "Content-Type: application/json"   --data '

{"user_id":"2","token":"Re7a7ZxWzg71U0INZ6RU5ErDcryGnXjVr9mTZlRWTyj"}'   

http://localhost/wp-json/rest_auth/logout

```

## Coding style

This plugin follows [WordPress PHP Coding Standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/)




## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to me.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Anand** - *Initial work* - [lapak10](https://github.com/lapak10)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

