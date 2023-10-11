import AnimationMethods from '@scripts/pages/home/animation-methods.js';
import HomeHeaderAnimations from '@scripts/pages/home/home-header-animations.js';


export default class HomeAnimations {
    constructor() {
        if (HomeAnimations.instance) {
            return HomeAnimations.instance;
        }

        HomeAnimations.instance = this;
    }

    init = () => {
        new HomeHeaderAnimations().init();
    }
}
