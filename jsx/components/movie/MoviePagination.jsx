var React = require('react');

var MoviePagination = React.createClass({
  render: function() {
    var content = [];
    for (var i = 1; i <= (this.props.count /this.props.maxItems); i++ ) {
      var liProps = {
        key: "li-mp-" + i
      };
      var aProps = {
        onClick: this._onClick.bind(this, i)
      };
      if (i == 1) {
        liProps.className= 'current';
      }
      var a = React.createElement('a', aProps, i);
      var li = React.createElement('li', liProps, a);

      content.push(li);
    }

    return (
      <ul className="pagination">
        {content}
      </ul>
    );
  },

  _onClick: function(page) {

    console.log('click', page)
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
