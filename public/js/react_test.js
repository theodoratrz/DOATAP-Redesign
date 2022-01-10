'use strict';

class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
  }

  render() {
    if (this.state.liked) {
      return 'You liked this.';
    }

    return <button onClick={() => this.setState({ liked: true })}>Click</button>;

  }
}

// React replaces the selected DOM element with the rendered component
const domContainer = document.querySelector('#like_button_container');
ReactDOM.render(<LikeButton ref={(pageComponent) => {window.pageComponent = pageComponent}}/>, domContainer);
/* 
 To refer to the component from the DOM, use `window.pageComponent`
*/
