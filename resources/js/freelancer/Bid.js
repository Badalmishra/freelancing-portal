import React from 'react';

export default class Bid extends React.Component{
    constructor(props) {
      super(props)
    
      
    }
    
    render() {
      return (
        <div className=" bid ">
          <div className=" row" >
            <p onClick={this.props.showBid?this.props.showBid.bind(this,this.props.theBid):null} 
            className="col-9 list-group-item eachBid" 
            >
            {this.props.theBid.user.name} bided Rs {this.props.theBid.price}
            </p>
            <button className="btn btn-outline-danger col-3 list-group-item" onClick={this.props.deleteBid?this.props.deleteBid.bind(this,this.props.theBid.id):null}>Delete</button>

          </div>
        </div>
      )
    }
}