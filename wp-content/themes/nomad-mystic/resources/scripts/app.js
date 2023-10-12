import domReady from '@roots/sage/client/dom-ready';
import HomeAnimations from '@scripts/pages/home/home-animations.js';
import HomeDreamAnimations from '@scripts/pages/home/home-dream-animations.js';

import { createApp } from 'vue';
import Root from '../scripts/components/root.vue';
import Page from '../scripts/components/page.vue';
import HomePage from '../scripts/components/home-page.vue';

/**
 * Application entrypoint
 */
domReady(async () => {
    const app = createApp(Root);

    // Create Components
    app.component('page', Page);
    app.component('home-page', HomePage);

    app.mount('#app');
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);


