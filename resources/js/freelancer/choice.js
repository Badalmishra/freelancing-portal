import React from 'react';
import ReactDOM from 'react-dom';

export default class Choice extends React.Component{
    constructor(props){
        super(props);
    }
    componentDidMount(){
        console.log(this.props.job);
        
    }
    render(){
        return(
            <div id={this.props.key} className="card ml-0 x text-white mt-5 animated tada">
                <div className="card-header ">Active Job</div>
                <div className="card-body">
                    
                   <h2>{this.props.job.body}</h2>
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
                    <span className="text-success">
                        Posted By: {this.props.job.user.name}
                    </span>
                    
                    
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
                            {this.props.job.bids.length} Bids
                        </span>
                        
                    </div>
                </div>
                
                
            </div>
        )
    }
}