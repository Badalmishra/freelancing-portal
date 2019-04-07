import React from 'react';

export default class Bid extends React.Component{
    constructor(props) {
      super(props)
    
      
    }
    
    render() {
      return (
        <div className=" bid animated jello ">
          <div className=" row " >
            <p onClick={this.props.showBid?this.props.showBid.bind(this,this.props.theBid):null} 
            className={this.props.deleteBid?"col-9 list-group-item eachBid":"col-12 list-group-item eachBid"}
            >
            {this.props.theBid.user.name} bided Rs {this.props.theBid.price}
            </p>
            {this.props.deleteBid?
            <button className="btn btn-outline-danger col-3 list-group-item" onClick={this.props.deleteBid?this.props.deleteBid.bind(this,this.props.theBid.id):null}>Delete</button>
            :null}
          </div>
        </div>
      )
    }
}