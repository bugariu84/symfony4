import React, { Component } from 'react';
import { connect } from 'react-redux';
import { selectPost } from "../../actions/index";
import { bindActionCreators } from 'redux';

class PostList extends Component {
    renderList() {
        return this.props.posts.map(post => {
            return (
                <li key={post.title} onClick={() => {this.props.selectPost(post)}} className="list-group-item">
                    {post.title}
                </li>
            );
        });
    }

    render() {
        return (
            <ul className="list-group">
                {this.renderList()}
            </ul>
        );
    }
}

// Anything returned from this function will end up as props
// on PostList container
function mapStateToProps(state) {
    // What ever is returned will show up as props
    // Inside BookList
    return {
      posts: state.posts
    };
}

function mapDispatchToProps(dispatch) {
    // Whenever selectPost is called, the result should be pass
    // to all of ours reducers
    return bindActionCreators({ selectPost: selectPost }, dispatch);
}

// Promote PostList from a component to a container
export default connect(mapStateToProps, mapDispatchToProps)(PostList);