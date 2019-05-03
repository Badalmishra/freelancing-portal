import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Messages from './messages';
import Table from './table';
import Description from './Description';
import Bid from './Bid';
import Modal from './modal';
import NaughtyModal from './naugthyModel';
import Active from './active';
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
            notifications:[],
            activeJobs:"", 
        };
        window.jobs=this.state.jobs;
    }
    componentDidMount() {
        axios.get(`api/jobs?api_token=`+window.token)
        .then(res => {
          const jobs = res.data.reverse();
         // jobs=jobs.reverse();
          this.setState({ 
              jobs:jobs,
              jobForDescription:jobs[0]?jobs[0]:null,
           });
           axios.get(`api/bids/`+this.state.jobForDescription.id+`?api_token=`+window.token)
            .then(res => this.setState({ bids:res.data.reverse(),}));
        });
        this.pullNotifications();

        axios.get(`api/active/?api_token=`+window.token)
        .then(data => {
            console.log(data);
            if (data.data.length >0) {
                
                
                this.setState({activeJobs:data.data});
            }
            
            });
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
    async pullNotifications(){

       await axios.get(`api/notifications?api_token=`+window.token).then(
            (res)=>{
                //console.log(res.data);
                this.setState({
                notifications:res.data,
                    
                });
            }
        )
    
    
    }
    markSeen(){
       
        var data ={
            "_method":"put",
            "somedata":"oho",
        };
        axios.post('api/notifications/1?api_token='+window.token,data)
        .then(res => {
                this.pullNotifications().then(()=>{
                    $('#naughtyModal').modal('show');
                }
            ); 
        })
        .catch(err => console.log(err));
    }
    complete(params){
        console.log(params);

        var data ={
            "_method":"put",
            "somedata":params,
        };
        var id = params[0];
        axios.post('api/active/'+id+'?api_token='+window.token,data).
        then(res =>
            {
                console.log(res.data);
                this.setState({
                    activeJobs:res.data,
                });
            }
        );
    }

    render() {
        return (
            
            <div className=" bg-white">
                <div className="row  bg-primary lay add-background">
                    <div className="  py-5 col-md-4 px-md-5  ">
                        
                    </div>
                    <div className="side  py-4 px-5 col-md-8   text-center">
                                
                        <div className="display-3 pt-4 animated rotateInDownRight">
                        <span className="bracket">{"<"}</span>
                        <span className="text-primary">Hall Of Fame</span>
                        <span className="bracket">{"/>"}</span><br></br> 
                        </div>
                        <hr className="bg-success"></hr>
                        <div className=" pt-5 row lay pb-3 justify-content-center">
                        {this.state.activeJobs?
                                this.state.activeJobs.map((activeJob)=>{
                            return(
                           <Active
                            key={activeJob.id}
                            activeJob={activeJob}
                            complete={this.complete.bind(this)}
                           />
                           )
                        })
                        :
                        <div  className="card  col-md-4mx-2 p-0 text-left side">
                            <div className="card-header bg-primary">
                                No active projects
                            </div>
                            <div className="card-body text-success    ">
                                <small className="d-block">-----------</small>
                            
                                <small className="d-block">===========</small>
                                <input className="z w-100 py-0"></input>
                            </div>
                            <div className="card-footer bg-success">
                                <button className="btn w-100 btn-sm btn-outline-dark ">
                                Complete
                                </button> 
                            </div>
                        </div>
                        }
                           
                        </div>
                    </div>
                </div>
                <div className=" pt-5 pb-3 tag  bg-secondary text-white text-center" id="formM">
                    <h1 className="">Dash Board
                        <hr className="w-75"></hr>
                    </h1>
                    <div className="row w-50 search mx-auto">
                        <input className="form-component col-9" placeholder="Search by skill"></input>
                        <button className="col-3 btn btn-success form-component">Search</button>
                    </div>
                </div>
                
                <div className="row  lay    ">
                
                    <div className="col-md-3 py-5">
                       
                            <Messages 
                                error={this.state.error} 
                                alert={this.state.alert}
                                />
                            <Table 
                                jobs={this.state.jobs} 
                                click={this.setJobForDescription.bind(this)}
                                /> 
                            
                    </div>
                    <div className="col-md-5 bg-primary py-5">
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
                    <div className="col-md-4  bg-dark py-5" >
                               
                            <div className="card-body p-0 ">
                            <div className=" list-group-item bg-success text-white ">All Bids</div>
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
               
            <Modal
            bidForDescription={this.state.bidForDescription}
            
            />
            <NaughtyModal 
            noughties={this.state.notifications}
            />
            <button onClick={this.markSeen.bind(this)}
                    className=" naughty-button btn btn-lg btn-primary x">
                <i className="fa fa-bell"></i>
                <i className="num">{this.state.notifications.filter(n => !n.status).length}</i>
            </button>
            <div className="p-5 bg-white">
                <Transactions/>
            </div>
            
        </div>
           
        );
    }
}

if (document.getElementById('freehome')) {
    ReactDOM.render(<Example/>, document.getElementById('freehome'));
}
