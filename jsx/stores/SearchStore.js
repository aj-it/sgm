var React = require('react');
var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter = require('events').EventEmitter;
var SearchConstants = require('../constants/SearchConstants');
var MovieStore = require('./MovieStore');
var assign = require('object-assign');
var $ = require('jquery');

var CHANGE_EVENT  ='change';

function search(value) {
  $.ajax({
    type: "GET",
    url: '/api/movie/search',
    dataType: 'json',
    data: {value: value},
    success: function (data, textStatus, jqXHR) {
      MovieStore.emitChange(data);
    },
    error: function (data, textStatus, jqXHR) {
      console.log(data, textStatus, jqXHR)
    },
  });
}


var SearchStore = assign({}, EventEmitter.prototype, {
  emitChange: function() {
    this.emit(CHANGE_EVENT);
  },
  addChangeListener: function(callback) {
    this.on(CHANGE_EVENT, callback);
  },
  removeChangeListener: function(callback) {
    this.removeListener(CHANGE_EVENT, callback);
  }
});

AppDispatcher.register(function(action) {
  var value;
console.log(action.actionType);
  switch(action.actionType) {
    case SearchConstants.SEARCH_CLICK:
      value = action.value.trim();
      if (value !== '') {
        search(value);
      }
      break;

    default:
      // no op
  }
});

module.exports = SearchStore;
