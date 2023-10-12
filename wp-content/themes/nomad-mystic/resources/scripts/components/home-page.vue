<template>
    <section>
        <slot />
    </section>
</template>

<script>
import HomeAnimations from '@scripts/pages/home/home-animations.js';
import HomeDreamAnimations from '@scripts/pages/home/home-dream-animations.js';

export default {
    name: 'home-page',
    mounted() {
        new HomeAnimations().init();
        new HomeDreamAnimations().init();
    },
};
</script>
