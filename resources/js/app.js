//import './bootstrap';
// import {createApp} from 'vue'
//
// import App from './App.vue'
//
// createApp(App).mount("#app")


import './../css/app.css'
import './../../node_modules/flowbite-vue/dist/index.css'
import 'flowbite';
import router from "./routes/router.js";
import {createApp} from 'vue';
import App from "./components/App.vue";


const app = createApp(App)
app.use(router)
app.mount("#app");
