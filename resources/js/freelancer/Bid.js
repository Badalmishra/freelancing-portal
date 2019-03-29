import React from 'react';

export default class Bid extends React.Component{
    constructor(props) {
      super(props)
    
      
    }
    
    render() {
      return (
        <div className=" bid ">
          <div className=" row" >
            <p onClick={this.props.showBid.bind(this,this.props.theBid)} className="col-9 list-group-item">{this.props.theBid.user.name} bided Rs {this.props.theBid.price}</p>
            <button className="btn btn-outline-danger col-3 list-group-item" onClick={this.props.deleteBid.bind(this,this.props.theBid.id)}>Delete</button>

          </div>
        </div>
      )
    }
}