require('../scss/app.scss');

import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from 'redux';
import reducers from './reducers';

import PostList from './containers/posts/post-list';
import PostDetails from './containers/posts/post-details';
import Search from './containers/search';

const createStoreWithMiddleware = applyMiddleware()(createStore);

class App extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            message: "welcome mai friend"
        };
    }

    render() {
        return (
            <div>
                <div className='col-sm-4'>
                    <Search/>
                    <PostList />
                </div>
                <PostDetails />
            </div>
        );
    }
}

ReactDOM.render(
    <Provider store={createStoreWithMiddleware(reducers)}>
        <App />
    </Provider>
    , document.querySelector('#root'));