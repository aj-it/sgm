var React = require('react');
var ReactPropTypes = React.PropTypes;
var ENTER_KEY_CODE = 13;
var ProfileActions = require('../../actions/ProfileActions');
var ProfileStore = require('../../stores/ProfileStore');

var ProfileForm = React.createClass({

  propTypes: {
    className: ReactPropTypes.string,
    id: ReactPropTypes.string,
    placeholder: ReactPropTypes.string,
    value: ReactPropTypes.string
  },

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

  _save: function(text) {
    console.log('Enregistrement du profil', text);
    if (text.trim()){
      ProfileActions.create(text);
    }
  },

  _onClick: function(event) {
    console.log('click sur le bouton', event);
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
  },

  render: function() {
    return (
      <div className="ProfilForm">
        <h1 className="profile-banner">Création d'un nouveau profil</h1>
        <form>
          <div className="row">
            <div className="large-12 columns">
              <div className="row collapse">
                <div className="small-10 columns">
                  <input type="text"
                    onKeyDown={this._onKeyDown}
                    onChange={this._onChange}
                    value={this.state.value}
                    autoFocus={true}
                    placeholder="Votre nom de profil" />
                </div>
                <div className="small-2 columns">
                  <a href="#"
                    className="button postfix"
                    onClick={this._onClick}
                    >Valider</a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    );
  }
});

module.exports = ProfileForm;
