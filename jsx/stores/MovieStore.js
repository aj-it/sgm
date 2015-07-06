var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter = require('events').EventEmitter;
var $ = require('jquery');
var assign = require('object-assign');
var MovieConstants = require('../constants/MovieConstants');
var CHANGE_EVENT = 'change';

var _movies = {};

/**
 * Add a movie to profile preference
 */
function like(idMovie, idProfile) {
  $.ajax({
    type: "POST",
    url: '/api/preference/like',
    dataType: 'json',
    data: {
      idMovie: idMovie,
      idProfile: idProfile
    },
    success: function (data, textStatus, jqXHR) {
      MovieStore.list();
    }.bind(this),
    error: function (data, textStatus, jqXHR) {
      console.log(data, textStatus, jqXHR)
    },
  });
}

var MovieStore = assign({}, EventEmitter.prototype, {
  list: function() {
    $.ajax({
      url: '/api/movie/list',
      dataType: 'json',
      cache: false,
      success: function(data) {
        _movies = data;
        this.emitChange(_movies)
      }.bind(this),
      error: function(xhr, status, err) {
        console.error(xhr, status, err);
      }
    });
  },
  emitChange: function(data) {
    this.emit(CHANGE_EVENT, data);
  },
  addChangeListener: function(callback) {
    this.on(CHANGE_EVENT, callback);
  },
  removeChangeListener: function(callback) {
    this.removeListener(CHANGE_EVENT, callback);
  }
});

AppDispatcher.register(function(action) {
  switch (action.actionType) {
    case MovieConstants.MOVIE_LIKE:
      like(action.idMovie, action.idProfile);
      break;
    default:
      // no op
  }
});

module.exports = MovieStore;
