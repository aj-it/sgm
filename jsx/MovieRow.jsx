var React = require('react');

var MovieCell = require('./MovieCell.jsx');

var MovieRow = React.createClass({
  render: function()  {
    var content = this.props.data.map(function (movie) {
      return (<MovieCell key={movie.id}
        imdb_poster={movie.poster}
        name={movie.title}
        id={movie.id}
      ></MovieCell>);
    });
    return (
      <ul className="MovieRow row">
        {content}
      </ul>
    );
  }
});

module.exports = MovieRow;
