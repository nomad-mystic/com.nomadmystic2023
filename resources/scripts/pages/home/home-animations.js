import AnimationMethods from '@scripts/pages/home/animation-methods.js';
import HomeHeaderAnimations from '@scripts/pages/home/home-header-animations.js';

/**
 * @classdesc Starting pace for the homepage animations
 * @class HomeAnimations
 * @author Keith Murphy | nomadmystics@gmail.com
 */
export default class HomeAnimations {
    constructor()
    {
        if (HomeAnimations.instance) {
            return HomeAnimations.instance;
        }

        HomeAnimations.instance = this;
    }

    init = () => {
        new HomeHeaderAnimations().init();
    }
}
