export default {
	init() {
		const domElements = {
			siteHeader: document.getElementById( 'js-masthead' ),
			siteNavIcon: document.getElementById( 'js-site-nav-icon' ),
			searchToggle: document.getElementById( 'js-site-search-toggle' ),
			mobileNav: document.getElementById( 'js-mobile-nav' ),
		};

		// Site navigation toggle
		( function() {
			const burgerLine = domElements.siteNavIcon.querySelector( '.burger__line' );
			domElements.siteNavIcon.addEventListener( 'click', () => {
				burgerLine.classList.toggle( 'burger__line--active' );
				document.body.classList.toggle( 'overflow-hidden' );
				document.body.classList.toggle( 'menu-is-active' );
				domElements.siteHeader.classList.toggle( 'masthead--nav-active' );
				domElements.mobileNav.classList.toggle( 'mobile-nav--active' );
			} );
		}() );
	},
	finalize() {
		// console.log( 'Common finalize fired.' );
	},
};
