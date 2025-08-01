import '../css/app.css';
import './bootstrap';
import CreativeBriefFlow from './components/CreativeBriefFlow.vue';
app.component('creative-brief-flow', CreativeBriefFlow);

const app = createApp({});
app.component('form-stepper', FormStepper);
app.mount('#app');