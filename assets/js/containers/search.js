import React, {Component} from 'react';

export default class Search extends Component {
    render() {
        return (
            <div className='form-group'>
                <input type="text" className='form-control' placeholder='Search post'/>
            </div>
        );
    };
}
