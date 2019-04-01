import Vue from 'vue'

require('./bootstrap');

window.Vue = require('vue');


Vue.component('modalupload', require('./components/UploadComponent.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        showModal: false
    }
});
