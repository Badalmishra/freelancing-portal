import React from 'react';
import axios from 'axios';
export default class Transaction extends React.Component{
    constructor(props) {
      super(props)
    
      this.state = {
         Transactions:""
      }
      
    }
    componentDidMount(){
        axios.get(`api/mytransactions?api_token=`+window.token)
        .then(res => {
          const Transactions = res.data.reverse();
          this.setState({ 
              Transactions:Transactions,
           },
           ()=>{console.log(this.state.Transactions);}
        );
        });
    }
    render(){
        return(
            <div className="list-group">
                {
                    this.state.Transactions?
                    this.state.Transactions.map(Transaction=>{
                    return(
                        <div key={Transaction.id} className=" list-group-item ">
                            <div className="row m-0 p-0">
                                <div className="col-9">
                                    For job <b>{Transaction.jobs.body}</b> with 
                                    amount  $<b>{Transaction.jobs.bids[0].price} </b>
                                </div>
                                <div className="col-3 text-center btn btn-outline-success">Recieve Payment</div>
                            </div>
                        </div>
                    )
                    })
                    :null
                }
            </div>
        )
    }
    
}