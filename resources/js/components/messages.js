import React, { Component } from 'react';
import ReactDOM from 'react-dom';
export default class Messages extends React.Component{
    constructor(props){
        super(props);

    }
    render(){
        return(
            <div>
                {
                                this.a= this.props.error?
                                
                                    <div className="alert alert-danger">{this.props.error}</div>
                                
                                :null
                            }
                            {
                                this.b= this.props.alert?
                                
                                    <div className="text-success lead">{this.props.alert}</div>
                                
                                :null
                            }
            </div>
        )
    }
}