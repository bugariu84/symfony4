require('../scss/app.scss');

import React from 'react';
import ReactDom from 'react-dom';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from 'redux';
import reducers from './reducers    '

const createStoreWithMiddleware = applyMiddleware()(createStore);

class App extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            message: "welcomeate-asi"
        };
    }

    render() {
        return (
            <div>
                {this.state.message}
            </div>
        );
    }
}

ReactDOM.render(
    <Provider store={createStoreWithMiddleware(reducers)}>
        <App />
    </Provider>
    , document.querySelector('#root'));