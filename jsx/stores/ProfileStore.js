var React = require('react');
var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter = require('events').EventEmitter;
var ProfileConstants = require('../constants/ProfileConstants');
var assign = require('object-assign');
var $ = require('jquery');

var CHANGE_EVENT  ='change';

function create(text) {
  console.log('store', text);
  React.unmountComponentAtNode(document.getElementById('app'));
  var ProfileList = require('../components/profile/ProfileList.jsx');
  React.render(
    <ProfileList />,
    document.getElementById('app')
  );
}


var ProfileStore = assign({}, EventEmitter.prototype, {
  emitChange: function() {
    console.log("emitChange")
    this.emit(CHANGE_EVENT);
  },
  addChangeListener: function(callback) {
    console.log("addChangeListener")
    this.on(CHANGE_EVENT, callback);
  },
  removeChangeListener: function(callback) {
    console.log("removeChangeListener")
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
