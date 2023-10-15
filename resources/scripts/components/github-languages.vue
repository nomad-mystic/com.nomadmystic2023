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
        fullName: {
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
            return fetch(`https://api.github.com/repos/${this.fullName}/languages`)
                .then(res => res.json)
                .then(data => data)
                .catch(err => console.err(err));
        },
    },
    async mounted() {
        console.log(this.fullName);

        this.languages = await this.getGitHubLanguages();

        console.log(this.languages);
    },
};
</script>
