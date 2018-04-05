import React, { Component } from 'react';
import './App.css';
import Search from './Search';
import Carousel from './Carousel';


class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      params: ''
    };
  }

  search = (param) => {
    this.setState({ params: param });
  }


  render() {
    return (
      <div className="App">
        <header className="App-header">
          <h1 className="App-title">Welcome to Photo App</h1>
        </header>
        <Search search={this.search} />
        <hr />
        <Carousel keyword={this.state.params || "clock"} />
      </div>
    );
  }
}

export default App;
