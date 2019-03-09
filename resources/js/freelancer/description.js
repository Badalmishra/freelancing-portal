import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Bid from './Bid'
import Makebid from './Makebid';

export default class Decription extends React.Component{
    constructor(props){
        super(props);
        this.state={
                bids:[],
               
        }
        //window.prop =this.props.job.id;
    }
    componentDidUpdate(prevProps){
        
        if (this.props.job !== prevProps.job) {
           // window.id=this.props.job.id;
            axios.get(`api/bids/`+this.props.job.id+`?api_token=`+window.token)
            .then(res => {
              window.bids=res;
        
             // alert(this.props.job.id+"lol");
             // jobs=jobs.reverse();
              this.setState({ 
                  bids:res.data.reverse(),
                  
               });
              
            })
            
          }
    }
    componentDidMount() {
   
        axios.get(`api/bids/`+this.props.job.id+`?api_token=`+window.token)
        .then(res => {
          window.bids=res;
    
         // alert(this.props.job.id+"lol");
         // jobs=jobs.reverse();
          this.setState({ 
              bids:res.data.reverse(),
              
           });
          
        })
  
     }

     makeBid(){
        //var body =[this.state.Name,this.state.Description,this.state.Money,this.state.Time,this.state.Link];
        //var user_id=1;
        var body=["mybid","https://www.google.com",this.props.job.id,200,30];
        console.log(this.props.job.id);
        
        axios.post('api/bids?api_token='+window.token, { body })
            .then(res => {
                window.res=res;
                console.log(res.data);
                
                this.setState({ 
                    bids:res.data,
                    
                 });
               
        }).catch(err => {
            console.log(err);
            
        });
    }
    deleteBid(params){
        var index =params;
        console.log(params);
        
            var data ={
                 "_method":"delete",
                 "id":index,
            };
            var config = {
                'Authorization': "Bearer " + window.token
            };

            axios.post('api/bids/'+index+'?api_token='+window.token,data)
              .then(res => {
                  window.res=res;
                  if(res.data=='404'){
                      this.setState({error:"This Bid was not posted by you"});
                      setTimeout(()=>
                          this.setState({error:""})
                      ,3000);
                  } else{
                        const bids = res.data;
                         this.setState({ bids:bids });
                         this.setState({alert:"This Bid was deleted"});
                        //  if(index==this.state.jobForDescription.id){
                        //     this.setState({
                        //         jobForDescription:this.state.jobs[0]?this.state.jobs[0]:null,
                        //     });
                        //  }
                         setTimeout(()=>
                                this.setState({alert:""})
                         ,3000);
                     }
              });
    }

    render(){
        return(
            <div className="card ml-0 ">
                <div className="card-header bg-primary">{this.props.job.body}</div>
                <div className="card-body">
                    <p className="text-success lead">Description {this.props.job.id}</p>
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
                <div className="card-body  p-0">
                    <div className=" list-group-item bg-success text-white">All Bids</div>
                    <div class="fix-scroll ">
                    {   
                        this.state.bids.map((bid,id)=>{
                            return(
                        
                                <Bid key={id}
                                    theBid={bid}
                                    showBid={this.props.showBid}
                                    deleteBid={this.deleteBid.bind(this)}/>
                            
                            )
                        })
                    }
                 </div>
                </div>
            </div>
        )
    }
}