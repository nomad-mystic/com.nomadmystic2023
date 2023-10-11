import AnimationMethods from '@scripts/pages/home/animation-methods.js';


export default class HomePortalAnimations extends AnimationMethods {
    constructor() {
        super();

        if (HomePortalAnimations.instance) {
            return HomePortalAnimations.instance;
        }

        HomePortalAnimations.instance = this;
    }

    init = () => {
        this.homePortalSections();
    }

    /**
     * @description Portal sections animations for Featured, School, and Website SVGs
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return {void}
     */
    homePortalSections = () => {
        const featuredPaths = window.document.querySelectorAll('.homePageFeaturedSectionsFeaturedPath');
        this.textPathAnimation(featuredPaths);

        const schoolPaths = window.document.querySelectorAll('.homePageFeaturedSectionsSchoolPath');
        this.textPathAnimation(schoolPaths);

        const websitesPaths = window.document.querySelectorAll('.homePageFeaturedSectionsWebsitesPath');
        this.textPathAnimation(websitesPaths);

        // Animations for filling three sections action words
        setTimeout(() => {
            this.fillPathAnimation(featuredPaths);
            this.fillPathAnimation(schoolPaths);
            this.fillPathAnimation(websitesPaths);
        }, 3000);
    };
}
