
require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue';
// import BootstrapVue from 'bootstrap-vue'

// Vue.use(BootstrapVue)

// editor support
import 'v-markdown-editor/dist/index.css';

import Editor from 'v-markdown-editor'
Vue.use(Editor);
// Support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
)
//support moment js
import {filter} from './filter'

//

// vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes';

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('admin-main', require('./components/admin/AdminMaster.vue'));
Vue.component('home-main', require('./components/public/PublicMaster.vue'));
Vue.component('navbar-component', require('./components/Navbar.vue'));

// V-form
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;
// Sweet alert 2
import swal from 'sweetalert2'
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
import "chart.js";
import "hchs-vue-charts";
Vue.use(window.VueCharts);

window.toast = toast

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'hash',

})

import VueProgressBar from 'vue-progressbar'
const options = {
    color: 'rgba(255, 62, 0, 0.98)',
    failedColor: 'red',
    thickness: '3px',
    height:'2px',

    // transition: {
    //   speed: '0.2s',
    //   opacity: '0.6s',
    //   termination: 300,
    // },
    autoRevert: true,
    // location: 'left',
    inverse: false
  }
  
  Vue.use(VueProgressBar, options)






 
const app = new Vue({
    
    el: '#app',
    router,
    store,

});

