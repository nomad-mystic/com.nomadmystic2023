/**
 * Compiler configuration
 *
 * @see {@link https://roots.io/docs/sage sage documentation}
 * @see {@link https://bud.js.org/guides/configure bud.js configuration guide}
 *
 * @type {import('@roots/bud').Config}
 */
export default async (app) => {
    /**
     * Application assets & entrypoints
     *
     * @see {@link https://bud.js.org/docs/bud.entry}
     * @see {@link https://bud.js.org/docs/bud.assets}
     */
    app
        .entry('app', ['@scripts/app', '@styles/app'])
        .entry('editor', ['@scripts/editor', '@styles/editor'])
        .assets(['images']);

    /**
     * Set public path
     *
     * @see {@link https://bud.js.org/docs/bud.setPublicPath}
     */
    app.setPublicPath('/wp-content/themes/nomad-mystic/public/');

    /**
     * Development server settings
     *
     * @see {@link https://bud.js.org/docs/bud.setUrl}
     * @see {@link https://bud.js.org/docs/bud.setProxyUrl}
     * @see {@link https://bud.js.org/docs/bud.watch}
     */
    app
        .setUrl('http://localhost:9000')
        .setProxyUrl('http://nomadmystic2023.com.test/')
        .watch(['resources/views', 'app', 'tailwind.config.js']);


    // https://bud.js.org/reference/bud.define
    app.define({
        __VUE_OPTIONS_API__: true,
        __VUE_PROD_DEVTOOLS__: false,
    });

    // https://discourse.roots.io/t/once-i-mount-vue-to-app-content-disappears/23602
    // app.alias('vue', app.path('@modules/vue/dist/vue.esm-bundler.js'));

    app.vue.set('runtimeOnly', false);

    /**
     * Generate WordPress `theme.json`
     *
     * @note This overwrites `theme.json` on every build.
     *
     * @see {@link https://bud.js.org/extensions/sage/theme.json}
     * @see {@link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json}
     */
    app.wpjson
        .setSettings({
            color: {
                custom: false,
                customDuotone: false,
                customGradient: false,
                defaultDuotone: false,
                defaultGradients: false,
                defaultPalette: false,
                duotone: [],
            },
            custom: {
                spacing: {},
                typography: {
                    'font-size': {},
                    'line-height': {},
                },
            },
            spacing: {
                padding: true,
                units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
            },
            typography: {
                customFontSize: false,
            },
        })
        .useTailwindColors()
        .useTailwindFontFamily()
        .useTailwindFontSize();
};
