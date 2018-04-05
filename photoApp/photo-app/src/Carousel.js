import React, { Component } from 'react';
import $ from 'jquery';
import './Carousel.css';

export default class Carousel extends Component {
    constructor(props) {
        super(props);
        this.state = {
        };
        this.i = 0;
    }


    setCurrentPic = function () {
        this.setState({
            currentPicture: this.state.picture[this.i]
        });
    }

    handleNext = (e) => {
        this.i < this.state.picture.length - 1 ? ++this.i : this.i = 0;

        this.setCurrentPic();

        e.preventDefault();
    }

    handlePrev = (e) => {
        this.i > 0 ? --this.i : this.i = this.state.picture.length - 1;

        this.setCurrentPic();

        e.preventDefault();
    }

    getPics = function (keyword) {
        $.getJSON("https://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
            { format: "json", tags: keyword }, data => {
                var pictures = data.items.map(picture => {
                    return {
                        title: picture.title,
                        url: picture.media.m.replace("_m.", ".")
                    };
                });
                this.setState({
                    picture: pictures
                });
                this.setCurrentPic();
            });
    }

    componentDidMount() {
        this.getPics(this.props.keyword);
    }

    componentWillReceiveProps(nextProps) {
        if (nextProps.keyword !== this.props.keyword) {
            this.getPics(nextProps.keyword);
        }
        this.i = 0;
    }


    render() {
        return (
            <div>
                <div className="carousel slide mt-3 col-sm-8 offset-md-2 mb-2">
                    <div className="carousel-inner">
                        <div className="carousel-item active">
                            <img className="d-block w-100 Carousel-img" src={this.state.currentPicture ? this.state.currentPicture.url : ""} alt="" />
                            <div className="carousel-caption d-none d-md-block">
                                <h3>{this.state.currentPicture ? this.state.currentPicture.title : ""}</h3>
                            </div>
                        </div>
                    </div>
                    <a className="carousel-control-prev" id="prev" role="button" onClick={this.handlePrev}>
                        <span className="carousel-control-prev-icon" ></span>
                        <span className="sr-only">Previous</span>
                    </a>
                    <a className="carousel-control-next" id="next" role="button" onClick={this.handleNext}>
                        <span className="carousel-control-next-icon" ></span>
                        <span className="sr-only">Next</span>
                    </a>
                </div>
            </div>
        );
    }
}
