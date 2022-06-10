( function( api ) {

	// Extends our custom "mediquip-plus" section.
	api.sectionConstructor['mediquip-plus'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );