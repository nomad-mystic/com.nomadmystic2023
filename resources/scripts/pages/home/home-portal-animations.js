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
        // this.homePortalSections();
    }

    /**
     * @description Portal sections animations for Featured, School, and Website SVGs
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return {void}
     */
    homePortalSections = () => {
        const featuredPaths = window.document.querySelectorAll('.Home-featuredSectionsFeaturedPath');
        this.textPathAnimation(featuredPaths);

        const schoolPaths = window.document.querySelectorAll('.Home-featuredSectionsSchoolPath');
        this.textPathAnimation(schoolPaths);

        const websitesPaths = window.document.querySelectorAll('.Home-featuredSectionsWebsitesPath');
        this.textPathAnimation(websitesPaths);

        // Animations for filling three sections action words
        setTimeout(() => {
            this.fillPathAnimation(featuredPaths);
            this.fillPathAnimation(schoolPaths);
            this.fillPathAnimation(websitesPaths);
        }, 3000);
    };
}
