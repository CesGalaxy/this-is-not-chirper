import axios from 'axios';
import Alpine from "alpinejs";

window.axios = axios;
window.Alpine = Alpine;

Alpine.start();

declare global {
    interface Window {
        Alpine: typeof Alpine;
        axios: typeof axios;
    }
}

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
