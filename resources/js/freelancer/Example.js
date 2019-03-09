import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Messages from './messages';
import Table from './table';
import Description from './description';
export default class Example extends Component {
    constructor(props) {
        super(props);
        this.state={
            jobs:[ ],
            Name:"",
            Description:"",
            Time:"",
            Money:"",   
            bidForDescription:"",
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

   
 
    setJobForDescription(param){
       this.setState({jobForDescription:param});
       
    }
    showBid(params){
        console.log(params);
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
                            job={this.state.jobForDescription}
                            showBid={this.showBid}
                          />
                            :null
                    }        
                    </div>
                  
                </div>
            </div> 
        );
    }
}

if (document.getElementById('freehome')) {
    ReactDOM.render(<Example/>, document.getElementById('freehome'));
}
