import {combineReducers} from 'redux';
import postsReducer from './reducer-posts';
import activePostReducer from './reducer-activePost';

const rootReducer = combineReducers({
    posts: postsReducer,
    activePost: activePostReducer
});

export default rootReducer;