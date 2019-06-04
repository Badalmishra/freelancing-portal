import React  from "react";
export default class Active extends React.Component{
    constructor(props) {
      super(props)
    
     
    }
    render() {
      return (
        <div  className="card col-md-3  mx-1 x  p-0 text-left side">
            <div className="card-header bg-dark text-white">
                {this.props.activeJob.body}
                <span className="float-right">
                <a href={"viewer/"+this.props.activeJob.freelancer.id}>
                  @{this.props.activeJob.freelancer.name}
                </a></span>
            </div>
            <div className="card-body bg-dark text-success   text-center ">
              <h1 className="text-white">{this.props.activeJob.left}</h1>
                <p>Days Left</p>
            {
                this.props.activeJob.final_link?
                    <a href={this.props.activeJob.final_link}
                      className="btn btn-info btn-sm w-100">Project Files</a>                                       
                    :
                    this.props.activeJob.left< 5?
                    <span className="form-control text-danger">
                      Deadline crossed
                    </span>
                    :null           
                    
            }    
            </div>
            <div className="card-footer ">
                {
                    this.props.activeJob.final_link?
                    <form action="/paypal" method="post">
                    
                        <input name="job" value={this.props.activeJob.id} hidden></input>
                        <input type="submit" value="pay" className="btn btn-success btn-sm w-100"></input>

                    </form>
                    :
                    this.props.activeJob.left< 5?
                    <button id={this.props.activeJob.id} className="list-group-item delete p-2  col-3 btn btn-outline-danger" onClick={this.props.delete}>
                      <i className="fas fa-trash-alt"></i> Delete
                    </button>
                    :null
                }

            </div>
        </div>
      )
    }
}