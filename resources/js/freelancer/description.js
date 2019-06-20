import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Bid from './Bid'
import Makebid from './Makebid';

export default class Decription extends React.Component{
    constructor(props){
        super(props);
        this.state={
            error:"",
        }
        //window.prop =this.props.job.id;
    }



     makeBid(params){
        var body=params;
        console.log(params[2]);
        params=params.slice();
        axios.post('api/bids?api_token='+window.token, { body })
            .then(res => {
               if(res.data.error){
                   console.log(res.data.error);
                   this.setState({
                    error:res.data.error,
                    });

                    setTimeout(()=>this.setState({error:"",})
                    ,3000);
               }else{
                 this.props.upbid(res.data);
               }
               
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
                  console.log(res);
                  
                  if(res.data=='404'){
                      this.setState({error:"This Bid was not posted by you"});
                      console.log(this.state.error);
                      
                      setTimeout(()=>
                          this.setState({error:""})
                      ,3000);
                  } else{
                        let bids = res.data;
                        console.log(this.state.bids.length);
                        
                         this.setState({ bids:bids });
                         this.setState({alert:"This Bid was deleted"});
                         console.log(this.state.alert);
                         
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
            <div className="card ml-0 x text-white">
                <div className="card-header ">{this.props.job.body}</div>
                <div className="card-body">
                    
                   
                    <p>{this.props.job.description}</p>
                    <hr></hr>
                    {
                        this.props.job.linkToReferenceProject!=""?
                        <a className="btn btn-warning btn-sm" href={this.props.job.linkToReferenceProject}>
                           Link to Reference Project <i className="fa fa-paperclip ml-2"></i> 
                        </a>
                        :
                        <a className="btn btn-warning disableb btn-sm" href="#">
                        No Reference Project <i className="fa fa-paperclip ml-2"></i> 
                        </a>
                    }
                    <div className="btn-group mt-4 d-block text-success">
                        {
                            this.props.job.job_skills.map((data)=>{
                                return(
                                <button className="btn disabled btn-outline-dark btn-sm text-success"
                                     key={data.skills.id}>{data.skills.name}
                                     </button>)
                            })
                        }
                    </div>
                    <small className="text-success">
                        Posted By: {this.props.job.user.name}
                    </small>
                    <hr></hr>
                   {
                       this.state.error?
                       
                           <div className="alert alert-danger">{this.state.error}</div>
                       
                       :null
                   }
                    <Makebid
                                job={this.props.job.id}
                                click={this.makeBid.bind(this)}
                                />
                </div>
                <div className="card-footer ">
                    <span className="btn  btn-sm btn-outline-success disabled" 
                       title="Maximum Money client is willing to pay">
                        <span className="mr-2">$</span> 
                        {this.props.job.maxMoney}
                    </span>
                    <div className="time btn-group">
                        <span className="btn btn-sm btn-outline-info disabled   ">
                            <i className="fa fa-clock mr-2"></i> 
                            {this.props.job.maxDays} Days
                        </span> 
                        <span className="btn btn-sm btn-outline-warning disabled   ">
                            <i className="fas fa-crosshairs mr-2"></i> 
                            {this.props.bids.length} Bids
                        </span>
                        
                    </div>
                </div>
                
                
            </div>
        )
    }
}