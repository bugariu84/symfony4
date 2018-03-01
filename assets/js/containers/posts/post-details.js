import React, {Component} from 'react';
import {connect} from 'react-redux';

class PostDetails extends Component {

    render() {
        if (!this.props.post) {
            return <div>Select a post</div>;
        }

        return (
            <div className='col-sm-8'>
                <div>tile: {this.props.post.title}</div>
                <div>body: {this.props.post.body}</div>
            </div>
        );
    }
}

function mapStateToProps(state) {
    return {
        post: state.activePost
    };
}

export default connect(mapStateToProps)(PostDetails);