var React = require('react');

var SearchField = require('./SearchField.jsx');
var SearchButton = require('./SearchButton.jsx');
var SearchActions = require('../../actions/SearchActions');
var SearchStore = require('../../stores/SearchStore');
var ENTER_KEY_CODE = 13;

var SearchBar = React.createClass({
  componentDidMount: function() {
    SearchStore.addChangeListener(this._onChange);
  },

  componentWillUnmount: function() {
    SearchStore.removeChangeListener(this._onChange);
  },

  render: function() {
    return (
      <ul>
        <li className="has-form">
          <div className="row collapse">
            <div className="large-8 small-9 columns" >
              <SearchField
                ref="searchField"
                onKeyDown={this._onKeyDown}
                ></SearchField>
            </div>
            <div className="large-4 small-3 columns">
              <SearchButton
                onClick={this._onClick}
                ></SearchButton>
            </div>
          </div>
        </li>
      </ul>
    );
  },
  _search: function(query) {
    if (query.trim()) {
      SearchActions.search(query, 1, 50);
    }
  },
  _onClick: function() {
    var query = this.refs.searchField.getDOMNode().value;
    this._search(query);
  },
  _onKeyDown: function(event) {
    var value = this.refs.searchField.getDOMNode().value;
    if (event.keyCode === ENTER_KEY_CODE) {
      this._search(value);
    }
  },
  _onChange: function() {
    
  }
});

module.exports = SearchBar;
