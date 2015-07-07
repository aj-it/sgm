var React = require('react');
var MovieActions = require('../../actions/MovieActions');
var SearchStore = require('../../stores/SearchStore');
var Cookie = require('js-cookie');

var MovieLikeButton = React.createClass({
  getInitialState: function() {
    return {
      text: 'I liked!',
      searchObj: {
        query: '',
        total: 0,
        count: 0,
        currentPage: 1
      }
    };
  },

  componentDidMount: function() {
    SearchStore.addChangeListener(this._onChange);
  },

  componentWillUnmount: function() {
    SearchStore.removeChangeListener(this._onChange);
  },

  render: function() {
    return (
      <button className="button" onClick={this._onClick}>{this.state.text}</button>
    );
  },
  _onClick: function() {
    var sgmCookie = Cookie.get('sgm');
    MovieActions.like(this.props.idMovie, sgmCookie, this.state.searchObj);
  },
  _onChange: function(searchObj) {
    this.setState({
      searchObj: {
        query: searchObj.query,
        total: searchObj.total,
        count: searchObj.count,
        currentPage: searchObj.page
      }
    });
  }
});

module.exports = MovieLikeButton;
