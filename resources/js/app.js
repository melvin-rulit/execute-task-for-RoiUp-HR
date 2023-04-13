import './bootstrap';
import BootstrapVue3 from 'bootstrap-vue-3'
import {LoadingPlugin} from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/css/index.css';
import VueTheMask from 'vue-the-mask'



import { createApp } from 'vue';
import App from './components/App.vue';
import router from "./router";
import store from './store'


//---------------------- AuthComponent ----------------------------
import RegisterComponent from './components/Auth/Register.vue'

//---------------------- SpinersComponent ----------------------------
import Spiner_1_Component from './components/Instruments/Spiners/spiner_1.vue'
import Spiner_2_Component from './components/Instruments/Spiners/spiner_2.vue'


//---------------------- MenuComponent and Sidebar ----------------------------
import MenuComponent from './components/Menu/MenuComponent.vue'

//---------------------- RouterComponents ----------------------------
import HomePageComponent from './components/RouterComponents/HomePage.vue'




const app = createApp({App});
app.component('app_component', App);

app.component('RegisterComponent', RegisterComponent);
app.component('HomePageComponent', HomePageComponent);
app.component('MenuComponent', MenuComponent);

app.component('Spiner_1', Spiner_1_Component);
app.component('Spiner_2', Spiner_2_Component);

app.use(BootstrapVue3)
app.use(VueTheMask)
app.use(LoadingPlugin)
app.use(router)
app.use(store)
app.mount('#app');
