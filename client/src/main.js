// ----------------------------------------------------------------------------
// The Vue build version to load with the `import` commands
import Vue       from "vue";
import App       from "./App";
import router    from "./router";
import store     from "./store";
import moment    from "moment";
import VueI18n   from 'vue-i18n'
import VueHead   from 'vue-head'

// ----------------------------------------------------------------------------
// Plugin imports
import VueSweetalert2 from "vue-sweetalert2";

// ----------------------------------------------------------------------------
// Stylesheets
import "bootswatch/dist/simplex/bootstrap.css";
import "font-awesome/css/font-awesome.min.css";
import "animate.css/animate.min.css";
import "devicons/css/devicons.css";

// ----------------------------------------------------------------------------
// Javascript
import "jquery/dist/jquery.min.js";
import "popper.js/dist/popper.min.js";
import "bootstrap/dist/js/bootstrap.min.js";
import "./plugins/axios.js";
import './registerServiceWorker.js';

// ----------------------------------------------------------------------------
// Vue Plugins
require('dotenv').config();
Vue.use(VueHead);
Vue.use(VueI18n);

// ----------------------------------------------------------------------------
// App Configuration
Vue.config.productionTip = false;

// ----------------------------------------------------------------------------
// MomentJS library
Vue.prototype.moment = moment;

// ----------------------------------------------------------------------------
// Axios HTTP configuration
import axios from "axios";
Vue.prototype.$http = axios.create({
  baseURL: 'http://fabapp/index.php/api/'
});

// ----------------------------------------------------------------------------
// Simple audio notification player
import successSound from './assets/mp3/success.mp3';
import failureSound from './assets/mp3/failure.mp3';
Vue.prototype.$audio = (type) => {

  switch (type) {
    // Upon Success
    case 'success':
      var audio = new Audio(successSound);
      audio.play();
      break;

    // Upon Failure
    case 'error':
      var audio = new Audio(failureSound);
      audio.play();
      break;

    // By Default
    default:
      var audio = new Audio(successSound);
      audio.play();
      break;
  }
};

// ----------------------------------------------------------------------------
// i118n Translations
import langFile  from './language/translations';
const i18n = new VueI18n({
  locale:         'en',
  fallbackLocale: 'en',
  messages:       langFile
});

// ----------------------------------------------------------------------------
// Vue HTML to Paper for per-element printing
import VueHtmlToPaper from 'vue-html-to-paper';
const printOptions = {
  name: '_blank',
  specs: [
    'fullscreen=no',
    'titlebar=no',
    'scrollbars=no'
  ],
  styles: [
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
  ]
};
Vue.use(VueHtmlToPaper, printOptions);

// ----------------------------------------------------------------------------
// Vue SweetAlert2
const swalOptions = {
  confirmButtonColor: '#408040',
  cancelButtonColor:  '#ad462e'
};
Vue.use(VueSweetalert2, swalOptions);

// ----------------------------------------------------------------------------
// App Instance
new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount("#app");

// ----------------------------------------------------------------------------
// ...
