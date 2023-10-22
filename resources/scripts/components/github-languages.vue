<template>
    <section class="GitHub-languages" title="GitHub Repo Languages">

        <skeleton-languages-placeholder />

        <div class="flex flex-wrap">
            <span v-for="(lang, index) in this.languages" class="GitHub-language block mr-4" v-cloak>
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
            return fetch(`/wp-json/api/v1/get-github-languages?ownerRepo=${this.ownerRepo}`, {
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
    updated() {

        // if (this.languages) {
        //     const skeleton = this.$el.querySelector('.Skeleton');
        //
        //     skeleton.style.display = 'none';
        // }

    },
    async mounted() {
        this.languages = await this.getGitHubLanguages();

        // console.dir(this.$el);

        const skeleton = this.$el.querySelector('.Skeleton');

        skeleton.style.display = 'none';
    },
};
</script>
