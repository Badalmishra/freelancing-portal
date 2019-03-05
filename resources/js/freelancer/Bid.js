import React from 'react';

export default class Bid extends React.Component{
    constructor(props) {
      super(props)
    
      this.state = {
         
      }
    }
    render() {
      return (
        <div>
          {this.props.theBid.user.name} bided Rs {this.props.theBid.price}
          <hr></hr>
        </div>
      )
    }
}