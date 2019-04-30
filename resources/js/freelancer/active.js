import React from 'react';
export default class Active extends React.Component{
    constructor(props) {
      super(props)
    
      this.state = {
         value:"",
      }
    }
    componentWillMount(){
        console.log(this.props.activeJob);
        
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
                                <div className="card-body text-success   text-center ">
                                  <h1 className="text-white">{this.props.activeJob.left}</h1>
                                   <p>Days Left</p>
                                {
                                    this.props.activeJob.final_link?
                                        <span className="form-control py-0 pt-2 ">Processing Your Request</span>                                       
                                        :
                                        <input placeholder="Project Google Drive Link" name="value" value={this.state.value} onChange={this.handle.bind(this)} className="z w-100  form-control py-0"></input>
                                        
                                        
                                }    
                                </div>
                                <div className="card-footer bg-success">
                                   {
                                        this.props.activeJob.final_link?
                                        <button   className="btn w-100 btn-sm btn-success disabled">
                                            Completional awaited
                                        </button>
                                        :
                                        <button  onClick={this.click.bind(this)} className="btn w-100 btn-sm btn-outline-dark ">
                                            Complete
                                        </button>
                                   }
 
                                </div>
                            </div>
          
      )
    }
}