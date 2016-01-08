jQuery(function($) {
	jQuery.supersized({
		// Functionality
		slideshow: 1, // Slideshow on/off
		autoplay: 1, // Slideshow starts playing automatically
		start_slide: 1, // Start slide (0 is random)
		stop_loop: 0, // Pauses slideshow on last slide
		random: 0, // Randomize slide order (Ignores start slide)
		slide_interval: 7000, // Length between transitions
		transition: 1, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed: 1500, // Speed of transition
		new_window: 0, // Image links open in new window/tab
		pause_hover: 0, // Pause slideshow on hover
		keyboard_nav: 1, // Keyboard navigation on/off
		performance: 1, // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
		image_protect: 0, // Disables image dragging and right click with Javascript

		// Size & Position
		min_width: 0, // Min width allowed (in pixels)
		min_height: 0, // Min height allowed (in pixels)
		vertical_center: 1, // Vertically center background
		horizontal_center: 1, // Horizontally center background
		fit_always: 0, // Image will never exceed browser width or height (Ignores min. dimensions)
		fit_portrait: 1, // Portrait images will not exceed browser height
		fit_landscape: 0, // Landscape images will not exceed browser width

		// Components
		slide_links: 'blank', // Individual links for each slide (Options: false, 'num', 'name', 'blank')
		thumb_links: 1, // Individual thumb links for each slide
		thumbnail_navigation: 0, // Thumbnail navigation
		slides: [ // Slideshow Images
			{
				image: 'http://sh0000p.com/wp-content/uploads/2015/12/Natures-Rainbow-light-art.jpg',
				title: 'NATURE\'S MOST BEAUTIFUL LIGHT, Corvallis, Oregon, USA',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/12/Natures-Rainbow-light-art-150x150.jpg',
				url: '/rainbow'
			}, {
				image: 'http://sh0000p.com/wp-content/uploads/2015/12/CROMOS-train.jpg',
				title: 'CROMOS, Milan Central Station, Milan, Italy',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/12/CROMOS-train-150x150.jpg',
				url: '/cromos'
			}, {
				image: 'http://sh0000p.com/wp-content/uploads/2015/12/healing-light.jpg',
				title: 'HEALING LIGHT, Eisenhower Luci Curci Cancer Center, California, USA',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/12/healing-light-150x150.jpg',
				url: '/healing-garden'
			}, {
				image: 'http://sh0000p.com/wp-content/uploads/2015/12/ecstasy-of-santa-lucia.jpg',
				title: 'THE ECSTASY OF SANTA LUCIA, Church of Santa Lucia de Ocon, La Rioja, Spain',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/12/ecstasy-of-santa-lucia-150x150.jpg',
				url: '/rainbow-light-installation'
			}, {
				image: 'http://sh0000p.com/wp-content/uploads/2015/12/sun-painting-lafayette-library.jpg',
				title: 'SUN PAINTING, Lafayette Library, California, USA',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/12/ecstasy-of-santa-lucia-150x150.jpg',
				url: '/library-rainbow-art-installation'
			}, {
				image: 'http://sh0000p.com/wp-content/uploads/2015/11/Environmental-performance-art.jpg',
				title: 'SECRETS OF THE SUN: MILLENNIAL MEDITATIONS, Erskine Studio, Venice, California, USA',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/12/ecstasy-of-santa-lucia-150x150.jpg',
				url: '/secrets-of-the-sun-millennial-meditations'
			}, {
				image: 'http://sh0000p.com/wp-content/uploads/2015/11/Library-solar-public-art.jpg',
				title: 'TRACERY RAINBOW, Fontana Library, California, USA',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/12/ecstasy-of-santa-lucia-150x150.jpg',
				url: '/solar-powered-art'
			}, {
				image: 'http://sh0000p.com/wp-content/uploads/2015/11/Light-Sculpture-installation.jpg',
				title: '52 WEEKS 4 SEASONS, Moreno Valley, California, USA',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/11/Light-Sculpture-installation-150x150.jpg',
				url: '/moreno-valley'
			}, {
				image: 'http://sh0000p.com/wp-content/uploads/2015/11/Church-rainbow-light-art.jpg',
				title: 'THE ECSTASY OF SANTA LUCIA, Church of Santa Lucia de Ocon, Spain',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/11/Church-rainbow-light-art-150x150.jpg',
				url: '/rainbow-light-installation'
			}, {
				image: 'http://sh0000p.com/wp-content/uploads/2015/11/Prism-Light-art-Rome.jpg',
				title: 'NEW LIGHT ON ROME 2000, Ancient Roman Forum, Rome, Italy',
				url: '/new-light-on-rome-2000',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/11/Prism-Light-art-Rome-150x150.jpg',
			}, {
				image: 'http://sh0000p.com/wp-content/uploads/2015/12/Solar-Public-Light-Art.jpg',
				title: 'CROMOS, Rome Termini Railway Station, Rome, Italy',
				thumb: 'http://sh0000p.com/wp-content/uploads/2015/12/Solar-Public-Light-Art-150x150.jpg',
				url: '/cromos'
			}
		],

		// Theme Options
		progress_bar: 1, // Timer for each slide
		mouse_scrub: 0

	});
});
