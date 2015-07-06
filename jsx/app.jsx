var Cookie = require('js-cookie');
var React = require('react');

/*
  Contrôle du profil utilisateur
 */
var sgmCookie = Cookie.get('sgm');
console.log(sgmCookie);
if (sgmCookie) {
  //Cookie.remove('sgm');
// On charge la gate des préférences
  var MovieGrid = require('./components/movie/MovieGrid.jsx');
  React.render(<MovieGrid/>, document.getElementById('app'));
} else {
  var ProfileForm = require('./components/profile/ProfileForm.jsx');
  React.render(<ProfileForm/>, document.getElementById('app'));
}


var SearchBar = require('./components/search/SearchBar.jsx');
React.render(<SearchBar />, document.getElementById('searchBar'));
