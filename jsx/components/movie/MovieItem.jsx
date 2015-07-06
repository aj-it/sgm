var React = require('react');

var MovieLikeButton = require('./MovieLikeButton.jsx');
var MovieDislikeButton = require('./MovieDislikeButton.jsx');

var MovieItem = React.createClass({
  render: function() {
    return (
      <li className="MovieItem">
        <img alt={this.props.title} src={this.props.poster}/>
        <p>{this.props.title}</p>
        <ul className="button-group">
          <li>
            <MovieDislikeButton idMovie={this.props.id}></MovieDislikeButton>
          </li>
          <li>
            <MovieLikeButton idMovie={this.props.id}></MovieLikeButton>
          </li>
        </ul>
      </li>
    );
  }
});

module.exports = MovieItem;
