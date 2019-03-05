import React from 'react';
import axios from 'axios';
export default class Makebid extends React.Component{
    constructor(props){
        super(props);
        }
        render(){
        return(
            <div>
                  <span className="btn btn-outline-danger   " onClick={this.props.click}>
                            <i className="fas fa-paper-plane mr-2"></i> 
                            Make Bid
                  </span>
            </div>
        )
    }
}