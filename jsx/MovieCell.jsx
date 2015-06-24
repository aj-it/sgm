var React = require('react');

var MovieCell = React.createClass({
  render: function()  {
    return (
      <li className="MovieCell small-6 medium-4 large-2 columns">
        <a className="th" role="button" aria-label="Thumbnail" href="#"><img src={this.props.imdb_poster} /></a>
        <h4>{this.props.name}</h4>
      </li>
    );
  }
});

module.exports = MovieCell;
