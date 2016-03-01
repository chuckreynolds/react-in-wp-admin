var React = require( 'react' );

var container = React.createClass( {
	render: function() {
		return (
			<div className='container'>
				<h1>Title</h1>
				<p>this is the paragraph</p>
			</div>
		);
	}
} );

module.exports = container;
