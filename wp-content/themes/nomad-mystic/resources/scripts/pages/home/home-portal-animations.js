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
     * @description Portal Sections call to action Featured, School, and Website SVGs
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return {void}
     */
    homePortalSections = () => {
        const homeSectionsFeaturedPaths = window.document.querySelectorAll('.homePageFeaturedSectionsFeaturedPath');
        this.textPathAnimation(homeSectionsFeaturedPaths, '3s');

        const homeSectionsSchoolPaths = window.document.querySelectorAll('.homePageFeaturedSectionsSchoolPath');
        this.textPathAnimation(homeSectionsSchoolPaths, '3s');

        const homeSectionsWebsitesPaths = window.document.querySelectorAll('.homePageFeaturedSectionsWebsitesPath');
        this.textPathAnimation(homeSectionsWebsitesPaths, '3s');

        // Animations for filling three sections action words
        setTimeout(() => {
            this.fillPathAnimation(homeSectionsFeaturedPaths);
            this.fillPathAnimation(homeSectionsSchoolPaths);
            this.fillPathAnimation(homeSectionsWebsitesPaths);
        }, 3000);
    };
}
