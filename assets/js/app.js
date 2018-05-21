// Import external dependencies.
import 'jquery';
import 'what-input';

// Import everything from vendor folder
// import './_vendor/_foundation';
import './_vendor/_bootstrap';

// Import local dependencies.
import Router from './util/Router';

// Import routes.
import common from './routes/common';
import home from './routes/home';

// Populate Router instance with DOM routes.
const routes = new Router( {
	common,
	home,
	// Add new routes below...
} );

// Load Events.
$( document ).ready( () => routes.loadEvents() );
