
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Bootstrap
 |--------------------------------------------------------------------------
 |
 | First, we will load all of the "core" dependencies for Spark which are
 | libraries such as Vue and jQuery. This also loads the Spark helpers
 | for things such as HTTP calls, forms, and form validation errors.
 |
 | Next, we'll create the root Vue application for Spark. This will start
 | the entire application and attach it to the DOM. Of course, you may
 | customize this script as you desire and load your own components.
 |
 */

require('spark-bootstrap');
require('./components/bootstrap');
Vue.use(require('vue-moment'));

import quoteDetails from './quotes/Details.vue';
Vue.component('quote', quoteDetails);

import Sidebar from './components/Sidebar.vue';
Vue.component('Sidebar', Sidebar);

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import router from './routes.js'

// original compontent constructor
var app = new Vue({
    mixins: [require('spark')],
    router,
});

// component constructor for vue-router
// var app = Vue.extend({
//  mixins: [require('./spark-with-vue-router')]
// });
