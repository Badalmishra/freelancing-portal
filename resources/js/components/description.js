import React from 'react';
import ReactDOM from 'react-dom';
export default class Decription extends React.Component{
    constructor(props){
        super(props);
    }

    render(){
        return(
            <div className="card ml-0 animated jello">
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
                        <span className="mr-2">$</span> 
                        {this.props.job.maxMoney}
                    </span>
                    <div className="time btn-group">
                        <span className="btn btn-outline-primary disabled   ">
                            <i className="fa fa-clock mr-2"></i> 
                            {this.props.job.maxDays} Days
                        </span>
                        <span className="btn btn-outline-dark disabled   ">
                            <i className="fas fa-crosshairs mr-2"></i> 
                            {this.props.bidCount} Bids
                        </span>
                    </div>
                    
                </div>
            </div>
        )
    }
}