import AnimationMethods from '@scripts/pages/home/animation-methods.js';

/**
 * @classdesc Build the animations for the "Dream" section
 * @class HomeDreamAnimations
 * @extends AnimationMethods
 * @author Keith Murphy | nomadmystics@gmail.com
 */
export default class HomeDreamAnimations extends AnimationMethods {
    constructor() {
        super();

        if (HomeDreamAnimations.instance) {
            return HomeDreamAnimations.instance;
        }

        HomeDreamAnimations.instance = this;
    };


    init = () => {
        this.dreamAnimations();
    };

    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return
     */
    dreamAnimations = () => {
        const heroContainer = window.document.querySelector('.Home-heroContainer');

        let observer = new IntersectionObserver(entries => {
            if (entries[0].boundingClientRect.y < 0) {

                this.startAnimations();

                // Release observer
                observer.unobserve(heroContainer);
            }
        });

        observer.observe(heroContainer);
    };

    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return {void}
     */
    startAnimations = () => {
        const homeAnimationArea = window.document.querySelector('.Home-animationArea');
        const homeFeaturedSchoolWebsites = window.document.querySelector('.Home-threeFeatures');


        // Shapes animations
        // triangle
        const dreamTriangle = window.document.getElementById('dreamTriangle');
        this.fadeIdAnimation(dreamTriangle, '1.5s');

        // headerLargeHexagon
        const dreamLargeHexagon = window.document.getElementById('dreamLargeHexagon');
        this.fadeIdAnimation(dreamLargeHexagon, '1s');

        // dreamSmallHexagon in Home-animationArea
        setTimeout(() => {
            const dreamSmallHexagon = window.document.getElementById('dreamSmallHexagon');
            this.fadeIdAnimation(dreamSmallHexagon, '1s');

            // Animation for header text Dream Not of Today
            setTimeout(() => {

                const dreamNotOfTodayPath = window.document.getElementsByClassName('dreamNotOfTodayPath');
                this.textPathAnimation(dreamNotOfTodayPath, '3s', 'var(--color-white)');


            }, 500);

        }, 1000);

        // lines and hexagons(bulletPoints) in Home-animationArea
        setInterval(() => {
            // bulletPoints animations
            const bulletPoints = window.document.getElementsByClassName('bulletPoints');
            this.fadeClassAnimation(bulletPoints, '2s');

            // SubLine animations
            const subLines = window.document.getElementsByClassName('subLine');
            this.fadeClassAnimation(subLines, '2s');

        }, 2000); // end lines and bulletPoints

        ///////////////////// Text Animations in Home-animationArea
        // delaying small text animation, so it waits for the header to animate in
        setTimeout(() => {

            // Animation for Web Development text
            setTimeout(() => {

                const webDevelopmentPath = window.document.getElementsByClassName('webDevelopmentPath');
                this.textPathAnimation(webDevelopmentPath, '2s', 'var(--color-white)');

            }, 1000);

            // Animation for Text UI Development in Home-animationArea
            setTimeout(() => {

                const UIDevelopmentPath = window.document.getElementsByClassName('UIDevelopmentPath');
                this.textPathAnimation(UIDevelopmentPath, '2s', 'var(--color-white)');

            }, 2000);

            // Animation for WordPress Development text in Home-animationArea
            setTimeout(() => {

                const wordpressDevelopmentPath = window.document.getElementsByClassName('wordpressDevelopmentPath');
                this.textPathAnimation(wordpressDevelopmentPath, '2s', 'var(--color-white)');

            }, 3000);
        }, 2500);

        // Sets the timing/delay of the animation for text fills in Home-animationArea at the end of the text path animation
        setTimeout(() => {
            const dreamNotOfTodayPaths = window.document.querySelectorAll('.dreamNotOfTodayPath');
            const webDevelopmentPaths = window.document.querySelectorAll('.webDevelopmentPath');
            const UIDevelopmentPaths = window.document.querySelectorAll('.UIDevelopmentPath');
            const wordpressDevelopmentPaths = window.document.querySelectorAll('.wordpressDevelopmentPath');

            this.fillPathAnimation(dreamNotOfTodayPaths, '2s', 'var(--color-white)');
            this.fillPathAnimation(webDevelopmentPaths, '3s', 'var(--color-white)');
            this.fillPathAnimation(UIDevelopmentPaths, '4s', 'var(--color-white)');
            this.fillPathAnimation(wordpressDevelopmentPaths, '5s', 'var(--color-white)');

        }, 8000);
    };
}
