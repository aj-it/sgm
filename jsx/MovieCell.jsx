var React = require('react');

var MovieCell = React.createClass({
  render: function()  {
    return (
      <div className="MovieCell small-6 medium-4 large-2 columns">
        <img src={this.props.imdb_poster} />
        <h4>{this.props.name}</h4>
      </div>
    );
  }
});

module.exports = MovieCell;
