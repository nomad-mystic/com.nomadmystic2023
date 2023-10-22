import domReady from '@roots/sage/client/dom-ready';

// Community
import { createApp } from 'vue';
import Prism from 'prismjs';
import 'prismjs/components/prism-markdown';

Prism.highlightAll();

// Custom
import Root from '../scripts/components/root.vue';
import Page from '../scripts/components/page.vue';
import HomePage from './pages/home/home-page.vue';
import SinglePackage from './pages/packages/single-package.vue';
import GitHubLanguages from '../scripts/components/github-languages.vue';

/**
 * Application entrypoint
 */
domReady(async () => {
    const app = createApp(Root);

    // Create Components
    app.component(Page.name, Page);
    app.component(HomePage.name, HomePage);
    app.component(SinglePackage.name, SinglePackage);
    app.component(GitHubLanguages.name, GitHubLanguages);

    app.mount('#app');
});

/**
 * @link https://webpack.js.org/api/hot-module-replacement/
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);


