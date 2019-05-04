import React from 'react';
export default class Transaction extends React.Component{
    constructor(props) {
      super(props)
    
      this.state = {
         
      }
      
    }
    render(){
        return(
            <div className="list-group">
                <div className=" list-group-item ">
                    <div className="row m-0 p-0">
                        <div className="col-9">The message with amount</div>
                        <div className="col-3 text-center btn btn-outline-success">Recieve Payment</div>
                    </div>
                </div>
            </div>
        )
    }
    
}