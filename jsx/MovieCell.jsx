var React = require('react');

var MovieCell = React.createClass({
  render: function()  {
    return (
      <div className="MovieCell small-6 medium-4 large-2 columns">
        <img src="http://ia.media-imdb.com/images/M/MV5BMTQ5MTE0MTk3Nl5BMl5BanBnXkFtZTgwMjczMzk2NTE@._V1_SX214_AL_.jpg" />
        <h4>Jurassic World - 2015</h4>
      </div>
    );
  }
});

module.exports = MovieCell;
