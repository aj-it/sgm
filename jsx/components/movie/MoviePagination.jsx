var React = require('react');

var SearchStore = require('../../stores/SearchStore');
var SearchActions = require('../../actions/SearchActions');

var MoviePagination = React.createClass({
  getInitialState: function() {
    return {
      query: '',
      total: 0,
      count: 0,
      currentPage: 1
    };
  },
  componentDidMount: function() {
    SearchStore.addChangeListener(this._onChange);
  },

  componentWillUnmount: function() {
    SearchStore.removeChangeListener(this._onChange);
  },
  render: function() {
    var content = [];
    if (this.state.total > 0) {

      // first item pagination
      content.push(
        React.createElement('li', {className:"arrow unavailable"},
        React.createElement('a', {onClick: this._onClick.bind(this, 'previous')}, "«")
      ));

      var unavailable = React.createElement('li', {className:"arrow unavailable"},
        React.createElement('a', {onClick: this._onClick.bind(this, 'previous')}, "...")
      );
// TODO finir l'animation de la pagination
      var totalPage = Math.ceil(this.state.total / this.state.count);
      var numberStartIndex = 4;
      var numberEndIndex = totalPage - 2;

      var startIndex = 1;
      if (this.state.currentPage == totalPage - (numberStartIndex + 2) ) {
        startIndex = this.state.currentPage;
      } else if (this.state.currentPage > numberStartIndex) {
        startIndex = this.state.currentPage - 2;
      }

      for (var i = 1; i <= totalPage; i++ ) {

        if (i >= startIndex && i < (numberStartIndex + startIndex)) {
          content.push(this._createItem(i));
        }

        if (i > numberEndIndex) {
          content.push(this._createItem(i));
        }


        if ( i == (numberStartIndex + startIndex) ) {
          content.push(unavailable);
        }
      }

      // last item pagination
      content.push(
        React.createElement('li', {className:"arrow"},
        React.createElement('a', {onClick: this._onClick.bind(this, 'next')}, "»")
      ));
    }

    return (
      <ul className="pagination" ref="movie-pagination">
        {content}
      </ul>
    );
  },

  _createItem: function(i) {
    var liProps = {
      key: "li-mp-" + i
    };
    var aProps = {
      onClick: this._onClick.bind(this, i)
    };
    if (i == this.state.currentPage) {
      liProps.className= 'current';
    }
    var a = React.createElement('a', aProps, i);
    var li = React.createElement('li', liProps, a);

    return li;
  },

  _onClick: function(page) {
    // navigation in the pagination
    if (page == 'previous') {
      page = 1;
      if (this.state.currentPage > 1) {
          page = this.state.currentPage - 1;
      }
    } else if (page == 'next') {
      if (this.state.currentPage < Math.ceil(this.state.total / this.state.count)) {
          page = this.state.currentPage + 1;
      } else {
        page = this.state.currentPage;
      }
    }
    this.setState({currentPage: page});
    SearchActions.search(this.state.query, page, this.state.count)
  },
  _onChange: function(searchObj) {
    this.setState({
      query: searchObj.query,
      total: searchObj.total,
      count: searchObj.count,
      currentPage: searchObj.page
    });
    console.log("reload state of pagination bar with params : ", searchObj);
  }
});

module.exports = MoviePagination;


/*
<li className="arrow unavailable">
  <a href="">&laquo;</a>
</li>
<li className="current">
  <a href="">1</a>
</li>
<li>
  <a href="">2</a>
</li>
<li>
  <a href="">3</a>
</li>
<li>
  <a href="">4</a>
</li>
<li className="unavailable">
  <a href="">&hellip;</a>
</li>
<li>
  <a href="">12</a>
</li>
<li>
  <a href="">13</a>
</li>
<li className="arrow">
  <a href="">&raquo;</a>
</li>
 */
