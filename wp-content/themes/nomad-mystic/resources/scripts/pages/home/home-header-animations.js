import AnimationMethods from '@scripts/pages/home/animation-methods.js';
import HomePortalAnimations from '@scripts/pages/home/home-portal-animations.js';


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
        // animating Nomad Mystic letters in home page header
        const headerMysticTextPaths = window.document.getElementsByClassName('headerMysticTextPath');
        this.textPathAnimation(headerMysticTextPaths, '5s');

        const homePageHeaderHexagon = window.document.getElementById('homePageHeaderHexagon');
        this.fadeIdAnimation(homePageHeaderHexagon, '3s');

        const homePageHeaderTriangle = window.document.getElementById('homePageHeaderTriangle');
        this.fadeIdAnimation(homePageHeaderTriangle, '4s');

        // fills Nomad Mystic text (SVG)
        setTimeout(() => {
            const headerMysticTextPaths = window.document.querySelectorAll('.headerMysticTextPath');
            this.fillPathAnimation(headerMysticTextPaths);

            // when header animations stop call Explore Discover and Code path animations
            // setTimeout(function() {
            //     homePageExploreDiscoverCodeAnimations();
            // }, 1000);

            new HomePortalAnimations().init();
        }, 5000);
    };
}
