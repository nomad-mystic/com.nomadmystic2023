<template>
    <section class="SinglePackage-markdown">

        <article v-html="this.markdown" class="SinglePackage-markdownBody markdown-body"></article>

    </section>
</template>

<script>
import { Marked } from 'marked';
import purify from 'dompurify';
import { markedHighlight } from 'marked-highlight';
import hljs from 'highlight.js/lib/core';

import javascript from 'highlight.js/lib/languages/javascript';
import plainText from 'highlight.js/lib/languages/plaintext';
import shell from 'highlight.js/lib/languages/shell';
import php from 'highlight.js/lib/languages/php';

hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('plaintext', plainText);
hljs.registerLanguage('shell', shell);
hljs.registerLanguage('php', php);

export default {
    name: 'single-package',
    props: {
        packageMarkdown: {
            type: String,
            default: '',
        },
    },
    data() {
        return {
            markdown: '',
        };
    },
    methods: {
        /**
         * @description Parse the a packages README markdown
         * @public
         * @author Keith Murphy | nomadmystics@gmail.com
         *
         * @param {string} html
         * @return {string|Promise<string>}
         */
        parseMarkdown(html) {
            const pure = purify.sanitize(html);

            const marked = new Marked(
                markedHighlight({
                    langPrefix: 'hljs language-',
                    highlight(code, lang) {
                        const language = hljs.getLanguage(lang) ? lang : 'plaintext';

                        return hljs.highlight(code, { language }).value;
                    }
                })
            );

            return marked.parse(pure.replace(/^[\u200B\u200C\u200D\u200E\u200F\uFEFF]/, ''), {
                pedantic: false,
                gfm: true,
            });
        }
    },
    mounted() {
        const html = this.$el.dataset.markdown;

        this.markdown = this.parseMarkdown(html);
    },
};
</script>
