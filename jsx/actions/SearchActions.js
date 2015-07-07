var AppDispatcher = require('../dispatcher/AppDispatcher');
var SearchConstants = require('../constants/SearchConstants');

var SearchActions = {
  search: function(query, page, count) {
    AppDispatcher.dispatch({
      actionType: SearchConstants.SEARCH_CLICK,
      query: query || '',
      page: page || 1,
      count: count || 5
    });
  }
};

module.exports = SearchActions;
