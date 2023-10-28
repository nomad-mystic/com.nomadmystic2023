import AnimationMethods from '@scripts/pages/home/animation-methods.js';
import HomeAspirationsAnimations from '@scripts/pages/home/home-aspirations-animations.js';

/**
 * @classdesc Build the animations for the header section
 * @class HomeHeaderAnimations
 * @extends AnimationMethods
 * @author Keith Murphy | nomadmystics@gmail.com
 */
export default class HomeHeaderAnimations extends AnimationMethods {
    constructor() {
        super();

        if (HomeHeaderAnimations.instance) {
            return HomeHeaderAnimations.instance;
        }

        HomeHeaderAnimations.instance = this;
    }

    init = () => {
        this.homePageHeaderAnimations();
    }

    /**
     * @description Home Page header animations
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return {void}
     */
    homePageHeaderAnimations = () => {
        // Animating Nomad Mystic letters in home page header
        const headerMysticTextPaths = window.document.getElementsByClassName('Home-headerMysticTextPath');
        this.textPathAnimation(headerMysticTextPaths, '5s');

        const headerHexagon = window.document.getElementById('Home-headerHexagon');
        this.fadeIdAnimation(headerHexagon, '3s');

        const headerTriangle = window.document.getElementById('Home-headerTriangle');
        this.fadeIdAnimation(headerTriangle, '4s');

        // Fills Nomad Mystic text (SVG)
        setTimeout(() => {
            this.fillPathAnimation(headerMysticTextPaths);

            // When header animations stop call Explore Discover and Code path animations
            setTimeout(function() {
                new HomeAspirationsAnimations().init();
            }, 500);
        }, 4000);
    };
}
