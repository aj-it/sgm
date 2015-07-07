var AppDispatcher = require('../dispatcher/AppDispatcher');
var ProfilConstants = require('../constants/ProfileConstants');

var ProfileActions = {
  create: function(text) {
    AppDispatcher.dispatch({
      actionType: ProfilConstants.PROFILE_CREATE,
      text: text
    });
  },
};

module.exports = ProfileActions;
