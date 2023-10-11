import domReady from '@roots/sage/client/dom-ready';
import HomeAnimations from '@scripts/pages/home/home-animations.js';

/**
 * Application entrypoint
 */
domReady(async () => {
    new HomeAnimations().init();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
