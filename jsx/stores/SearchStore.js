var React = require('react');
var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter = require('events').EventEmitter;
var SearchConstants = require('../constants/SearchConstants');
var MovieStore = require('./MovieStore');
var assign = require('object-assign');
var $ = require('jquery');

var CHANGE_EVENT  ='change';


var SearchStore = assign({}, EventEmitter.prototype, {

  search : function(query, page, count) {
    $.ajax({
      type: "GET",
      url: '/api/movie/search',
      dataType: 'json',
      data: {
        query: query,
        page: page,
        count: count
      },
      success: function (data, textStatus, jqXHR) {
        MovieStore.emitChange(data.result);
        this.emitChange({
          query: query,
          total: data.total,
          page: parseInt(data.page),
          count: parseInt(data.count)
        });
      }.bind(this),
      error: function (data, textStatus, jqXHR) {
        console.log(data, textStatus, jqXHR)
      },
    });
  },

  emitChange: function(searchObj) {
    this.emit(CHANGE_EVENT, searchObj);
  },
  addChangeListener: function(callback) {
    this.on(CHANGE_EVENT, callback);
  },
  removeChangeListener: function(callback) {
    this.removeListener(CHANGE_EVENT, callback);
  }
});

SearchStore.setMaxListeners(0);

AppDispatcher.register(function(action) {
  var query;

  switch(action.actionType) {
    case SearchConstants.SEARCH_CLICK:
      query = action.query;
      if (query !== '') {
        SearchStore.search(query, action.page, action.count);
      }
      break;

    default:
      // no op
  }
});

module.exports = SearchStore;
