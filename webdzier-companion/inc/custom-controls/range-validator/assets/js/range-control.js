wp.customize.controlConstructor['webdzier-companion-range-slider'] = wp.customize.Control.extend({

	ready: function() {
		'use strict';

		var control = this,
			slider = control.container.find( '.webdzier-companion-range-slider-range' ),
			output = control.container.find( '.webdzier-companion-range-slider-value' );

		slider[0].oninput = function() {
			control.setting.set( this.value );
		}

		if ( control.params.default !== false ) {
			var reset = control.container.find( '.webdzier-companion-range-reset-slider' );

			reset[0].onclick = function() {
				control.setting.set( control.params.default );
			}
		}
	}

});
