var React = require('react');
var MovieActions = require('../../actions/MovieActions');
var Cookie = require('js-cookie');

var MovieLikeButton = React.createClass({
  getInitialState: function() {
    return {
      text: 'I liked!'
    };
  },

  componentDidMount: function() {
    //ProfileStore.addChangeListener(this._onChange);
  },

  componentWillUnmount: function() {
    //ProfileStore.removeChangeListener(this._onChange);
  },

  render: function() {
    return (
      <button className="button" onClick={this._onClick}>{this.state.text}</button>
    );
  },
  _onClick: function() {
    var sgmCookie = Cookie.get('sgm');
    MovieActions.like(this.props.idMovie, sgmCookie);
  }
});

module.exports = MovieLikeButton;
