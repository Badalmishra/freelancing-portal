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
    choiceClick(){
        const id = event.target.id;
        console.log(id);
        
        this.props.choice(id);
    }
    render() {
      return (
    
          
                            <div  className="card  mx-1 x  p-0 text-left side">
                                <div  className="card-header bg-dark text-white">
                                    {this.props.activeJob.body} 
                                    
                                    <small
                                        className="text-warning float-right pointer" 
                                        onClick={this.choiceClick.bind(this)} 
                                        id={this.props.theId}>
                                        Click For Details <i className="fa fa-search-plus"></i>
                                    </small>
                                </div>
                                <div className="card-body bg-dark text-success   text-center ">
                                  <h1 className="text-white">{this.props.activeJob.left}</h1>
                                   <p>Days Left</p>
                                {
                                    this.props.activeJob.final_link?
                                        <span className="form-control py-0 pt-2 ">Processing Your Request</span>                                       
                                        :
                                        <input placeholder="Project Google Drive Link" name="value" value={this.state.value} onChange={this.handle.bind(this)} className="z w-100  form-control py-0"></input>
                                        
                                        
                                }    
                                </div>
                                <div className="card-footer bg-dark">
                                   {
                                        this.props.activeJob.final_link?
                                        <button   className="btn w-100 btn-sm btn-success disabled">
                                            Completional awaited
                                        </button>
                                        :
                                        <button  onClick={this.click.bind(this)} className="btn w-100 btn-sm btn-outline-success ">
                                            Complete
                                        </button>
                                   }
 
                                </div>
                            </div>
          
      )
    }
}