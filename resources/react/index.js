import React from 'react';
import ReactDOM from 'react-dom';
import Root from "./screens/Root";

class App extends React.PureComponent {
    render() {
        return (
            <Root />
        )
    }
}

export default App;

if (document.getElementById('react_app')) {
    ReactDOM.render(<App />, document.getElementById('react_app'));
}
