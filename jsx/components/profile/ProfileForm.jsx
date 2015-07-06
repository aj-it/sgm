var React = require('react');
var ProfileActions = require('../../actions/ProfileActions');
var ProfileStore = require('../../stores/ProfileStore');
var ENTER_KEY_CODE = 13;

var ProfileForm = React.createClass({

  getInitialState: function() {
    return {
      value: ''
    };
  },

  componentDidMount: function() {
    ProfileStore.addChangeListener(this._onChange);
  },

  componentWillUnmount: function() {
    ProfileStore.removeChangeListener(this._onChange);
  },

  render: function() {
    return (
      <div className="ProfilForm">
        <h1 className="profile-banner">Création d'un nouveau profil</h1>
        <div>
          <div className="row">
            <div className="large-12 columns">
              <div className="row collapse">
                <div className="small-10 columns">
                  <input autoFocus={true} onChange={this._onChange} onKeyDown={this._onKeyDown} placeholder="Votre nom de profil" ref="username" type="text" value={this.state.value}/>
                </div>
                <div className="small-2 columns">
                  <a className="button postfix" href="#" onClick={this._onClick}>Valider</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  },
  _save: function(text) {
    console.log('Enregistrement du profil', text);
    if (text.trim()) {
      ProfileActions.create(text);
    }
  },

  _onClick: function(event) {
    var value = this.refs.username.getDOMNode().value;
    if (value != '') {
      this._save(value);
    }
  },

  _onKeyDown: function(event) {
    if (event.keyCode === ENTER_KEY_CODE) {
      this._save(this.state.value);
    }
  },

  _onChange: function(event) {
    var value = '';
    if (event) {
      value = event.target.value
    }
    this.setState({
      value: value
    });
  }
});

module.exports = ProfileForm;
