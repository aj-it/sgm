var React = require('react');
var MovieItem = require('./MovieItem.jsx');
var MoviePagination = require('./MoviePagination.jsx');
var MovieStore = require('../../stores/MovieStore');

var MovieGrid = React.createClass({
  getInitialState: function() {
    return {
      movies: []
    };
  },
  componentDidMount: function() {
    MovieStore.list();
    MovieStore.addChangeListener(this._onChange);
  },
  render: function() {
    var content = this.state.movies.map(function(movie) {
      return (
        <MovieItem
          key={movie.id}
          id={movie.id}
          title={movie.title}
          poster= {movie.poster}
          >
        </MovieItem>
      );
    });
    return (
      <div>
        <MoviePagination
          maxItems={20}
          count={100}
          ></MoviePagination>
        <ul className="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
          {content}
        </ul>

      </div>
    );
  },
  _onChange: function(data) {
    this.setState({'movies': data});
  }
});

module.exports = MovieGrid;
