import React, { Component } from 'react';

export default class Search extends Component {
    constructor(props) {
        super(props);
        this.state = {
            params: ''
        };
    }

    handleSubmit = (event) => {
        this.props.search(this.state.params);
        event.preventDefault();
    }

    handleInputChange = (event) => {
        const target = event.target;
        const value = target.value;
        this.setState({
            params: value
        });
    }

    render() {
        return (
            <div>
                <form className="form-inline mt-3 ml-3" onSubmit={this.handleSubmit}>
                    <label className="sr-only" >Search</label>
                    <input type="text" className="form-control mb-2 mr-sm-2" placeholder="write something here"
                        value={this.state.param} onChange={this.handleInputChange} />
                    <button type="submit" className="btn btn-primary mb-2">Search</button>
                </form>
            </div>
        );
    }
}
