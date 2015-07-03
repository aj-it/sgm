var Cookie = require('js-cookie');
var React = require('react');

/*
  Gestion des profils utilisateur -- Bootstrap de l'application
*/
var sgmCookie = Cookie.get('sgm');
if (sgmCookie) {
    // On récupère les profils utilisateur
    console.log(sgmCookie);
    Cookie.remove('sgm');
} else {
  var ProfileForm = require('./components/profile/ProfileForm.jsx');
  React.render(
    <ProfileForm />,
    document.getElementById('app')
  );
}
