import AnimationMethods from '@scripts/pages/home/animation-methods.js';


export default class HomeAspirationsAnimations extends AnimationMethods {
    constructor()
    {
        super();

        if (HomeAspirationsAnimations.instance) {
            return HomeAspirationsAnimations.instance;
        }

        HomeAspirationsAnimations.instance = this;
    }

    init = () => {
        this.exploreDiscoverCodeAnimations();
    }

    /**
     * @description Aspirations section animations
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return {void}
     */
    exploreDiscoverCodeAnimations = () => {
        // Animating explore
        const explorePaths = window.document.getElementsByClassName('Home-exploreDiscoverCodeExplorePath');
        this.textPathAnimation(explorePaths);

        // Animating discover
        setTimeout(() => {
            const discoverPaths = window.document.getElementsByClassName('Home-exploreDiscoverCodeDiscoverPath');
            this.textPathAnimation(discoverPaths);
        }, 1000);

        // Animating Code
        setTimeout(() => {
            const codePaths = window.document.getElementsByClassName('Home-exploreDiscoverCodeCodePath');
            this.textPathAnimation(codePaths);
        }, 2000);

        // after paths stroke-dasharray animations fill the paths with color in left to right order
        setTimeout(() => {
            // fill Explore first
            const explorePaths = window.document.querySelectorAll('.Home-exploreDiscoverCodeExplorePath');
            this.fillPathAnimation(explorePaths, '1s');

            // fill Discover path after explore finishes
            setTimeout(() => {
                const discoverPaths = window.document.querySelectorAll('.Home-exploreDiscoverCodeDiscoverPath');
                this.fillPathAnimation(discoverPaths, '1s');

                // fill code path after Discover and Explore paths are filled
                setTimeout(() => {

                    const codePaths = window.document.querySelectorAll('.Home-exploreDiscoverCodeCodePath');
                    this.fillPathAnimation(codePaths, '1s');

                }, 1000); // end Code path fill

            }, 1000); // end Discover path fill

        }, 4000); // end wait for path stroke animations - fill animation
    };
}
