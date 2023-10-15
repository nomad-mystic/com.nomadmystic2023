<template>
    <section class="GitHub-languages">

        <skeleton-languages-placeholder />

        <div class="flex">
            <span v-for="(lang, index) in this.languages" class="language block mr-4">
                <img :src="lang"
                     :alt="this.buildAlt(index)">
            </span>
        </div>

    </section>
</template>

<script>
import SkeletonLanguagesPlaceholder from '@scripts/components/skeleton-languages-placeholder.vue';

export default {
    name: 'github-languages',
    components: {
        SkeletonLanguagesPlaceholder
    },
    props: {
        ownerRepo: {
            type: String,
            default: '',
        },
    },
    data() {
        return {
            languages: {},
            langKeys: [],
            location: window.location.origin,
            iconsPath: '/wp-content/themes/nomad-mystic/public/images/icons/languages/',
            suffix: '.svg',
        };
    },
    methods: {
        /**
         * @description Call our endpoint for the language icons
         * @public
         * @author Keith Murphy | nomadmystics@gmail.com
         *
         * @return {Promise<Record<number, string>>}
         */
        async getGitHubLanguages() {
            return fetch(`/wp-json/api/v1/get-github-endpoint?ownerRepo=${this.ownerRepo}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                .then(res => res.json())
                .then(data => data)
                .catch(err => console.err(err));
        },
        /**
         * @description Build our alt strings
         * @public
         * @author Keith Murphy | nomadmystics@gmail.com
         *
         * @param {string} langName
         * @return {string}
         */
        buildAlt(langName = '') {
            return `Icon for ${langName} language`;
        },
    },
    async mounted() {
        this.languages = await this.getGitHubLanguages();
    },
};
</script>
