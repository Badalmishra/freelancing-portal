import React from 'react';

export default class Showbid extends React.Component{
    constructor(props) {
      super(props)
    
      this.state = {
         
      }
    }
    componentDidMount(){
      console.log(this.props);
      
    }
    render() {
      return (
        <div>
          {this.props.theBid.id}
        </div>
      )
    }
}