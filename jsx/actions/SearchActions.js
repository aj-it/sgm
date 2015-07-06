var AppDispatcher = require('../dispatcher/AppDispatcher');
var SearchConstants = require('../constants/SearchConstants');

var SearchActions = {
  search: function(value) {
    AppDispatcher.dispatch({
      actionType: SearchConstants.SEARCH_CLICK,
      value: value
    });
  }
};

module.exports = SearchActions;
