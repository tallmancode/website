window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Content-Type'] = 'application/json';

import { createApp } from 'vue'

const app = createApp({});

//Components
app.component('header-inner', require('../global/header/Header').default)
app.component('hero', require('./components/hero').default)

const vm = app.mount('#app')