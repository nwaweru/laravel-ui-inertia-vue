import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import Layout from './Shared/Layout.vue';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,

    resolve: async name => {
        let page = (await import(`./Pages/${name}.vue`)).default;

        if (page.layout === undefined) {
            page.layout = Layout;
        }

        return page;
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el)
    },
});

InertiaProgress.init();
