import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Messages from './messages';
import Table from './table';
import Description from './Description';
import Bid from './Bid';
import Modal from './modal';
export default class Example extends Component {
    constructor(props) {
        super(props);
        this.state={
            bids:"",
            jobs:[ ],
            Name:"",
            Description:"",
            Time:"",
            Money:"",   
            bidForDescription:[],
            alert:"",
            error:"",
        };
        window.jobs=this.state.jobs;
    }
    componentDidMount() {
        axios.get(`api/jobs?api_token=`+window.token)
        .then(res => {
          window.jobs=res.data;
          const jobs = res.data.reverse();
         // jobs=jobs.reverse();
          this.setState({ 
              jobs:jobs,
              jobForDescription:jobs[0]?jobs[0]:null,
           });
           axios.get(`api/bids/`+this.state.jobForDescription.id+`?api_token=`+window.token)
            .then(res => {
              window.bids=res;
        
             // alert(this.props.job.id+"lol");
             // jobs=jobs.reverse();
              this.setState({ 
                  bids:res.data.reverse(),
                  
               });
              
            })
        })
     }
    setJobForDescription(param){
       this.setState({jobForDescription:param});
       axios.get(`api/bids/`+param.id+`?api_token=`+window.token)
            .then(res => {
              window.bids=res;
        
             // alert(this.props.job.id+"lol");
             // jobs=jobs.reverse();
              this.setState({ 
                  bids:res.data.reverse(),
                  jobForDescription:param,
               });
               console.log(this.state.jobForDescription.id+" "+this.state.bids.length);

            })
            
       
    }
    showBid(params){
        console.log(this.state.bidForDescription);
        this.setState({
            bidForDescription:params,
        },()=>{
            console.log(this.state.bidForDescription);
            $('#exampleModal').modal('show');
        });

        window.the=this.state.bidForDescription;        
     }
      getToken(params){
    
        this.setState({
            api_token:params,
        });
            alert(params);
      }
      upbid(params){
          //alert(params);
          this.setState({
              bids:params,
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
                         setTimeout(()=>
                                this.setState({alert:""})
                         ,3000);
                     }
              });
      }
    render() {
        return (
            
            <div className="px-3">
                <div className="row">
                    <div className="col-md-3 px-0">
                        <div className="card">
                            <div className="card-header bg-info">All Jobs</div>
                            
                            <div className="card-body">
                            <Messages 
                                error={this.state.error} 
                                alert={this.state.alert}
                                />
                            <Table 
                                jobs={this.state.jobs} 
                                click={this.setJobForDescription.bind(this)}
                                /> 
                            </div>
                        </div>
                    </div>
                    <div className="col-md-4 px-2">
                    {   this.state.jobForDescription?
                        <Description
                            upbid={this.upbid.bind(this)}
                            job={this.state.jobForDescription}
                            api_token={this.state.api_token}
                            bids={this.state.bids}
                          />
                            :null
                    }        
                    </div>
                    <div className="col-md-5">
                        <div className="card">        
                            <div className="card-body p-0 ">
                            <div className=" list-group-item bg-success text-white">All Bids</div>
                                <div className="fix-scroll">
                                    {   this.state.bids?
                                        this.state.bids.map((bid,id)=>{
                                            return(
                                                <Bid key={id}
                                                    theBid={bid}
                                                    showBid={this.showBid.bind(this)}
                                                    deleteBid={this.deleteBid.bind(this)}/>
                                            )
                                        }):null
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <Modal
            bidForDescription={this.state.bidForDescription}/>
                
            </div>
           
        );
    }
}

if (document.getElementById('freehome')) {
    ReactDOM.render(<Example/>, document.getElementById('freehome'));
}
