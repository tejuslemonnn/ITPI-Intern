import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import io from 'socket.io-client';
window.io = io;


createApp(App).use(router).mount('#app')
