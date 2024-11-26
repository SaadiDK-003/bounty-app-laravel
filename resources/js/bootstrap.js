import axios from 'axios';
// import jQuery from 'jquery';
// import 'owl.carousel';
// window.$ = jQuery;
// window.jQuery = jQuery;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
