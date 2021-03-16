
require('./bootstrap');

// Vue Js
window.Vue = require('vue');

// V form
import { Form, HasError, AlertError } from 'vform'
// Use Globally at form
window.Form = Form 

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


// Vue Router
import VueRouter from 'vue-router';
Vue.use(VueRouter);
// Routes 
import {routes} from './routes/routes';

const router = new VueRouter({
    routes,
    // mode:'history',
})

// Sweet Alert 
import Swal from 'sweetalert2'
window.Swal = Swal ;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
window.Toast = Toast ;

// Toaster js 
import toastr from 'toastr'
window.toastr = toastr;

// vue x
import Vuex from 'vuex'

Vue.use(Vuex)
import storeData from "./store/store"
const store = new Vuex.Store( storeData )

// Moment Js
import { moment } from "./filter/filter";

Vue.component('home', require('./components/backend/home').default);



const app = new Vue({
    el: '#content',
    router,
    store
});
