import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Addjob from './Addjob';
import Messages from './messages';
import Table from '../freelancer/table';
import Description from './Description';
import Bid from '../freelancer/Bid';
import Modal from '../freelancer/modal';
import Active  from "./active";
export default class Example extends Component {
    constructor(props) {
        super(props);
        this.state={
            jobs:[ ],
            bids:[],
            Name:"",
            Description:"",
            bidForDescription:[],
            Time:"",
            Money:"",
            Link:"",
            jobForDescription:"",
            alert:"",
            error:"",
            skills:"",
            jobSkills:[],
            notifications:[],
            activeJobs:"",
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
             }
             ,()=>{
                console.log(this.state.jobForDescription);
                {this.state.jobForDescription?
                axios.get(`api/bids/`+this.state.jobForDescription.id+`?api_token=`+window.token)
                .then(res => {
                  window.bids=res.data;
                    console.log(res.data);
                    
                 // alert(this.props.job.id+"lol");
                 // jobs=jobs.reverse();
                  this.setState({ 
                      bids:res.data.reverse(),
                      
                   });
                  
                })
            :null}
            }
             );
          });
        axios.get(`api/active/?api_token=`+window.token)
        .then(data => {
            console.log(data);
            if (data.data.length >0) {
                
                
                this.setState({activeJobs:data.data});
            }
            
            });
     }
     componentWillMount(){
        axios.get(`api/skills?api_token=`+window.token)
        .then(res => {
          window.skills=res.data;
          const skills = res.data;
         // jobs=jobs.reverse();
          this.setState({ 
              skills:skills,
           });
        })
     }
    delete(){
        var index =event.target.id;
        var data ={
             "_method":"delete",
             "id":index,
        };
  
        axios.post('api/jobs/'+index+'?api_token='+window.token,data)
          .then(res => {
              window.res=res;
              if(res.data=='404'){
                  this.setState({error:"This job was not posted by you"});
                  setTimeout(()=>
                      this.setState({error:""})
                  ,3000);
              } else{
                    const jobs = res.data;
                     this.setState({ jobs:jobs });
                     this.setState({alert:"This job was deleted"});
                     if(index==this.state.jobForDescription.id){
                        this.setState({
                            jobForDescription:this.state.jobs[0]?this.state.jobs[0]:null,
                        });
                     }
                     setTimeout(()=>
                            this.setState({alert:""})
                     ,3000);
                 }
          });
    }
    change(e){
       // alert(event.key);
        this.setState({
            [event.target.name]:event.target.value,
        });
    }
    addJob(){
        var body =[
                this.state.Name,
                this.state.Description,
                this.state.Money,this.state.Time,
                this.state.Link,
                this.state.jobSkills];
        var user_id=1;
        axios.post('api/jobs?api_token='+window.token, { body })
            .then(res => {
                window.res=res;
            
                
                
                this.setState({
                    jobs:res.data,
                    jobForDescription:res.data[0],
                    Name:"",
                    Description:"",
                    Time:"",
                    Money:"",
                    Link:"",
                    jobSkills:[],
                    alert:"The Job Has Been Added Successfully",
                },console.log(this.state.alert)
                );
                setTimeout(()=>
                    this.setState({alert:"",})
                    ,4000)
                console.log(this.state.jobs);
        });
       
        
        
    }
    setJobForDescription(param){
       this.setState({
           jobForDescription:param
        },()=>{
            console.log(this.state.jobForDescription);
            
            axios.get(`api/bids/`+this.state.jobForDescription.id+`?api_token=`+window.token)
            .then(res => {
              window.bids=res.data;
                console.log(res.data);
                
             // alert(this.props.job.id+"lol");
             // jobs=jobs.reverse();
              this.setState({ 
                  bids:res.data.reverse(),
                  
               });
              
            })
        });

       
    }
    skillManagement(params){
        const arr = this.state.jobSkills;
        if(!(arr.indexOf(params)+1)){
            arr.push(params);
            this.setState({
                jobSkills:arr,
            });
        }else{
            arr.splice(arr.indexOf(params),1);
            this.setState({
                jobSkills:arr,
            });
        }
        console.log(this.state.jobSkills);
    }
    approve(){
        const id =this.state.bidForDescription.id;
        var data ={
            "_method":"put",
            "somedata":"oho",
        };
        axios.post('api/jobs/'+id+'?api_token='+window.token,data)
        .then(res => {
            console.log(res.data);
            this.setState({
                    bidForDescription:"",
                    jobs:res.data.reverse(),
                },

                ()=>{
                    console.log("done");
                   this.state.jobs[0]? this.setJobForDescription(this.state.jobs[0]):null;
                }
            );
        })
        .catch(err => console.log(err));
        $('#exampleModal').modal('hide');
        
        
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

    render() {
        return (
            <div className="p-0 ">
                <div className="row  bg-primary lay add-background">
                    <div className="  py-5 col-md-4 px-md-5  ">
                        {this.state.skills?
                        <Addjob 
                            click={this.addJob.bind(this)} 
                            Name={this.state.Name}
                            change={this.change.bind(this)} 
                            Description={this.state.Description}
                            Time={this.state.Time}
                            Money={this.state.Money}
                            Link={this.state.Link}
                            skills={this.state.skills}
                            skillManagement={this.skillManagement.bind(this)}
                            />
                        
                    
                        :null}
                    </div>
                    <div className="bg-dark  py-5 col-md-8   text-center">
                                
                        <div className="display-2 py-5 animated rotateInDownRight">
                        <span className="bracket">{"<"}</span>
                        <span className="text-primary">Ask the </span><br></br> 
                        <span className="ml-5 px-4 text-primary">Geeks</span>
                        <span className="bracket">{"/>"}</span>
                        </div>
                        <Messages 
                                    error={this.state.error} 
                                    alert={this.state.alert}
                                    />
                    </div>
                </div>
                <div className="tools bg-white lay">
                    <div className="text-center  p-3 px-5 lay"> 

                        <h1 className=" text-black">Manage Jobs</h1>
                        <hr className=" bg-success "></hr>
                    </div>
                    <div className="row  bg-white lay px-md-5 px-sm-0 px-xs-0">

                        <div className="col-md-4"> 
                                    <Table 
                                        jobs={this.state.jobs} 
                                        delete={this.delete.bind(this)} 
                                        click={this.setJobForDescription.bind(this)}
                                        /> 
                            </div>
                            <div className="col-md-5 ">
                            {   this.state.jobForDescription?
                                <Description
                                    job={this.state.jobForDescription}
                                    bidCount={this.state.bids.length}
                                    />
                                    :null
                            }
                            </div>
                            <div className="col-md-3  ">       
                                    <div className=" list-group-item bg-success text-white bidsholder">All Bids</div>
                                        <div className="fix-scroll box">
                                        {this.state.bids!=""?
                                        this.state.bids.map((bids)=>{
                                        return( <Bid 
                                            theBid={bids}
                                            showBid={this.showBid.bind(this)}
                                            />)
                                        })
                                        :null
                                        }
                                        </div>
                            </div>
                        </div>
                </div>
                <Modal
                    bidForDescription={this.state.bidForDescription}
                    approve={this.approve.bind(this)}
                />
                <div className="p-5 bg-dark">
                    
                <div className=" pt-5 row lay pb-3 justify-content-center">
                    {this.state.activeJobs!=""?
                        this.state.activeJobs.map((activeJob)=>{
                            return(
                                <Active
                                key={activeJob.id}
                                activeJob={activeJob}
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
                                Pay
                                </button> 
                            </div>
                        </div>
                        }
                    </div>
                </div>
             </div> 
        );
    }
}
if (document.getElementById('example')) {
    ReactDOM.render(<Example/>, document.getElementById('example'));
}
