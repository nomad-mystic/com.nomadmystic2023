<template>
    <section class="SinglePackage-markdown">
        <div v-html="this.markdown" class="markdown-body"></div>
    </section>
</template>

<script>
import { marked } from 'marked';
// import 'github-markdown-dark.css'

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
        parseMarkdown() {
            return marked.parse(this.packageMarkdown);
        }
    },
    mounted() {
        this.markdown = this.parseMarkdown();

        // console.log(this.packageMarkdown);
    },
};
</script>
