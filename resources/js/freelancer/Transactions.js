import React from 'react';
import axios from 'axios';
export default class Transaction extends React.Component{
    constructor(props) {
      super(props)
    
      this.state = {
         Transactions:"",
         Message:"",
         Processing:false
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
    click(e){
        this.setState({Processing:true});
        const id = e.target.id;
        axios.get('api/payout/'+id+'/?api_token='+window.token)
        .then(res =>{

            console.log(res.data);
            this.setState({
                Processing:false,
                Transactions:res.data,
                Message:"Payment sent to your paypal acount"
            },console.log(this.state.alert)
            );
            setTimeout(()=>{
                this.setState({
                Message:""
            })},
                4000
            )
        })
    }
    render(){
        return(
            <div className="list-group p-4 mt-5 bg-secondary w-50 ">
           
            <img src="/images/giphy.gif" className={this.state.Processing?null:"hide"} ></img>
            <h2 className=" text-white ">
                 Your Payments
            </h2>
                {
                    this.state.Message?
                    <div className="alert alert-primary">
                        {this.state.Message}
                    </div>
                    :null
                }
                {
                    this.state.Transactions && (!this.state.Processing)?
                    this.state.Transactions.map(Transaction=>{
                    return(
                        <div key={Transaction.id} className=" list-group-item ">
                            <div className="row m-0 p-0">
                                <div className="col-9 pt-4">
                                    For job <b>{Transaction.jobs.body}</b> with 
                                    amount  $<b>{Transaction.jobs.bids[0].price} </b>
                                </div>
                                <div id={Transaction.id} onClick={this.click.bind(this)} className="col-3 text-center btn btn-outline-success">Recieve Payment</div>
                            </div>
                        </div>
                    )
                    })
                    :null
                }
                {
                    this.state.Processing?
                    <h1 className="text-success">
                        Processing your Request ...
                    </h1>
                    :
                    null
                }
            </div>
        )
    }
    
}