/**
 * @descripton Compiler configuration
 *
 * @link https://roots.io/docs/sage sage documentation
 * @link https://bud.js.org/guides/configure bud.js configuration guide
 *
 * @type {import('@roots/bud').Config}
 */
export default async (app) => {
    /**
     * @descripton Application assets & entrypoints
     *
     * @link https://bud.js.org/docs/bud.entry
     * @link https://bud.js.org/docs/bud.assets
     */
    app
        .entry('app', ['@scripts/app', '@styles/app'])
        .entry('editor', ['@scripts/editor', '@styles/editor'])
        .assets(['images']);

    /**
     * @descripton Set public path
     *
     * @link https://bud.js.org/docs/bud.setPublicPath
     */
    app.setPublicPath('/wp-content/themes/nomad-mystic-2023/public/');

    /**
     * @description Development server settings
     *
     * @link https://bud.js.org/docs/bud.setUrl
     * @link https://bud.js.org/docs/bud.setProxyUrl
     * @link https://bud.js.org/docs/bud.watch
     */
    app
        .setUrl('http://localhost:9000')
        .setProxyUrl('http://nomadmystic2023.com.test/')
        .watch(['resources/views', 'app', 'tailwind.config.js']);


    // @link https://bud.js.org/reference/bud.define
    app.define({
        __VUE_OPTIONS_API__: true,
        __VUE_PROD_DEVTOOLS__: false,
    });

    app.vue.set('runtimeOnly', false);

    // Babel configs
    // app.babel.setPlugin(['babel-plugin-css-in-js']);

    /**
     * @description Generate WordPress `theme.json`
     *
     * @note This overwrites `theme.json` on every build.
     *
     * @link https://bud.js.org/extensions/sage/theme.json
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json
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
