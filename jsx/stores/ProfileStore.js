var React = require('react');
var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter = require('events').EventEmitter;
var ProfileConstants = require('../constants/ProfileConstants');
var assign = require('object-assign');
var $ = require('jquery');
var Cookie = require('js-cookie');

var CHANGE_EVENT  ='change';

function create(text) {
  $.ajax({
    type: "POST",
    url: '/api/profile/save',
    dataType: 'json',
    data: {username: text},
    success: function (data, textStatus, jqXHR) {
      Cookie.set('sgm', data.idProfile);
      React.unmountComponentAtNode(document.getElementById('app'));
      var MovieGrid = require('../components/movie/MovieGrid.jsx');
      React.render(<MovieGrid/>, document.getElementById('app'));
    },
    error: function (data, textStatus, jqXHR) {
      console.log(data, textStatus, jqXHR)
    },
  });
}


var ProfileStore = assign({}, EventEmitter.prototype, {
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
  var text;

  switch(action.actionType) {
    case ProfileConstants.PROFILE_CREATE:
      text = action.text.trim();
      if (text !== '') {
        create(text);
      }
      break;

    default:
      // no op
  }
});

module.exports = ProfileStore;
