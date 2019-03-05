import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Bid from './Bid'
import Makebid from './Makebid'
export default class Decription extends React.Component{
    constructor(props){
        super(props);
        this.state={
                bids:[],
        }
    }
    componentDidMount() {
        var id = this.props.job.id;
        axios.get(`api/bids/`+id+`?api_token=`+window.token)
          .then(res => {
            window.bids=res.bids;
            const bids = res.data.reverse();
           // jobs=jobs.reverse();
            this.setState({ 
                bids:bids,
                
             });
            
          })
     }

     makeBid(){
        //var body =[this.state.Name,this.state.Description,this.state.Money,this.state.Time,this.state.Link];
        //var user_id=1;
        var body=["mybid","https://www.google.com",this.props.job.id,200,30];
        axios.post('api/bids?api_token='+window.token, { body })
            .then(res => {
                window.res=res;
                this.setState({ 
                    bids:res.data,
                    
                 });
               
        }).catch(err => {
            console.log(err);
            
        });
    }

    render(){
        return(
            <div className="card ml-0 ">
                <div className="card-header bg-primary">{this.props.job.body}</div>
                <div className="card-body">
                    <p className="text-success lead">Description</p>
                    <hr></hr>
                    <p>{this.props.job.description}</p>
                    {
                        this.props.job.linkToReferenceProject!=""?
                        <a className="btn btn-warning" href={this.props.job.linkToReferenceProject}>
                           Link to Reference Project <i className="fa fa-paperclip ml-2"></i> 
                        </a>
                        :
                        <a className="btn btn-warning disableb" href="#">
                        No Reference Project <i className="fa fa-paperclip ml-2"></i> 
                        </a>
                    }
                </div>
                <div className="card-footer ">
                    <span className="btn btn-outline-success disabled" 
                       title="Maximum Money client is willing to pay">
                        <i className="fas fa-rupee-sign mr-2"></i> 
                        {this.props.job.maxMoney}
                    </span>
                    <div className="time btn-group">
                        <span className="btn btn-outline-primary disabled   ">
                            <i className="fa fa-clock mr-2"></i> 
                            {this.props.job.maxDays} Days
                        </span>
                        <span className="btn btn-outline-dark disabled   ">
                            <i className="fas fa-crosshairs mr-2"></i> 
                            {this.state.bids.length} Bids
                        </span>
                        
                    </div>
                    
                        <Makebid
                            job={this.props.job.id}
                            click={this.makeBid.bind(this)}
                            />
                       
                </div>
                <div className="card-body fix-scroll">
                {
                    this.state.bids.map((bid)=>{
                        return(
                        
                            <Bid 
                                theBid={bid}/>
                           
                        )
                    })
                }
                </div>
            </div>
        )
    }
}