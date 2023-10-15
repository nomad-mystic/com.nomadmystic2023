<template>
    <section class="GitHub-languages">

        <skeleton-languages-placeholder />

        <div class="flex">
            <span v-for="lang in this.langKeys" class="language block mr-4">
                <img :src="this.buildString(lang)"
                     alt="Language Icon for {{ lang }}">
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
        async extractKeys() {

            return Object.keys(JSON.parse(this.languages));

        },
        buildString(lang) {
            return `${this.location}${this.iconsPath}${lang.toLowerCase()}${this.suffix}`
        },
    },
    async mounted() {
        this.languages = await this.getGitHubLanguages();

        this.langKeys = await this.extractKeys();

        // console.log(Object.keys(JSON.parse(this.languages)));
    },
};
</script>
