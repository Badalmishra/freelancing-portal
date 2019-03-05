import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Messages from './messages';
import Table from './table';
import Description from './description';
import Makebid from "./Makebid";
export default class Example extends Component {
    constructor(props) {
        super(props);
        this.state={
            jobs:[ ],
            Name:"",
            Description:"",
            Time:"",
            Money:"",
            Link:"",
            jobForDescription:"",
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
          })
     }
    delete(){
        var index =event.target.id;
        var data ={
             "_method":"delete",
             "id":index,
        };
        var config = {
            'Authorization': "Bearer " + window.token
        };

        axios.post('api/jobs/'+index+'?api_token='+window.token,data)
          .then(res => {
              window.res=res;
              if(res.data=='404'){
                  this.setState({error:"This Bid was not posted by you"});
                  setTimeout(()=>
                      this.setState({error:""})
                  ,3000);
              } else{
                    const jobs = res.data;
                     this.setState({ jobs:jobs });
                     this.setState({alert:"This Bid was deleted"});
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
    changeInputName(){
       // alert(event.key);
        this.setState({
            Name:event.target.value,
        });
    }
    changeInputDescription(){
        // alert(event.key);
         this.setState({
            Description:event.target.value,
         });
     }
    changeInputTime(){
        // alert(event.key);
         this.setState({
             Time:event.target.value,
         });
     }
    changeInputMoney(){
        // alert(event.key);
         this.setState({
             Money:event.target.value,
         });
     }
    changeInputLink(){
        // alert(event.key);
         this.setState({
             Link:event.target.value,
         });
     }
    makeBid(){
        //var body =[this.state.Name,this.state.Description,this.state.Money,this.state.Time,this.state.Link];
        //var user_id=1;
        var body=["mybid","https://www.google.com",this.state.jobForDescription.id,200,30];
        axios.post('api/bids?api_token='+window.token, { body })
            .then(res => {
                window.res=res;
               
        }).catch(err => {
            console.log(err);
            
        });
    }
    setJobForDescription(param){
       this.setState({jobForDescription:param});
       
    }

    render() {
        return (
            <div className="px-3">
                <div className="row">
                    <div className="col-md-4 px-0">
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
                            job={this.state.jobForDescription}
                            />
                            :null
                    }        
                    </div>
                    {   this.state.jobForDescription?
                        <Makebid
                            job={this.state.jobForDescription}
                            click={this.makeBid.bind(this)}
                            />
                            :null
                    }  
                </div>
            </div> 
        );
    }
}

if (document.getElementById('freehome')) {
    ReactDOM.render(<Example/>, document.getElementById('freehome'));
}
