<template>
    <section class="GitHub-languages">

        <skeleton-languages-placeholder />

        <slot />

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
    },
    async mounted() {
        this.languages = await this.getGitHubLanguages();

        console.log(this.languages);
    },
};
</script>
