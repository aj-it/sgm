var React = require('react');

var MovieRow = require('./MovieRow.jsx');

var MovieGrid = React.createClass({
  render: function()  {
    return (
        <div className="MovieGrid">
          <MovieRow />          
        </div>
    );
  }
});

module.exports = MovieGrid;
