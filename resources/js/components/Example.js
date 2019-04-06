import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Addjob from './Addjob';
import Messages from './messages';
import Table from '../freelancer/table';
import Description from './Description';
import Bid from '../freelancer/Bid';
import Modal from '../freelancer/modal';
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
            jobSkills:[],
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
                    this.setJobForDescription(this.state.jobs[0]);
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
                    <div className="  py-5 col-md-4 px-md-5 col-sm-12 ">
                        <Addjob 
                            click={this.addJob.bind(this)} 
                            Name={this.state.Name}
                            change={this.change.bind(this)} 
                            Description={this.state.Description}
                            Time={this.state.Time}
                            Money={this.state.Money}
                            Link={this.state.Link}
                            skillManagement={this.skillManagement.bind(this)}
                            />
                    </div>
                    <div className="bg-dark px-md-5 py-5 col-md-8  col-sm-12 text-center">
                                
                        <div className="display-2 py-5">
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
                <div className="tools bg-white pb-5">
                    <div className="text-center lay p-3 px-5 "> 

                        <h1 className=" text-black">Manage Jobs</h1>
                        <hr className=" bg-success "></hr>
                    </div>
                    <div className="row  bg-white lay px-5">

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
                                    <div className=" list-group-item bg-success text-white">All Bids</div>
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
                <div className="p-5 bg-dark"></div>
             </div> 
        );
    }
}
if (document.getElementById('example')) {
    ReactDOM.render(<Example/>, document.getElementById('example'));
}
