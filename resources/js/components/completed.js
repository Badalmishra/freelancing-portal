import React  from "react";
export default class Completed extends React.Component{
    constructor(props) {
      super(props)
    
     
    }
    render() {
      return (
        <div  className="card col-md-2  mx-1 x  p-0 text-left side">
            <div className="card-header bg-dark text-white">
                {this.props.completedJob.body}
                <span className="float-right">
                  <small>
                    <a href={"viewer/"+this.props.completedJob.freelancer.id}>
                      @{this.props.completedJob.freelancer.name}
                    </a>
                  </small>
                </span>
            </div>
            <div className="card-body bg-dark text-success   text-center ">
              
            {
                this.props.completedJob.final_link?
                    <a href={this.props.completedJob.final_link}
                      className="btn btn-info btn-sm w-100">Project Files</a>                                       
                    :
                    null                    
                    
            }    
            </div>
        </div>
      )
    }
}