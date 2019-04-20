import React from 'react';
export default class Active extends React.Component{
    constructor(props) {
      super(props)
    
      this.state = {
         value:"",
      }
    }
    handle(){
        this.setState({
            [event.target.name]:event.target.value,
        });
    }
    click(){
        const job_id=this.props.activeJob.id;
        const input = this.state.value;
        const params = [job_id,input];
        this.props.complete(params);
    }
    render() {
      return (
    
          
                            <div  className="card  col-md-4mx-2 p-0 text-left side">
                                <div className="card-header bg-primary">
                                    {this.props.activeJob.body}
                                </div>
                                <div className="card-body text-success    ">
                                    <small className="d-block">Started at: {this.props.activeJob.updated_at}</small>
                                 
                                    <small className="d-block">Time Left : {this.props.activeJob.left} Days</small>
                                    <input name="value" value={this.state.value} onChange={this.handle.bind(this)} className="z w-100 py-0"></input>
                                </div>
                                <div className="card-footer bg-success">
                                    <button  onClick={this.click.bind(this)} className="btn w-100 btn-sm btn-outline-dark ">
                                       Complete
                                    </button> 
                                </div>
                            </div>
          
      )
    }
}