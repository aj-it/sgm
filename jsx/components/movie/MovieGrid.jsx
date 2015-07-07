var React = require('react');
var MovieItem = require('./MovieItem.jsx');
var MoviePagination = require('./MoviePagination.jsx');
var MovieStore = require('../../stores/MovieStore');
var SearchStore = require('../../stores/SearchStore');

var MovieGrid = React.createClass({
  getInitialState: function() {
    return {
      movies: [],
      total: 0,
      count: 30
    };
  },
  componentDidMount: function() {
    MovieStore.list();
    MovieStore.addChangeListener(this._onChange);
    SearchStore.addChangeListener(this._onSearch);
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
          total={this.state.total}
          count={this.state.count}
          ></MoviePagination>
        <ul className="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
          {content}
        </ul>

      </div>
    );
  },
  _onChange: function(data) {
    this.setState({'movies': data});
  },
  _onSearch: function(searchObj) {
    this.setState({
      total: searchObj.total,
      count: searchObj.count
    });
  }
});

module.exports = MovieGrid;
