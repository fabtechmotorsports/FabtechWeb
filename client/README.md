# Fabtech Client APP
This is the Boilerplate for the VueJS based PWA (Progressive Web Application) for Fabtech Motorsports. 
This project had stemmed from the  need to separate the [server side](https://github.com/jason-napolitano/FabtechWeb/tree/master/server) API written in PHP from the client 
side application written in Javascript, HTML and CSS. I was using view templates in PHP via MVC using the 
PHP framework CodeIgniter and had noticed that in order to interact with the REST API controllers, there 
was a lot of repetition in the javascript code, tons of jQuery events all over the place, and callback hell 
was inevitable. In hindsight, it was a nightmare.

I had been curious of VueJS for quite some time as well as other frontend frameworks. I truly did not want 
the overhead and complexity of Angular and I am not the most fond of the JSX format of React. So VueJS was a 
sure bet for me. 

Now, I am a PHP API developer by nature and learning all of this Javascript has been interesting. However 
since I've been looking at VueJS and I haven't played around with it since give-or-take 2015 and kind of 
stopped using it, I wanted to give it another go. With the releases of VueCLI 3 and VueUI I have fallen in 
love. Simply because it is beautiful. I can now see the huge benefits of porting all client logic from the 
view layer of the MVC based project over to VueJS and keeping the API to itself (trying to achieve a twelve 
factor app as well). So far, it has been a great idea and smooth transition. This is the boilerplate for the 
beginning of that awesome adventure!

## Useful Links
 - [12 Factor Apps Main Page](https://12factor.net/)
 - [12 Factor Apps in Plain English](http://www.clearlytech.com/2014/01/04/12-factor-apps-plain-english/)
 - [Progressive Web Applications](https://ionicframework.com/docs/developer-resources/progressive-web-apps/)
 - [VueJS Documentation Homepage](https://vuejs.org/v2/guide/)


## Requirements
 - [NodeJS](https://nodejs.org/en/)
 - [VueCLI](https://cli.vuejs.org/)
 - [VueJS](https://vuejs.org/)
 - [Backend API](https://github.com/jason-napolitano/FabtechWeb/tree/master/server)

## Dependencies
 - [Vue Router](https://router.vuejs.org/)
 - [Vuex](https://vuex.vuejs.org/)
 - [Dotenv](https://www.npmjs.com/package/dotenv)
 - [Bootstrap 4](http://getbootstrap.com)
 - [Bootswatch](https://bootswatch.com/)
 - [Bootstrap-Vue](https://bootstrap-vue.js.org/)
 - [Popper.JS](https://popper.js.org/)
 - [Axios](https://www.npmjs.com/package/axios)
 - [jQuery (for bootstrap JS)](https://jquery.com/)
 - [Sweet Alerts 2](https://sweetalert2.github.io/)
 - [Moment.JS](https://momentjs.com/)
 - [animate.css](https://daneden.github.io/animate.css/)
 - [Font Awesome 4.7](https://fontawesome.com/)
 - [nProgress](https://www.npmjs.com/package/vue-nprogress)
 - [Google Fonts Raleway](https://fonts.google.com/specimen/Raleway)
 - [Devicon Icons](http://konpa.github.io/devicon/)

## Project setup
### Install Dependencies
```
$ cd /path/to/FabtechWeb/client
$ npm install
```

### Compiles and hot-reloads for development
```
$ cd /path/to/FabtechWeb/client
$ npm run serve
```

### Compiles and minifies for production
```
$ cd /path/to/FabtechWeb/client
$ npm run build
```

### Lints and fixes files
```
$ cd /path/to/FabtechWeb/client
$ npm run lint
```

### Environment Config
Rename `env.example` to `.env`
