( function ( wp ) {
	if ( ! wp || ! wp.hooks || ! wp.element ) {
		return;
	}

	var targetBlocks = [ 'core/group', 'core/cover' ];
	var createElement = wp.element.createElement;

	var addLayoutClass = function ( BlockListBlock ) {
		return function ( props ) {
			if ( ! props || targetBlocks.indexOf( props.name ) === -1 ) {
				return createElement( BlockListBlock, props );
			}

			var layout = props.attributes && props.attributes.layout ? props.attributes.layout : null;
			var hasCustomContent = layout && layout.contentSize && layout.contentSize !== '';
			var hasCustomWide = layout && layout.wideSize && layout.wideSize !== '';

			if ( ! hasCustomContent && ! hasCustomWide ) {
				return createElement( BlockListBlock, props );
			}

			var className = props.className || '';
			if ( className.indexOf( 'is-layout-custom' ) === -1 ) {
				className = ( className + ' is-layout-custom' ).trim();
			}

			var newProps = {};
			for ( var key in props ) {
				if ( Object.prototype.hasOwnProperty.call( props, key ) ) {
					newProps[ key ] = props[ key ];
				}
			}
			newProps.className = className;

			return createElement( BlockListBlock, newProps );
		};
	};

	wp.hooks.addFilter( 'editor.BlockListBlock', 'x-t9/layout-custom-class', addLayoutClass );
} )( window.wp );
