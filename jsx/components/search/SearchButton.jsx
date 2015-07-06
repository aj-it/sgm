var React = require('react');

var SearchButton = React.createClass({
  render: function() {
    return (
      <a href="#"
        className="alert button expand"
        onClick={this.props.onClick}
        >Search</a>
    );
  },  
});

module.exports = SearchButton;
