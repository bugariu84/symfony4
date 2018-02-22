require('../scss/app.scss');

import React from 'react';
import ReactDom from 'react-dom';

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

ReactDom.render(<App/>, document.getElementById('root'));