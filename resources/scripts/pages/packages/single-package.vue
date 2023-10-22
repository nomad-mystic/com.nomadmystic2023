<template>
    <section>

    </section>
</template>

<script>
export default {
    name: 'single-package',
    props: {
        package: {
            type: String,
            default: '',
        },
    },
    mounted() {

        console.log(this.packages);

        console.log('testing');
    }
};
</script>
