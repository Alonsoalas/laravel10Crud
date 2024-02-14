import './bootstrap';
import {
    Dropdown,
    Ripple,
    initTE,
} from "tw-elements";

import Alpine from 'alpinejs';

window.Alpine = Alpine;

initTE({ Dropdown, Ripple });

Alpine.start();
