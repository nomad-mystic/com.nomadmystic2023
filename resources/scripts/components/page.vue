<template>
    <div class="Page relative">
        <slot />
    </div>
</template>

<script>
export default {
    name: 'page',
    data() {
        return {
            hamburger: null,
            closeIcon: null,
            footerNav: null,
            bodyBackground: null,
        }
    },
    methods: {
        /**
         * @description Create our event for showing the mobile nav
         * @public
         * @author Keith Murphy | nomadmystics@gmail.com
         *
         * @return {void}
         */
        showMobileNav() {
            if (this.hamburger && typeof this.hamburger !== 'undefined') {
                this.hamburger.addEventListener('click', this.showHandler , true);
            }
        },
        /**
         * @description Create our event for closing the mobile nav
         * @public
         * @author Keith Murphy | nomadmystics@gmail.com
         *
         * @return {void}
         */
        closeMobileNav() {
            if (this.closeIcon && typeof this.closeIcon !== 'undefined') {
                this.closeIcon.addEventListener('click', this.closeHandler, true);
            }

            if (this.bodyBackground && typeof this.bodyBackground !== 'undefined') {
                this.bodyBackground.addEventListener('click', this.closeHandler, true);
            }
        },
        /**
         * @description Handle our event for showing the mobile nav
         * @public
         * @author Keith Murphy | nomadmystics@gmail.com
         *
         * @prama {HTMLEvent} event
         * @return {void}
         */
        showHandler(event) {
            const target = event.target;

            if (target &&
                typeof target !== 'undefined' &&
                target.tagName === 'svg' ||
                target.tagName === 'path' ||
                target.id === 'Header-hamburger'
            ) {

                this.footerNav.classList.add('is-visible');
                this.bodyBackground.classList.add('is-visible');

            }
        },
        /**
         * @description Handle our event for closing the mobile nav
         * @public
         * @author Keith Murphy | nomadmystics@gmail.com
         *
         * @prama {HTMLEvent} event
         * @return {void}
         */
        closeHandler(event) {
            const target = event.target;

            if (target &&
                typeof target !== 'undefined' &&
                target.tagName === 'svg' ||
                target.tagName === 'path' ||
                target.id === 'Header-close-icon' ||
                target.id === 'Layout-bodyBackground'
            ) {

                this.footerNav.classList.remove('is-visible');
                this.bodyBackground.classList.remove('is-visible');

            }
        },
    },
    beforeUnmount() {
       this.hamburger.removeEventListener(this.showHandler);
       this.closeIcon.removeEventListener(this.closeHandler);
    },
    mounted() {
        // DOM Elements
        this.hamburger = window.document.getElementById('Header-hamburger');
        this.closeIcon = window.document.getElementById('Header-close-icon');
        this.footerNav = window.document.getElementById('Header-navigation-canvas');
        this.bodyBackground = window.document.getElementById('Layout-bodyBackground');

        this.showMobileNav();
        this.closeMobileNav();
    },
};
</script>
