var AppDispatcher = require('../dispatcher/AppDispatcher');
var MovieConstants = require('../constants/MovieConstants');

var MovieActions = {
  like: function(idMovie, idProfile, searchObj) {
    AppDispatcher.dispatch({
      actionType: MovieConstants.MOVIE_LIKE,
      idMovie: idMovie,
      idProfile: idProfile,
      searchObj: searchObj
    });
  },
  dislike: function(idMovie, idProfile, searchObj) {
    AppDispatcher.dispatch({
      actionType: MovieConstants.MOVIE_DISLIKE,
      idMovie: idMovie,
      idProfile: idProfile,
      searchObj: searchObj
    });
  }
};

module.exports = MovieActions;
