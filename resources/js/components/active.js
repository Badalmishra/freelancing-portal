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
            </div>
            <div className="card-body bg-dark text-success   text-center ">
              <h1 className="text-white">{this.props.activeJob.left}</h1>
                <p>Days Left</p>
            {
                this.props.activeJob.final_link?
                    <a href={this.props.activeJob.final_link}
                      className="btn btn-info btn-sm w-100">Project Files</a>                                       
                    :
                    null                    
                    
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
                    null
                }

            </div>
        </div>
      )
    }
}