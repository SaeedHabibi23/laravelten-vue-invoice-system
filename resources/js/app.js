import { createApp } from 'vue'
import app from './components/App.vue'

import router from './router/index.js'


createApp(app).use(router).mount('#app');

