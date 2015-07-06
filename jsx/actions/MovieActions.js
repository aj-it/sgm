var AppDispatcher = require('../dispatcher/AppDispatcher');
var MovieConstants = require('../constants/MovieConstants');

var MovieActions = {
  like: function(idMovie, idProfile) {
    AppDispatcher.dispatch({
      actionType: MovieConstants.MOVIE_LIKE,
      idMovie: idMovie,
      idProfile: idProfile
    });
  },
  dislike: function(idMovie, idProfile) {
    AppDispatcher.dispatch({
      actionType: MovieConstants.MOVIE_DISLIKE,
      idMovie: idMovie,
      idProfile: idProfile
    });
  }
};

module.exports = MovieActions;
