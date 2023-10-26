<template>
    <div class="Page relative">
        <slot />
    </div>
</template>

<script>
export default {
    name: 'page',
    methods: {
        toggleMobileNav() {
            const hamburger = window.document.getElementById('Header-hamburger');

            if (hamburger && typeof hamburger !== 'undefined') {
                hamburger.addEventListener('click', (event) => {
                    const target = event.target;

                    if (target &&
                        typeof target !== 'undefined' &&
                        target.tagName === 'SVG' &&
                        target.tagName === 'path' &&
                        target.id === 'Header-hamburger'
                    ) {
                        console.dir(target);
                    }

                }, true);
            }
        },
    },
    mounted() {
        this.toggleMobileNav();
    },
};
</script>
