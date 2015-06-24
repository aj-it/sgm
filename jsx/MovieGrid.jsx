var React = require('react');
var $ = require('jquery');

var MovieRow = require('./MovieRow.jsx');

var MovieGrid = React.createClass({
  getInitialState: function() {
    return {data: []};
  },
  componentDidMount: function() {
    $.ajax({
      url: '/api/movie/list',
      dataType: 'json',
      cache: false,
      success: function(data) {
        this.setState({data: data});
      }.bind(this),
      error: function(xhr, status, err) {
        console.error(xhr, status, err);
      }.bind(this)
    });
  },
  render: function()  {
    return (
        <div className="MovieGrid">
          <MovieRow data={this.state.data}/>
        </div>
    );
  }
});

module.exports = MovieGrid;
