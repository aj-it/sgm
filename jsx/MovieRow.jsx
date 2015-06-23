var React = require('react');

var MovieCell = require('./MovieCell.jsx');

var MovieRow = React.createClass({
  render: function()  {
    return (
      <div className="MovieRow row">
        <MovieCell />
        <MovieCell />
        <MovieCell />
        <MovieCell />
        <MovieCell />
        <MovieCell />
      </div>
    );
  }
});

module.exports = MovieRow;
