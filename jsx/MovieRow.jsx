var React = require('react');

var MovieCell = require('./MovieCell.jsx');

var MovieRow = React.createClass({
  render: function()  {
    return (
      <div className="MovieRow row">
        <MovieCell
          imdb_poster="http://ia.media-imdb.com/images/M/MV5BMTQ5MTE0MTk3Nl5BMl5BanBnXkFtZTgwMjczMzk2NTE@._V1_SX214_AL_.jpg"
          name="Jurassic World - 2015"
        ></MovieCell>
        <MovieCell
          imdb_poster="http://ia.media-imdb.com/images/M/MV5BMTQ5MTE0MTk3Nl5BMl5BanBnXkFtZTgwMjczMzk2NTE@._V1_SX214_AL_.jpg"
          name="Jurassic World - 2015"
        ></MovieCell>
        <MovieCell
          imdb_poster="http://ia.media-imdb.com/images/M/MV5BMTQ5MTE0MTk3Nl5BMl5BanBnXkFtZTgwMjczMzk2NTE@._V1_SX214_AL_.jpg"
          name="Jurassic World - 2015"
        ></MovieCell>
        <MovieCell
          imdb_poster="http://ia.media-imdb.com/images/M/MV5BMTQ5MTE0MTk3Nl5BMl5BanBnXkFtZTgwMjczMzk2NTE@._V1_SX214_AL_.jpg"
          name="Jurassic World - 2015"
        ></MovieCell>
        <MovieCell
          imdb_poster="http://ia.media-imdb.com/images/M/MV5BMTQ5MTE0MTk3Nl5BMl5BanBnXkFtZTgwMjczMzk2NTE@._V1_SX214_AL_.jpg"
          name="Jurassic World - 2015"
        ></MovieCell>
        <MovieCell
          imdb_poster="http://ia.media-imdb.com/images/M/MV5BMTQ5MTE0MTk3Nl5BMl5BanBnXkFtZTgwMjczMzk2NTE@._V1_SX214_AL_.jpg"
          name="Jurassic World - 2015"
        ></MovieCell>
        <MovieCell
          imdb_poster="http://ia.media-imdb.com/images/M/MV5BMTQ5MTE0MTk3Nl5BMl5BanBnXkFtZTgwMjczMzk2NTE@._V1_SX214_AL_.jpg"
          name="Jurassic World - 2015"
        ></MovieCell>
      </div>
    );
  }
});

module.exports = MovieRow;
