var AppDispatcher = require('../dispatcher/AppDispatcher');
var ProfilConstants = require('../constants/ProfileConstants');

var ProfileActions = {
  create: function(text) {
    console.log('appel de action')
    AppDispatcher.dispatch({
      actionType: ProfilConstants.PROFILE_CREATE,
      text: text
    });
    console.log('fin dispatch')
  },
};

module.exports = ProfileActions;
