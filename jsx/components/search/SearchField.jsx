var React = require('react');

var SearchField = React.createClass({
  render: function() {
    return (
      <input
        type="text"
        placeholder="Find a movie"
        onKeyDown= {this.props.onKeyDown}
        ></input>
    );
  }
});

module.exports = SearchField;
